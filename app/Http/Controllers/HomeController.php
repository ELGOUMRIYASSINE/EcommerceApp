<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;

class HomeController extends Controller
{

    public function index(){
        $products = Product::paginate(6);
        return view('home.userpage',compact('products'));
    }

    public function redirect(){

        // Retrieve the usertype from the authenticated User model to determine the redirection path
        $usertype = Auth::User()->usertype;

        if ($usertype == '1') {
            return view('admin.home');
        }
        else {
            $products = Product::paginate(6);
            return view('home.userpage',compact('products'));
        }

    }

    public function product_details(Product $product){

        return view('home.product_details',compact('product'));
    }

    public function add_to_cart(Product $product){
        if(Auth::check()){
            $user = Auth::user();

            $cart = new Cart();
            if(isset($product->discount_price)){
                $cart->price = $product->discount_price * request()->quantity ;
            } else {
                $cart->price = $product->price * request()->quantity;
            }

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->quantity = request()->quantity;
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->user_id = $user->id;

            $cart->save();

            return redirect()->back();


        } else {
            return redirect('login');
        }
    }

    public function show_cart(){

        // paymen method
        // 1 => cash on deleviry and pay using card
        // 2 => cash on deleviry
        // 3 => pay using card

        if (Auth::check()){
            $user = Auth::user();
            $carts = Cart::where('user_id','=',$user->id)->get();
            $prices  = Product::select('id','price','discount_price')->get();
            $payment_method = 1;
            return view('home.showCart',compact('carts','prices'));
        } else {
            return redirect('login');
        }



    }

    public function delete_cart(Cart $cart){
        $cart->delete();
        return redirect()->back()->with('item deleted successfully');
    }

    public function quantity_cart_update(Cart $cart){

        $cart->quantity = request()->quantity;
        $product = Product::find($cart->product_id);
        if(isset($product->discount_price)){
            $cart->price = $product->discount_price * request()->quantity;
        } else {
            $cart->price = $product->price * request()->quantity;
        }
        $cart->save();


        return redirect()->back()->with('item updated successfully');
    }

    public function cash_order(){
        $user = Auth::user();

        $carts = Cart::where('user_id','=',$user->id)->get();

        foreach($carts as $cart){
            $order = new Order();

            $order->name = $cart->name;
            $order->email = $cart->email;
            $order->phone = $cart->phone;
            $order->address = $cart->address;
            $order->user_id = $cart->user_id;
            $order->product_title = $cart->product_title;
            $order->quantity = $cart->quantity;
            $order->price = $cart->price;
            $order->image = $cart->image;
            $order->product_id = $cart->product_id;
            $order->payment_status = $cart->payment_status;

            $order->payment_status = "Cash On Delivery";
            $order->delivery_status = "Processing";

            $order->save();

            // delete cart after add it to the order table
            $cart->delete();

        }

        return redirect()->back()->with('message','Thank you for your order! We’ve received your request and will be in touch with you shortly. If you have any questions in the meantime, feel free to reach out. We appreciate your trust and look forward to assisting you!');
    }

    public function stripe($totalPrice){
        return view('home.stripe',compact('totalPrice'));
    }

    public function stripePost(Request $request,$totalPrice)

    {
        

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



        Stripe\Charge::create ([

                // * 100 means the price in dollars
                "amount" => $totalPrice * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Thank For Payment"

        ]);

        $user = Auth::user();

        $carts = Cart::where('user_id','=',$user->id)->get();

        foreach($carts as $cart){
            $order = new Order();

            $order->name = $cart->name;
            $order->email = $cart->email;
            $order->phone = $cart->phone;
            $order->address = $cart->address;
            $order->user_id = $cart->user_id;
            $order->product_title = $cart->product_title;
            $order->quantity = $cart->quantity;
            $order->price = $cart->price;
            $order->image = $cart->image;
            $order->product_id = $cart->product_id;
            $order->payment_status = $cart->payment_status;

            $order->payment_status = "Paid";
            $order->delivery_status = "Processing";

            $order->save();

            // delete cart after add it to the order table
            $cart->delete();

        }



        Session::flash('success', 'Payment successful!');



        return back();

    }

}

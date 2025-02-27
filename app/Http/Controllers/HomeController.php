<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

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

        if (Auth::check()){
            $user = Auth::user();
            $carts = Cart::where('user_id','=',$user->id)->get();
            $prices  = Product::select('id','price','discount_price')->get();
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

}

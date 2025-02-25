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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{

    public function index(){
        $products = Product::paginate(10);
        return view('home.userpage',compact('products'));
    }

    public function redirect(){

        // Retrieve the usertype from the authenticated User model to determine the redirection path
        $usertype = Auth::User()->usertype;

        if ($usertype == '1') {
            return view('admin.home');
        }
        else {
            $products = Product::paginate(10);
            return view('home.userpage',compact('products'));
        }

    }
}

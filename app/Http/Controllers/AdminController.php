<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function category(){
        return view('admin.category');
    }

    public function store_category(){

        $data = new Category() ;

        $data->category_name = request()->category_name;
        $data->save() ;

        return redirect()->back()->with('message', 'Category added successfully');
    }
}

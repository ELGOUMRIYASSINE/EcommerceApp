<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function category(){

        $categories = Category::All();
        return view('admin.category',['categories'=> $categories]);
    }

    public function store_category(){

        $data = new Category() ;

        $data->category_name = request()->category_name;
        $data->save() ;

        return redirect()->back()->with('message', 'Category added successfully');
    }

    public function delete_category(Category $category){

        $category->delete() ;
        return to_route('admin.category')->with('message','Category Deleted successfully');
    }
}

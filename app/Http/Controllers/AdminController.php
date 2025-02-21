<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function category(){
        $categories = Category::All();
        return view('admin.category.category',['categories'=> $categories]);
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

    public function edit_category(Category $category) {

        $categories = Category::All();
        return view('admin.category',['categories'=> $categories,'category_to_edit'=>$category]);
    }

    public function update_category(Category $category) {

        // bach tkhdem lik update method you must add the category_name to the fillable in the category model
        // $category->update(
        //     [

        //         'category_name' => request()->category_name,
        //     ]
        // );

        $category->category_name =request()->category_name ;
        $category->save();

        return redirect()->route('admin.category')->with('message','category updated successfully');

    }

    // product section

    public function create_product(){

        $categories = Category::All();
        return view('admin.product.create',compact('categories'));
    }

    public function store_product(){




        if (request()->hasFile('image')){
            $imagPath = request()->file('image')->store('products','public');
        }
        $data = new Product();

        $data->title = request()->title ;
        $data->description = request()->description ;
        $data->category_id = request()->category_id ;
        $data->quantity = request()->quantity ;
        $data->image = $imagPath ;
        $data->price = request()->price ;
        $data->discount_price = request()->discount_price ;

        $data->save();

        return redirect()->back()->with('message','Product Added Successfully');



    }


}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Subscribe;
use PDF;
use Notification;
use  App\Notifications\EmailNotification;


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
        return to_route('admin.category.category')->with('message','Category Deleted successfully');
    }

    public function edit_category(Category $category) {

        $categories = Category::All();
        return view('admin.category.category',['categories'=> $categories,'category_to_edit'=>$category]);
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

        // Process product file upload (for digital products)
        $productFilePath = null;
        if (request()->hasFile('file_path') && request()->input('is_digital') == 1) {
            $productFilePath = request()->file('file_path')->storeAs('products', request()->file('file_path')->getClientOriginalName(), 'public');
        }

        $data = new Product();
        $data->title = request()->title ;
        $data->description = request()->description ;
        $data->category_id = request()->category_id ;
        $data->quantity = request()->quantity ;
        $data->image = $imagPath ;
        $data->price = request()->price ;
        $data->discount_price = request()->discount_price ;
        $data->file_path = $productFilePath ;
        $data->save();
        return redirect()->back()->with('message','Product Added Successfully');
    }

    // show products on products page

    public function products_page(){
        $products = Product::paginate(20);
        return view('home.productsPage',compact('products'));
    }

    // show all products
    public function show_products(){


        $products = Product::All();

        return view('admin.product.index',compact('products'));
    }

    // show single product
    public function show_product(Product $product){
        return view('admin.product.show',compact('product'));
    }


    public function delete_product(Product $product){
        $product->delete();

        return redirect()->route('products.index')->with('message','Product Deleted Successfully');
    }

    public function edit_product(Product $product){

        $categories = Category::All();

        return view('admin.product.edit',['product'=> $product,'categories'=>$categories]);
    }

    public function update_product(Product $product){

        // dd(request()->current_image);

        $imagePath = request()->current_image;
        if (!empty(request()->image)){
            $imagePath = request()->file('image')->store('products','public');
        }

        $product->title = request()->title ;
        $product->description = request()->description ;
        $product->category_id = request()->category_id ;
        $product->quantity = request()->quantity ;
        $product->image = $imagePath ;
        $product->price = request()->price ;
        $product->discount_price = request()->discount_price ;
        $product->save();

        return redirect()->back()->with('message','Product Updated Successfully');


    }

    public function orders(){

        if (Auth::user()){
            $orders = Order::All();
            return view('admin.order.orders',compact('orders'));
        } else {
            return redirect('login');
        }


    }

    public function order_delivred(Order $order){

        $order->delivery_status = 'Delivered';
        $order->payment_status = 'Paid';
        $order->save();

        return redirect()->back();

    }

    public function print_order_pdf(Order $order){


        $pdf = PDF::loadview('admin.order.pdf',compact('order'));
        return $pdf->download('order_details.pdf');

    }

    public function show_order(Order $order){


        return view('admin.order.show',compact('order'));

    }

    public function send_email(Order $order){

        return view('admin.order.send_email',compact('order'));

    }

    public function send_user_email(Order $order){

        $details = [
            "greeting" => request()->greeting,
            "first_line" => request()->first_line,
            "button_text" => request()->button_text,
            "body" => request()->body,
            "url" => request()->url,
            "last_line" => request()->last_line,
        ];

        Notification::send($order,new EmailNotification($details));
        return redirect()->back()->with('message','Email sent successfully!!');


    }

    public function search_order(){

        $search = request()->search;

        $orders = Order::where('name', 'LIKE', "%{$search}%")
        ->orWhere('email', 'LIKE', "%{$search}%")
        ->orWhere('phone', 'LIKE', "%{$search}%")
        ->orWhere('product_title', 'LIKE', "%{$search}%")
        ->paginate(10);

        return view('admin.order.orders',compact('orders'));

    }

    public function my_orders(){
        if (Auth::user()){
            $orders = order::where('user_id','=',Auth::id())->get();
            return view('home.order',compact('orders'));
        } else {
            return redirect('login');
        }


    }

    public function delete_order(Order $order){
        $order->delete();
        return redirect()->back()->with('message','order deleted successfully!');
    }

    public function cancel_order(Order $order){
        $order->delivery_status = 'You Canceled The Order';
        $order->save();
        return redirect()->back()->with('message','Order Canceled Correctly');
    }

    public function subscribe(){
        request()->validate([
            'email' => 'required|email|unique:subscribes,email',
        ]);

        $subscribe = new Subscribe();
        $subscribe->email = request()->email;
        $subscribe->save();

        return redirect()->back()->with('message', 'You have subscribed successfully');
    }

}

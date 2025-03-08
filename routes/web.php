<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth','verified');

// Authentication Routes

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Product Routes (Admin)
Route::get('/products/show', [AdminController::class, 'show_products'])->name('products.index');
Route::get('/product/create', [AdminController::class, 'create_product'])->name('products.create');
Route::post('/product/store', [AdminController::class, 'store_product'])->name('store_product');
Route::get('/products_page', [AdminController::class, 'products_page'])->name('products_page');
Route::get('/product/show/{product}', [AdminController::class, 'show_product'])->name('product.show');
Route::get('/product/{product}/edit', [AdminController::class, 'edit_product'])->name('product.edit');
Route::post('/product/{product}/update', [AdminController::class, 'update_product'])->name('product.update');
Route::delete('/product/{product}', [AdminController::class, 'delete_product'])->name('product.delete');

// Product Routes (User)
Route::get('/product_details/{product}', [HomeController::class, 'product_details'])->name('product_details');
Route::post('/add_to_cart/{product}', [HomeController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/show_cart', [HomeController::class, 'show_cart'])->name('show_cart');
Route::delete('/delete_cart/{cart}', [HomeController::class, 'delete_cart'])->name('delete_cart');
Route::post('/quantity_cart_update/{cart}', [HomeController::class, 'quantity_cart_update'])->name('quantity_cart_update');

Route::get('/cash_order',[HomeController::class, 'cash_order'])->name('cash_order');
Route::get('/stripe/{total}',[HomeController::class, 'stripe'])->name('stripe');
Route::post('stripe/{totalPrice}',[HomeController::class,'stripePost'])->name('stripe.post');

// Category Routes (Admin)
Route::get('/category', [AdminController::class, 'category'])->name('admin.category');
Route::post('/category', [AdminController::class, 'store_category'])->name('admin.category.store');
Route::get('/category/edit/{category}', [AdminController::class, 'edit_category'])->name('admin.category.edit');
Route::post('/category/edit/{category}', [AdminController::class, 'update_category'])->name('admin.category.update');
Route::delete('/category/{category}', [AdminController::class, 'delete_category'])->name('admin.category.delete');

// Orders Routes (Admin)
Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
Route::get('/orders/{order}',[AdminController::class, 'order_delivred'])->name('order_delivred');
Route::get('/print_order_pdf/{order}',[AdminController::class, 'print_order_pdf'])->name('print_order_pdf');
Route::get('/delete_order/{order}',[AdminController::class, 'delete_order'])->name('delete_order');
Route::get('/show_order/{order}',[AdminController::class, 'show_order'])->name('show_order');
Route::get('/send_email/{order}',[AdminController::class, 'send_email'])->name('send_email');
Route::post('/send_user_email/{order}',[AdminController::class, 'send_user_email'])->name('send_user_email');

Route::get('/search_order',[AdminController::class, 'search_order'])->name('search_order');
Route::get('/my_orders',[AdminController::class, 'my_orders'])->name('my_orders');
Route::delete('/cancel_order/{order}',[AdminController::class, 'cancel_order'])->name('cancel_order');


Route::get('/resend-email-verification', function (Request $request) {
    if (Auth::check() && !Auth::user()->hasVerifiedEmail()) {
        Auth::user()->sendEmailVerificationNotification();
        return redirect()->back()->with('message', 'A new verification email has been sent.');
    }

    return redirect()->back()->with('error', 'Your email is already verified or you are not logged in.');
})->middleware('auth')->name('verification.resend');

Route::get('/subscribe',[AdminController::class,'subscribe'])->name('subscribe');



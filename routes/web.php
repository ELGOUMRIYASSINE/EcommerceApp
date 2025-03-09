<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;

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
Route::get('/products/show', [AdminController::class, 'show_products'])->name('products.index')->middleware(AdminMiddleware::class);
Route::get('/product/create', [AdminController::class, 'create_product'])->name('products.create')->middleware(AdminMiddleware::class);
Route::post('/product/store', [AdminController::class, 'store_product'])->name('store_product')->middleware(AdminMiddleware::class);
Route::get('/product/show/{product}', [AdminController::class, 'show_product'])->name('product.show')->middleware(AdminMiddleware::class);
Route::get('/product/{product}/edit', [AdminController::class, 'edit_product'])->name('product.edit')->middleware(AdminMiddleware::class);
Route::post('/product/{product}/update', [AdminController::class, 'update_product'])->name('product.update')->middleware(AdminMiddleware::class);
Route::delete('/product/{product}', [AdminController::class, 'delete_product'])->name('product.delete')->middleware(AdminMiddleware::class);

// Product Routes (User)
Route::get('/product_details/{product}', [HomeController::class, 'product_details'])->name('product_details');
Route::get('/products_page', [AdminController::class, 'products_page'])->name('products_page');
Route::post('/add_to_cart/{product}', [HomeController::class, 'add_to_cart'])->name('add_to_cart')->middleware('auth');
Route::get('/show_cart', [HomeController::class, 'show_cart'])->name('show_cart')->middleware('auth');
Route::delete('/delete_cart/{cart}', [HomeController::class, 'delete_cart'])->name('delete_cart')->middleware('auth');
Route::post('/quantity_cart_update/{cart}', [HomeController::class, 'quantity_cart_update'])->name('quantity_cart_update')->middleware('auth');

Route::get('/cash_order',[HomeController::class, 'cash_order'])->name('cash_order')->middleware('auth','verified');
Route::get('/stripe/{total}',[HomeController::class, 'stripe'])->name('stripe')->middleware('auth','verified');
Route::post('stripe/{totalPrice}',[HomeController::class,'stripePost'])->name('stripe.post')->middleware('auth','verified');

// Category Routes (Admin)
Route::get('/category', [AdminController::class, 'category'])->name('admin.category')->middleware(AdminMiddleware::class);
Route::post('/category', [AdminController::class, 'store_category'])->name('admin.category.store')->middleware(AdminMiddleware::class);
Route::get('/category/edit/{category}', [AdminController::class, 'edit_category'])->name('admin.category.edit')->middleware(AdminMiddleware::class);
Route::post('/category/edit/{category}', [AdminController::class, 'update_category'])->name('admin.category.update')->middleware(AdminMiddleware::class);
Route::delete('/category/{category}', [AdminController::class, 'delete_category'])->name('admin.category.delete')->middleware(AdminMiddleware::class);

// Orders Routes (Admin)
Route::get('/orders', [AdminController::class, 'orders'])->name('orders')->middleware(AdminMiddleware::class);
Route::get('/orders/{order}',[AdminController::class, 'order_delivred'])->name('order_delivred')->middleware(AdminMiddleware::class);
Route::get('/print_order_pdf/{order}',[AdminController::class, 'print_order_pdf'])->name('print_order_pdf')->middleware(AdminMiddleware::class);
Route::get('/delete_order/{order}',[AdminController::class, 'delete_order'])->name('delete_order')->middleware(AdminMiddleware::class);
Route::get('/show_order/{order}',[AdminController::class, 'show_order'])->name('show_order')->middleware(AdminMiddleware::class);
Route::get('/send_email/{order}',[AdminController::class, 'send_email'])->name('send_email')->middleware(AdminMiddleware::class);
Route::post('/send_user_email/{order}',[AdminController::class, 'send_user_email'])->name('send_user_email')->middleware(AdminMiddleware::class);

Route::get('/search_order',[AdminController::class, 'search_order'])->name('search_order')->middleware(AdminMiddleware::class);
Route::get('/my_orders',[AdminController::class, 'my_orders'])->name('my_orders')->middleware('auth','verified');
Route::delete('/cancel_order/{order}',[AdminController::class, 'cancel_order'])->name('cancel_order')->middleware('auth','verified');


Route::get('/resend-email-verification', function (Request $request) {
    if (Auth::check() && !Auth::user()->hasVerifiedEmail()) {
        Auth::user()->sendEmailVerificationNotification();
        return redirect()->back()->with('message', 'A new verification email has been sent.');
    }

    return redirect()->back()->with('error', 'Your email is already verified or you are not logged in.');
})->middleware('auth')->name('verification.resend');

Route::get('/subscribe',[AdminController::class,'subscribe'])->name('subscribe');

// admin page
Route::get('/subscribes',[AdminController::class,'subscribes'])->name('subscribes')->middleware(AdminMiddleware::class);



Route::view('/contact','home.contact');

// user sending page
Route::post('/userMessage',[HomeController::class,'userMessage'])->name('userMessage');

// admin page
Route::get('/messages',[AdminController::class,'messages'])->name('messages')->middleware(AdminMiddleware::class);



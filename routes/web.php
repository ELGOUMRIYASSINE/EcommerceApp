<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/redirect', [HomeController::class, 'redirect']);

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

// Category Routes (Admin)
Route::get('/category', [AdminController::class, 'category'])->name('admin.category');
Route::post('/category', [AdminController::class, 'store_category'])->name('admin.category.store');
Route::get('/category/edit/{category}', [AdminController::class, 'edit_category'])->name('admin.category.edit');
Route::post('/category/edit/{category}', [AdminController::class, 'update_category'])->name('admin.category.update');
Route::delete('/category/{category}', [AdminController::class, 'delete_category'])->name('admin.category.delete');

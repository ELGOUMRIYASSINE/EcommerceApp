<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/',[HomeController::class,'index']);
Route::get('/test',function (){
    return view('test');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/redirect',[HomeController::class,'redirect']);

// product section

Route::get('/products/show',  [AdminController::class, 'show_products'])->name('products.index');
Route::get('/product/create', [AdminController::class, 'create_product'])->name('products.create');
Route::post('/product/store', [AdminController::class, 'store_product'])->name('store_product');
Route::get('/product/show/{product}', [AdminController::class, 'show_product'])->name('product.show');
Route::delete('/product/{product}', [AdminController::class, 'delete_product'])->name('product.delete');
Route::get('/product/{product}/edit',[AdminController::class, 'edit_product'])->name('product.edit');
Route::post('/product/{product}/update',[AdminController::class, 'update_product'])->name('product.update');





// category section

Route::get('/category',[AdminController::class,'category'])->name('admin.category');
Route::post('/category',[AdminController::class,'store_category'])->name('admin.category.store');
Route::delete('/category/{category}',[AdminController::class,'delete_category'])->name('admin.category.delete');
Route::get('/category/edit/{category}',[AdminController::class,'edit_category'])->name('admin.category.edit');
Route::post('/category/edit/{category}',[AdminController::class,'update_category'])->name('admin.category.update');


// Route::delete('/category/{category}',function(){
//     return 'delete route';
// })->name('admin.category.delete');


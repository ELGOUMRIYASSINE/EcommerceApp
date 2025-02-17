<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/',[HomeController::class,'index']);

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
Route::get('/category',[AdminController::class,'category'])->name('admin.category');
Route::post('/category',[AdminController::class,'store_category'])->name('admin.category.store');
Route::delete('/category/{category}',[AdminController::class,'delete_category'])->name('admin.category.delete');
// Route::delete('/category/{category}',function(){
//     return 'delete route';
// })->name('admin.category.delete');


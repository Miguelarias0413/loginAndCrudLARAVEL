<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return redirect('/products');
});


Route::get('/products',[ProductsController::class,'index'])->name('products.index');
Route::post('/products',[ProductsController::class,'store'])->name('products.store');
Route::delete('/products',[ProductsController::class, 'destroy'])->name('products.destroy');
Route::post('/productos',[ProductsController::class,'update'])->name('products.update');
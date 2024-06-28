<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return redirect('/products');
});

Route::middleware('auth')->group(function () { 
    Route::get('/products',[ProductsController::class,'index'])->name('products.index');
    Route::post('/products',[ProductsController::class,'store'])->name('products.store');
    Route::delete('/products',[ProductsController::class, 'destroy'])->name('products.destroy');
    Route::patch('/products',[ProductsController::class,'update'])->name('products.update');
    
    
    
});
Route::post('/logout',[LogoutController::class,'logout'])->name('logout.logout');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login.login');

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store'])->name('register.store');


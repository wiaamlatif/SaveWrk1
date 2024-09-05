<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


//Route::get('/',[\App\Http\Controllers\storeController::class,'index'] );

Route::resource('products',ProductController::class);

Route::resource('categories',CategoryController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

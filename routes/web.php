<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
Route::get('/', function () {
    return view('templates.index');
});

Route::prefix('admin')->group(function (){

    //Home page
    Route::get('/', function(){
        return view('admin.index');
    });

    //Category route
    Route::post('/categories/parent', [CategoryController::class, 'parentCategory'])->name('categories.parent');
    Route::resource('/categories', CategoryController::class);
});


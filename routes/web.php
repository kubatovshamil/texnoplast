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
        return view('admin.pages.index');
    });

    //Product Pages
    Route::get('products/create', [ProductController::class, 'create'] );

    Route::get('products/show', [ProductController::class, 'show'] );

    //Category Pages
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/create', [CategoryController::class, 'createParentCategory'])->name('category.add');

    Route::get('categories/show', [CategoryController::class, 'show']);

});


<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('templates.index');
});

Route::prefix('admin')->group(function (){

    //Home page
    Route::get('/', function(){
        return view('admin.pages.index');
    });

    //Product Pages
    Route::get('products/create', function (){
        return view('admin.pages.products.create');
    });

    Route::get('products/show', function(){
        return view('admin.pages.products.show');
    });

    //Category Pages
    Route::get('categories/create', function (){
        return view('admin.pages.categories.create');
    });

    Route::get('categories/show', function(){
        return view('admin.pages.categories.show');
    });
});


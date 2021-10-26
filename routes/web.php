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
    Route::get('product/add', function (){
        return view('admin.pages.product.add_product');
    });

    Route::get('product/list', function(){
        return view('admin.pages.product.list_product');
    });

    //Category Pages
    Route::get('category/add', function (){
        return view('admin.pages.category.add_category');
    });

    Route::get('category/list', function(){
        return view('admin.pages.category.list_category');
    });
});


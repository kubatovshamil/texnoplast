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
    Route::get('/add-product', function (){
        return view('admin.pages.product.add-product');
    });

    Route::get('/list-product', function(){
        return view('admin.pages.product.list-product');
    });

    //Category Pages
    Route::get('/add-category', function (){
        return view('admin.pages.category.add-category');
    });

    Route::get('/list-category', function(){
        return view('admin.pages.category.list-category');
    });

});


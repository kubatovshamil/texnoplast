<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\CategoryController as CategoryControllerAlias;
use App\Http\Controllers\ProductController as ProductControllerAlias;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AjaxController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/catalog', [HomeController::class, 'catalog']);

Route::get('/sale', [HomeController::class, 'sale']);

Route::get('/product/{slug}', [ProductControllerAlias::class, 'index']);

Route::view('/contact', 'pages.others.contact');

Route::view('/about', 'pages.others.about');

Route::view('/provider', 'pages.others.provider');

Route::view('/police', 'pages.others.personal');

Route::view('/delivery', 'pages.others.delivery');

Route::view('/question', 'pages.others.question');

Route::get('/basket', [OrderController::class, 'index']);

Route::view('/register', 'pages.register');

Route::get('/search/', [HomeController::class, 'search'])->name('search');

Route::get('/categories/{slug}/{subSlug?}', [CategoryControllerAlias::class, 'index']);



//ajax

Route::view('/product','pages.ajax.modal');
Route::view('/order', 'pages.ajax.order');
Route::view('/form', 'pages.ajax.register-form');
Route::view('/restore-password', 'pages.ajax.restore-password');
Route::view('/phone', 'pages.ajax.phone-form');

Route::prefix('admin')->group(function (){
    //Home page
    Route::get('/', function(){
        return view('admin.pages.index');
    });
    //Product route
    Route::resource('/products', ProductController::class);
    //CategoryFilter route
    Route::post('/categories/parent', [CategoryController::class, 'parentCategory'])->name('categories.parent');
    Route::resource('/categories', CategoryController::class);
});


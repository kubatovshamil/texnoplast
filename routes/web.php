<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\CategoryController as CategoryControllerAlias;

Route::get('/', [HomeController::class, 'index']);

Route::get('/catalog', [HomeController::class, 'catalog']);

Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/about', [HomeController::class, 'about']);

Route::get('/provider', [HomeController::class, 'provider']);

Route::get('/police', [HomeController::class, 'personal']);

Route::get('/delivery', [HomeController::class, 'delivery']);

Route::get('/question', [HomeController::class, 'question']);


Route::get('/register', [HomeController::class, 'register']);





Route::get('/categories/{category}', [CategoryControllerAlias::class, 'category']);
Route::get('/categories/{category}/{subCategory}', [CategoryControllerAlias::class, 'subCategory']);




Route::prefix('admin')->group(function (){
    //Home page
    Route::get('/', function(){
        return view('admin.index');
    });
    //Product route
    Route::resource('/products', ProductController::class);
    //Category route
    Route::post('/categories/parent', [CategoryController::class, 'parentCategory'])->name('categories.parent');
    Route::resource('/categories', CategoryController::class);
});


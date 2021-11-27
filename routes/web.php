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
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\UserController;

Route::get('/', [HomeController::class, 'index'])->name('index');

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

Route::get('/register', [LoginController::class, 'index']);
Route::post('/signUp', [LoginController::class, 'store'])->name('signup');
Route::post('/login', [LoginController::class, 'login'])->name('to.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('to.logout');

Route::get('/search/', [HomeController::class, 'search'])->name('search');

Route::get('/categories/{slug}/{subSlug?}', [CategoryControllerAlias::class, 'index']);

//Корзинка
Route::post('/addToCart', [OrderController::class, 'addToCart']);
Route::put('/updateCart', [OrderController::class, 'updateCart']);
Route::delete('/removeCart', [OrderController::class, 'removeCart']);
Route::get('/clearCart', [OrderController::class, 'destroyed']);


//Избранное
Route::get('/favorite', [FavoriteController::class, 'index']);
Route::post('/addFavorite', [FavoriteController::class, 'store']);
Route::delete('/removeFavorite', [FavoriteController::class, 'remove']);
Route::get('/clearFavorite', [FavoriteController::class, 'destroyed']);

//ajax
Route::view('/product','pages.ajax.modal');
Route::view('/order', 'pages.ajax.order');
Route::view('/form', 'pages.ajax.register-form');
Route::view('/restore-password', 'pages.ajax.restore-password');
Route::view('/phone', 'pages.ajax.phone-form');
Route::view('/provider-form', 'pages.ajax.provider');


Route::group(['prefix' => 'admin'], function (){
    Route::view('/login', 'admin.pages.login');
    Route::post('/toLogin', [AdminLoginController::class, 'login'])->name('to.admin');
});
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function (){
    //Home page
    Route::get('/', function(){
        return view('admin.pages.index');
    });
    //Product route
    Route::resource('/products', ProductController::class);
    //CategoryFilter route
    Route::post('/categories/parent', [CategoryController::class, 'parentCategory'])->name('categories.parent');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/users', UserController::class);
});


<?php

use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\CategoryController as CategoryControllerAlias;
use App\Http\Controllers\ProductController as ProductControllerAlias;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\UserController;

//admin routes
Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin'], function (){
    //Home page
    Route::get('/', function(){
        return view('admin.pages.index');
    });

    //Product route
    Route::resource('/products', ProductController::class);
    //CategoryFilter route
    Route::post('/categories/parent', [CategoryController::class, 'parentCategory'])->name('categories.parent');
    Route::resource('/categories', CategoryController::class);
    //User route
    Route::resource('/users', UserController::class);
});

Route::post('/toAdminLogin', [AdminLoginController::class, 'login'])->name('to.admin.panel');

//end admin routes

//restore password routes
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
//end routes restore

//Registration routes
Route::get('/register', [LoginController::class, 'index']);
Route::post('/signUp', [LoginController::class, 'store'])->name('signup');
Route::post('/login', [LoginController::class, 'login'])->name('to.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('to.logout');
//end registrations routes

//bucket routes
Route::post('/addToCart', [OrderController::class, 'addToCart']);
Route::put('/updateCart', [OrderController::class, 'updateCart']);
Route::delete('/removeCart', [OrderController::class, 'removeCart']);
Route::get('/clearCart', [OrderController::class, 'destroyed']);
//end baucket routes

//favorites routes
Route::get('/favorite', [FavoriteController::class, 'index']);
Route::post('/addFavorite', [FavoriteController::class, 'store']);
Route::delete('/removeFavorite', [FavoriteController::class, 'remove']);
Route::get('/clearFavorite', [FavoriteController::class, 'destroyed']);
//end favorites routes

//begin ajax routes
Route::view('/product','pages.ajax.modal');
Route::view('/order', 'pages.ajax.order');
Route::view('/form', 'pages.ajax.register-form');
Route::view('/restore-password', 'pages.ajax.restore-password');
Route::view('/phone', 'pages.ajax.phone-form');
Route::view('/provider-form', 'pages.ajax.provider');
//end ajax routes


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

Route::get('/search/', [HomeController::class, 'search'])->name('search');

Route::get('/categories/{slug}/{subSlug?}', [CategoryControllerAlias::class, 'index']);

Route::post('/orderForm', [OrderController::class, 'order'])->name('order');

Route::post('/individualOrder', [HomeController::class, 'invidualOrder'])->name('individual.order');
Route::post("/orderPhone", [HomeController::class, 'orderPhone'])->name('order.phone');
Route::post("/orderProvider", [HomeController::class, 'orderProvider'])->name('order.provider');

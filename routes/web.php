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
    Route::post('categories/create', [CategoryController::class, 'createParentCategory'])->name('category.add');
    Route::post('categories/add', [CategoryController::class, 'createCategory'])->name('category.create');
    Route::get('categories/show', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/update{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/delete{id}', [CategoryController::class, 'destroyed'])->name('categories.destroyed');
});


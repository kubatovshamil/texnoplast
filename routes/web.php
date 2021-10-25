<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('templates.index');
});

Route::get('/admin', function (){
    return view('admin.pages.index');
});

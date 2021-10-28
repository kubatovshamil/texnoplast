<?php

namespace App\Http\Controllers\admin;

class ProductController
{
    public function create(){
        return view('admin.pages.products.create');
    }

    public function show(){
        return view('admin.pages.products.show');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;

class ProductController
{
    public function create(){
        $categories = Category::all('id', 'title');
        return view('admin.pages.products.create', compact('categories'));
    }

    public function show(){
        return view('admin.pages.products.show');
    }
}

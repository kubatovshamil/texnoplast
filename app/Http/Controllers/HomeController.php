<?php

namespace App\Http\Controllers;

use App\Http\Filters\Tree;
use App\Models\Category;
use App\Models\Product;

class HomeController
{
    public function index()
    {
        return view('templates.index', [
            'productQuantity' => Product::all()->count(),
            'categories' => Tree::buildTree(Category::all()->toArray()),
        ]);
    }

    public function catalog()
    {
        return view('templates.catalog', [
            'productQuantity' => Product::all()->count(),
            'categories' => Tree::buildTree(Category::all()->toArray()),
            'products' => Product::all(),
        ]);
    }

}

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
            'hits' => Product::where('hit', "1")->get()
        ]);
    }

}

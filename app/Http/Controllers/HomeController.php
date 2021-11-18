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
            'products' => Product::paginate(12),
        ]);
    }


    public function contact()
    {
        return view('pages.contact');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function delivery()
    {
        return view('pages.delivery');
    }


    public function personal()
    {
        return view('pages.personal');
    }

    public function provider()
    {
        return view('pages.provider');
    }

    public function question()
    {
        return view('pages.question');
    }


    public function register()
    {
        return view('pages.register');
    }

}

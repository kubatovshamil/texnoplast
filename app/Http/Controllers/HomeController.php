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


    public function contact()
    {
        return view('pages.contact', [
            'categories' => Tree::buildTree(Category::all()->toArray()),
        ]);
    }

    public function about()
    {
        return view('pages.about', [
            'categories' => Tree::buildTree(Category::all()->toArray()),
        ]);
    }

    public function delivery()
    {
        return view('pages.delivery', [
            'categories' => Tree::buildTree(Category::all()->toArray()),
        ]);
    }


    public function personal()
    {
        return view('pages.personal', [
            'categories' => Tree::buildTree(Category::all()->toArray()),
        ]);
    }

    public function provider()
    {
        return view('pages.provider', [
            'categories' => Tree::buildTree(Category::all()->toArray()),
        ]);
    }

    public function question()
    {
        return view('pages.question', [
            'categories' => Tree::buildTree(Category::all()->toArray()),
        ]);
    }


    public function register()
    {
        return view('pages.register', [
            'categories' => Tree::buildTree(Category::all()->toArray()),
        ]);
    }


}

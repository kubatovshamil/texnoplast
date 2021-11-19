<?php

namespace App\Http\Controllers;

use App\Http\Filters\Tree;
use App\Models\Category;
use App\Models\Product;

class HomeController
{
    public function index()
    {
        return view('pages.index', [
            'productQuantity' => Product::all()->count(),
            'categories' => Tree::buildTree(Category::all()->toArray()),
        ]);
    }

    public function catalog()
    {
        return view('pages.catalog', [
            'productQuantity' => Product::all()->count(),
            'categories' => Tree::buildTree(Category::all()->toArray()),
            'products' => Product::paginate(12),
        ]);
    }

    public function sale()
    {
        return view('pages.sale',[
            'products' => Product::where('hit', '1')->paginate(12),
        ]);
    }


    public function contact()
    {
        return view('pages.others.contact');
    }

    public function about()
    {
        return view('pages.others.about');
    }

    public function delivery()
    {
        return view('pages.others.delivery');
    }


    public function personal()
    {
        return view('pages.others.personal');
    }

    public function provider()
    {
        return view('pages.others.provider');
    }

    public function question()
    {
        return view('pages.others.question');
    }


    public function register()
    {
        return view('pages.register');
    }

}

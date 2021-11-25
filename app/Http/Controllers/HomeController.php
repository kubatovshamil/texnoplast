<?php

namespace App\Http\Controllers;

use App\Http\Filters\CartShopping;
use App\Http\Filters\Tree;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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

    public function search(Request $request)
    {
        return view('pages.search', [
            'products' => Product::where('title', 'LIKE', $request->q . '%')->paginate(12),
        ]);
    }


}

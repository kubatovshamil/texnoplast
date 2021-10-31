<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        $categories = Category::whereNotNull('parent_id')->get(['id','title']);
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        ddd($request);
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}

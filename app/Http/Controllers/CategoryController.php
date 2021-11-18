<?php

namespace App\Http\Controllers;

use App\Http\Filters\Tree;
use App\Models\Category;
use App\Models\Product;

class CategoryController
{

    public function category($slug)
    {
        return view('templates.category', [
            'products' => Tree::getProducts($slug),
            'title' => Category::where('slug', $slug)->first()->title
        ]);
    }

    public function subCategory($category, $subCategory )
    {
        $category = Category::where('slug', $subCategory)->first();
        return view('templates.category', [
            'products' => Product::where('category_id', $category->id)->paginate(12),
        ]);
    }


}

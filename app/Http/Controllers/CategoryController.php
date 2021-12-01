<?php

namespace App\Http\Controllers;

use App\Http\Filters\BreadCrumbs;
use App\Http\Filters\CategoryFilter;
use App\Http\Filters\Tree;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategoryController
{

    public function index($slug, $subSlug = '')
    {
        if(!empty($slug) && empty($subSlug)){

            return view('categories.index', [
                'products' => CategoryFilter::getProducts($slug),
                'meta' => Category::where('slug', $slug)->first()
            ]);
        }else{
            $category = Category::where('slug', $subSlug)->first();
            return view('categories.index', [
                'products' => Product::where('category_id', $category->id)->paginate(12),
                'meta' => Category::where('slug', $subSlug)->first()
            ]);
        }
    }


}

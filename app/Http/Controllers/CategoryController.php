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

    public function getCategory($slug)
    {
            return view('categories.index', [
                'products' => CategoryFilter::getProducts($slug),
                'meta' => Category::where('slug', $slug)->first()
            ]);
    }


    public function getSubCategory($slug, $subSlug)
    {
        $parentCategory = Category::where('slug', $slug)->first();
        
        if(!$parentCategory){
            abort(404);
        }
        
        $category = Category::where('slug', $subSlug)->first();
        
        if(!$category){
            abort(404);
        }
        
        return view('categories.index', [
            'products' => Product::where('category_id', $category->id)->paginate(12),
            'meta' => Category::where('slug', $subSlug)->first()
        ]);
    }


}

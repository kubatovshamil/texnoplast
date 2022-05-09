<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\Component;

class BreadCrumbs extends Component
{

    public function __construct()
    {
        //
    }


    public function render()
    {
        $categorySlug = str_replace(".php", "", request()->segment(count(request()->segments())));

        $category = Category::where('slug', $categorySlug)->first();

        if(isset($category->parent_id))
        {
            return view('components.bread-crumbs', [
                'last' => Category::where('slug', $categorySlug)->first(),
                'category' => Category::where("id", $category->parent_id)->first()
            ]);
        }

        $productSlug =  request()->segment(count(request()->segments()));

        if($product = Product::where('slug', $productSlug)->first())
        {
            $category = Category::find($product->category_id);
            return view('components.bread-crumbs', [
                'last' => Category::where('slug', $productSlug)->first(),
                'product' => $product,
                'subsubcat' => Category::find($category->parent_id),
                'subcat' => $category
            ]);
        }


        return view('components.bread-crumbs', [
            'last' => Category::where('slug', $categorySlug)->first(),
            'current' => $category
        ]);

    }

}

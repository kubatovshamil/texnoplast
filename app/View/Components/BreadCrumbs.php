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
        $slug = request()->segment(count(request()->segments()));

        $category = Category::where('slug', $slug)->first();

        if(isset($category->parent_id))
        {
            return view('components.bread-crumbs', [
                'last' => Category::where('slug', $slug)->first(),
                'category' => Category::find($category->parent_id)->first()
            ]);
        }

        if($product = Product::where('slug', $slug)->first())
        {
            $category = Category::find($product->category_id);
            return view('components.bread-crumbs', [
                'last' => Category::where('slug', $slug)->first(),
                'product' => $product,
                'subcat' => $category
            ]);
        }


        return view('components.bread-crumbs', [
            'last' => Category::where('slug', $slug)->first(),
            'current' => $category
        ]);

    }

}

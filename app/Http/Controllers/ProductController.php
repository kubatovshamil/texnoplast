<?php

namespace App\Http\Controllers;

use App\Models\AttributeName;
use App\Models\Gallery;
use App\Models\Product;

class ProductController
{

    public function index($slug, AttributeName $attributeName)
    {
        $product = Product::where('slug', $slug)->first();
        return view('pages.product', [
            'product' => $product,
            'attributes' => $attributeName->getElements($product->id),
            'galleries' => Gallery::where('product_id', $product->id)
        ]);
    }

}

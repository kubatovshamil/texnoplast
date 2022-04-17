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
        if(!$product){
            abort(404);
        }
        return view('products.index', [
            'product' => $product,
            'attributes' => $attributeName->getElements($product->id),
            'galleries' => Gallery::where('product_id', $product->id)->get()
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\AttributeName;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController
{

    public function index($slug, AttributeName $attributeName)
    {
        $product = Product::where('slug', $slug)->first();
        $reviews = Review::all();
        if(!$product){
            abort(404);
        }
        return view('products.index', [
            'product' => $product,
            'attributes' => $attributeName->getElements($product->id),
            'galleries' => Gallery::where('product_id', $product->id)->get(),
            'reviews' => $reviews
        ]);
    }

    public function storeReview(Request $request){
        Review::create($request->all());
    }

}

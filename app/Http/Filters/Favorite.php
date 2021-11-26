<?php

namespace App\Http\Filters;
use App\Models\Product;
use Illuminate\Support\Facades\Facade;
class Favorite
{

    public static function addToCart($request)
    {
        $product = Product::find($request->id);

        $favorite = session()->get('favorite', []);

        $favorite[$request->id] = [
            "id" => $product->id,
            "title" => $product->title,
            "price" => $product->price,
            "image" => $product->img,
            "discount" => $product->discount,
            "slug" => $product->slug
        ];

        session()->put('favorite', $favorite);
        return true;
    }


    public static function remove($request)
    {
        if ($request->id) {
            $favorite = session()->get('favorite');
            if (isset($favorite[$request->id])) {
                unset($favorite[$request->id]);
                session()->put('favorite', $favorite);
            }
        }
    }

    public static function destroy()
    {
        session()->forget('favorite');
    }
}

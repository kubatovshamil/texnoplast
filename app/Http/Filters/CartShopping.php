<?php

namespace App\Http\Filters;

use App\Models\Product;
use Illuminate\Support\Facades\Facade;

class CartShopping
{

    public static function addToCart($id)
    {
        $product = Product::find($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "title" => $product->title,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->img,
                "discount" => $product->discount
            ];
        }
        session()->put('cart', $cart);
        return true;
    }

    public static function update($request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
    }

    public static function remove($request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
    }

    public static function destroy()
    {
        session()->forget('cart');
    }

}

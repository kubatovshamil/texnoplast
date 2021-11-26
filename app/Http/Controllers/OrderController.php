<?php

namespace App\Http\Controllers;

use App\Http\Filters\CartShopping;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController
{

    public function index()
    {
        return view('orders.index', [
            'products' => request()->session()->get('cart')
        ]);
    }

    public function addToCart(Request $request)
    {
        CartShopping::addToCart($request);
        return view('pages.ajax.counter');
    }

    public function updateCart(Request $request)
    {
        CartShopping::update($request);

        $total = 0;
        foreach((array) session()->get('cart') as $id => $details)
        {
            $total += $details['price'] * $details['quantity'];
        }
        return $total ."<span class='sup_rub-big'>₽</span>";
    }

    public function removeCart(Request $request)
    {
        CartShopping::remove($request);

        $total = 0;
        foreach((array) session()->get('cart') as $id => $details)
        {
            $total += $details['price'] * $details['quantity'];
        }
         $total .= "<span class='sup_rub-big'>₽</span>";

        return ['count' => count((array) session('cart')), 'price' => $total];
    }

    public function destroyed()
    {
        CartShopping::destroy();
    }

}


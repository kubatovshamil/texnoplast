<?php

namespace App\Http\Controllers;

use App\Http\Filters\CartShopping;
use App\Models\Product;
use Illuminate\Support\Facades\Request;

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
        CartShopping::addToCart(intval(request()->get('id')));
        return view('pages.ajax.counter');
    }

    public function updateCart(Request $request)
    {
        CartShopping::update($request);
    }
}


<?php

namespace App\Http\Controllers;

use App\Http\Filters\CartShopping;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use http\Env;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function order(Request $request)
    {
        $order = Order::create($request->all());

        $products = session('cart');

        foreach ($products as $product)
        {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'title' => $product['title'],
                'price' => $product['price']
            ]);
        }

        Mail::to($request->email)->send(new OrderMail($request));
    }

}


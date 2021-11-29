<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        return view('admin.orders.index', [
            'orders' => Order::paginate(6),
        ]);
    }


    public function show(Order $order)
    {
        return view('admin.orders.show', [
            'order' => $order,
            'order_products' => OrderProduct::where('order_id', $order->id)->get()
        ]);
    }


    public function edit(Order $order)
    {
        return view('admin.orders.edit', [
            'order' => $order
        ]);
    }


    public function update(Request $request, Order $order)
    {
        $request->validate([
            'email' => 'required|email',
            'fullname' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'street' => 'required',
            'note' => 'required'
        ]);

        $order->update($request->all());
        return redirect()->route('orders.index')
            ->with('message', 'Успешно обновлен пользователь');
    }


    public function destroy(Order $order)
    {
        $order->delete();
    }
}

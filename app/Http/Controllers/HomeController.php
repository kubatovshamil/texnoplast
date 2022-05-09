<?php

namespace App\Http\Controllers;

use App\Http\Filters\CartShopping;
use App\Http\Filters\Tree;
use App\Mail\IndividualOrder;
use App\Mail\OrderPhone;
use App\Mail\OrderProvider;
use App\Models\Category;
use App\Models\Product;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController
{
    public function index()
    {
        return view('pages.index', [
            'productQuantity' => Product::all()->count(),
            'categories' => Tree::buildTree(Category::all()->toArray()),
        ]);
    }

    public function catalog()
    {
        return view('pages.catalog', [
            'productQuantity' => Product::all()->count(),
            'categories' => Tree::buildTree(Category::all()->toArray()),
            'products' => Product::paginate(8),
        ]);
    }

    public function sale()
    {
        return view('pages.sale',[
            'products' => Product::where('hit', '1')->paginate(12),
        ]);
    }

    public function search(Request $request)
    {
        return view('pages.search', [
            'products' => Product::where('title', 'LIKE', '%' . $request->q . '%')
                            ->orWhere("keywords",'LIKE', '%' . $request->q . '%')->paginate(12),
        ]);
    }


    public function invidualOrder(Request $request)
    {
        $request->validate([
            'surname' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'note' => 'required'
        ]);

        Mail::to(env('MAIL_USERNAME'))->send(new IndividualOrder($request));
    }

    public function orderPhone(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'phone' => 'required',
        ]);
        Mail::to(env('MAIL_USERNAME'))->send(new OrderPhone($request));

    }

    public function orderProvider(Request $request)
    {
        $request->validate([
            'surname' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'note' => 'required'
        ]);

        Mail::to(env('MAIL_USERNAME'))->send(new OrderProvider($request));
    }



}

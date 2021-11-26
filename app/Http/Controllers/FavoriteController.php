<?php

namespace App\Http\Controllers;

use App\Http\Filters\Favorite;
use Illuminate\Http\Request;

class FavoriteController
{

    public function index(Request $request)
    {
        return view('favorites.index', [
            'products' => $request->session()->get('favorite')
        ]);
    }

    public function store(Request $request)
    {
        Favorite::addToCart($request);
        return "<span class='favorites_msg'>". count((array) session('favorite'))  ."</span>";
    }

    public function remove(Request $request)
    {
        Favorite::remove($request);
        return  count((array) session('favorite'));
    }

    public function destroyed()
    {
        Favorite::destroy();
    }


}

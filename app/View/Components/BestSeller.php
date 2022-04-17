<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class BestSeller extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.best-seller',[
            'hits' => Product::where('hit', "1")->take(12)->get()
        ]);
    }
}

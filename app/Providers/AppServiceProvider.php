<?php

namespace App\Providers;

use App\Http\Filters\Tree;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.header', function($view){
            $view->with([ 'categories' => Tree::buildTree(Category::all()->toArray())]);
        });
    }
}

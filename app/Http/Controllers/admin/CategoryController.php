<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use function PHPUnit\Framework\exactly;

class CategoryController
{
    public function create(){
        $categories = Category::whereNull('parent_id')->get(['id','title']);
        return view('admin.pages.categories.create', compact('categories'));
    }

    public function createParentCategory(Request $request){
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'descriptions' => 'required',
            'keywords' => 'required'
        ]);

        Category::create($request->all());
        return redirect()->route('categories.create')->with('message', 'Родительская категория успешно добавлен');
    }

    public function createCategory(Request $request){
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'parent_id' => 'required',
            'descriptions' => 'required',
            'keywords' => 'required'
        ]);

        Category::create($request->all());
        return redirect()->route('categories.create')->with("message", "Категория успешно добавлен");
    }

    public function show(){
        return view('admin.pages.categories.show');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.categories.index',[
            'categories' => Category::paginate(5)
        ]);
    }

    public function create()
    {
        return view('admin.categories.create', [
            'categories' => Category::whereNull('parent_id')->get(['id','title'])
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'parent_id' => 'required',
            'descriptions' => 'required',
            'keywords' => 'required'
        ]);

        if($file = $request->file('img')){

            $destinationPath = public_path('storage/category');

            $categoryImage = date('YmdHis') . "." . $file->getClientOriginalExtension();

            $file->move($destinationPath, $categoryImage);

            Category::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'img' => $categoryImage,
                'parent_id' => $request->parent_id,
                'keywords' => $request->keywords,
                'descriptions' => $request->descriptions
            ]);
        }


        return redirect()->route('categories.index')->with('message', 'Категория успешно добавлен');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', [
            'category' => $category
        ]);
    }

    public function parentCategory(Request $request){
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'img' => 'required',
            'descriptions' => 'required',
            'keywords' => 'required'
        ]);

        if($file = $request->file('img')){

            $destinationPath = public_path('storage/category');

            $categoryImage = date('YmdHis') . "." . $file->getClientOriginalExtension();

            $file->move($destinationPath, $categoryImage);

            Category::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'img' => $categoryImage,
                'parent_id' => null,
                'keywords' => $request->keywords,
                'descriptions' => $request->descriptions
            ]);
        }

        return redirect()->route('categories.index')
            ->with('message', 'Родительская категория успешно добавлен');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category,
            'categories' => Category::whereNull('parent_id')->get(['id','title'])
        ]);
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'descriptions' => 'required',
            'keywords' => 'required'
        ]);


        if($file = $request->file('img')){

            $destinationPath = public_path('storage/category');

            $categoryImage = date('YmdHis') . "." . $file->getClientOriginalExtension();

            $file->move($destinationPath, $categoryImage);

            $category->update([
                'title' => $request->title,
                'parent_id' => $request->parent_id,
                'descriptions' => $request->descriptions,
                'keywords' => $request->keywords,
                'img' => $categoryImage
            ]);

        }else{
            $category->update($request->all());
        }

        return redirect()->route('categories.index')
            ->with('message', 'Успешно обновил данные');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('message' ,'Успешно удален категория');
    }
}

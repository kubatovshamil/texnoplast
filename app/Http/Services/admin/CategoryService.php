<?php

namespace App\Http\Services\admin;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryService
{

    public function uploadFile($request)
    {
        if($request->hasFile('img')){

            $file = $request->file('img');

            $destinationPath = public_path('storage/category');

            $categoryImage = date('YmdHis') . "." . $file->getClientOriginalExtension();

            $file->move($destinationPath, $categoryImage);

            $input = $request->all();
            $input['img'] = $categoryImage;

            Category::create($input);
        }
    }

    public function updateFile($request, $category)
    {
        if($request->hasFile('img')){

            $file = $request->file('img');
            $nameImage = '/category/' . Category::find($category->id)->img;

            if(Storage::disk('public')->exists($nameImage)){
                Storage::disk('public')->delete($nameImage);
            }

            $destinationPath = public_path('storage/category');

            $categoryImage = date('YmdHis') . "." . $file->getClientOriginalExtension();

            $file->move($destinationPath, $categoryImage);

            $input = $request->all();

            $input['img'] = $categoryImage;

            $category->update($input);

        }else{
            $category->update($request->all());
        }
    }



}

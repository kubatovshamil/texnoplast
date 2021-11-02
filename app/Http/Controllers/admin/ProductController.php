<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\AttributeName;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        $categories = Category::whereNotNull('parent_id')->get(['id','title']);
        $attribute_names = AttributeName::all();
        return view('admin.products.create', compact('categories', 'attribute_names'));
    }

    public function store(Request $request)
    {
        $data = json_decode($request->input('data'));
        $product = Product::create([
            'category_id' => intval($data->category_id),
            'title' => $data->title,
            'price' => intval($data->price),
            'specification' => $data->specification,
            'discount' => intval($data->discount),
            'img' => $data->img,
            'slug' => $data->slug,
            'descriptions' => $data->descriptions,
            'keywords' => $data->keywords
        ]);
        foreach($data->attr as $item){
            if($item->id == 0){
               $attribute = AttributeName::create([
                    'name' => $item->name
                ]);
                AttributeValue::create([
                    'product_id' => $product->id,
                    'attr_id' => $attribute->id,
                    'value' => $item->value
                ]);
            }
            if($item->id > 0){
                AttributeValue::create([
                    'product_id' => $product->id,
                    'attr_id' => $item->id,
                    'value' => $item->value
                ]);
            }
        }






    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}

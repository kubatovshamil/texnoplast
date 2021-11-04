<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\AttributeName;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use MongoDB\Driver\Session;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.products.index', compact('products'));
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
        $attributes = DB::table('attribute_names')->select('attribute_names.name','attribute_values.value', 'attribute_names.id')
            ->join('attribute_values', 'attribute_values.attr_id', '=', 'attribute_names.id')
            ->where('attribute_values.product_id', $product->id)
            ->get();


        $categories = Category::whereNotNull('parent_id')->get(['id', 'title']);

        return view('admin.products.edit', compact('product', 'categories', 'attributes'));
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

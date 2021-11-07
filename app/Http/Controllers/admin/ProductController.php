<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeName;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $category,
        $attributeValue,
        $attributeName;

    public function __construct(Category $category, AttributeName $attributeName, AttributeValue  $attributeValue){
        $this->category = $category;
        $this->attributeName = $attributeName;
        $this->attributeValue = $attributeValue;
    }

    public function index()
    {
        return view('admin.products.index',[
            'products' => Product::paginate(5)
        ]);
    }

    public function create(AttributeName $attributeName)
    {
        return view('admin.products.create', [
            'categories' => $this->category->getCategories(),
            'attributes' => $attributeName::all()
        ]);
    }

    public function store(Request $request, Product  $product)
    {
        $attributes  = $request->only('attr_name', 'attr_val');
        $attributes = array_combine($attributes['attr_name'], $attributes['attr_val']);
        $product = $product->store($request);
        $this->attributeName->store($attributes, $product->id);
        $this->attributeValue->store($attributes, $product->id);
        return redirect()->route('products.index')
            ->with('message', 'Продукт успешно добавлен');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', [
            'product' => $product,
            'categories' => $this->category->getCategories()
        ]);
    }

    public function edit(Product $product, AttributeName $attributeName)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $this->category->getCategories(),
            'items' => $attributeName::all(),
            'attributes' => $attributeName->getElements($product->id)
        ]);
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

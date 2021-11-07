<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
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

    public function store(Request $request, Product  $product, ProductService $productService)
    {
        $product = $product->store($request);
        $productService->storeAttributes($request, $product->id);
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
        $product->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount' => $request->discount,
            'slug' => $request->slug,
            'img' => $request->img,
            'keywords' => $request->keywords,
            'specification' => $request->specification,
            'descriptions' => $request->descriptions
        ]);


        //Обновление атрибутов!!!
        //удаление атрибутов!!
        //создание атрибутов!!

        return redirect()->route('products.edit', $product->id)
            ->with('message', 'Данны успешно обновлены');
    }


    public function destroy(Product $product)
    {
        $attributeValues = DB::table('attribute_values')
            ->where('product_id', $product->id)
            ->get();

        $product->delete();
        foreach ($attributeValues as $attributeValue) {
            DB::table('attribute_values')
                ->delete($attributeValue->id);
        }
        return redirect()->route('products.index')
            ->with('message', 'Продукт успешно удален');

    }
}

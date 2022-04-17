<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\admin\ProductService;
use App\Models\AttributeName;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    private $category,
        $attributeValue,
        $attributeName,
        $attributes;

    public function __construct(Category $category, AttributeName $attributeName, AttributeValue  $attributeValue){
        $this->category = $category;
        $this->attributeName = $attributeName;
        $this->attributeValue = $attributeValue;
    }

    public function index()
    {
        return view('admin.products.index',[
            'products' => Product::orderBy("id", "desc")->paginate(5)
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

        $product = $productService->uploadFile($request);

        $productService->storeAttributes($request, $product->id);

        return redirect()->route('products.index')
            ->with('message', 'Продукт успешно добавлен');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', [
            'product' => $product,
            'attributes' => $this->attributeValue->getAttributeNameValues($product->id),
            'gallery' => Gallery::where('product_id', $product->id)->get()
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


    public function update(Request $request, Product $product, ProductService $productService)
    {
        $productService->updateProduct($request, $product);

        $productService->updateAttributes($request, $product->id);

        return redirect()->route('products.edit', $product->id)
            ->with('message', 'Данны успешно обновлены');
    }


    public function destroy(Product $product)
    {
        $attributeValues = DB::table('attribute_values')
            ->where('product_id', $product->id)
            ->get();

        $productImg = '/products/' . $product->img;

        if(Storage::disk('public')->exists($productImg))
        {
            Storage::disk('public')->delete($productImg);
        }

        $gallery = Gallery::where('product_id', $product->id)->get();

        foreach ($gallery as $item)
        {
            $item = '/products/' . $item->img;
            if(Storage::disk('public')->exists($item))
            {
                Storage::disk('public')->delete($item);
            }
        }

        $product->delete();

        foreach ($attributeValues as $attributeValue) {
            DB::table('attribute_values')
                ->delete($attributeValue->id);
        }
        return redirect()->route('products.index')
            ->with('message', 'Продукт успешно удален');

    }

    public function searchProducts(Request $request){

        if(empty($request->q)){
            return redirect()->back();
        }
        return view('admin.products.index',[
            'products' =>   Product::where('article_number', 'LIKE', '%' . $request->q . '%')
                ->orderBy("id", "desc")->paginate(5),
        ]);
    }
}

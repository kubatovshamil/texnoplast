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
use function PHPUnit\Framework\isNull;

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
        $product->updateData($request);

        $attributeValues = DB::table('attribute_values')
            ->where('product_id', $product->id)
            ->get()
            ->toArray();

        $data = $request->only('attr_name', 'attr_val');

        $attributes = [];
        foreach ($attributeValues as $k => $item) {
            $attributes[] =  [
                'id' => $item->id,
                'select_id' => $data['attr_name'][$k] ?? null,
                'value' => $data['attr_val'][$k] ?? null
            ];
        }

        foreach ($attributes as $item){
            if($item['select_id']){
                DB::table('attribute_values')
                    ->where('id', $item['id'])
                    ->update([
                        'product_id' => $product->id,
                        'attr_id' => $item['select_id'],
                        'value' => $item['value']
                    ]);
            }else{
                DB::table('attribute_values')
                    ->delete($item['id']);
            }
        }

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

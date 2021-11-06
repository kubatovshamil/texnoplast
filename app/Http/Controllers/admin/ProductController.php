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
    private $category;

    public function __construct(Category $category){
        $this->category = $category;
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

    public function store(Request $request)
    {
        ddd($request);
    }

    public function show(Product $product)
    {
        return view('admin.categories.show', [
            'product' => $product,
            'categories' => $this->category->getCategories()
        ]);
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

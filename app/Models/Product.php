<?php

namespace App\Models;

use App\Http\Services\ProductService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\returnArgument;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'price',
        'specification',
        'discount',
        'img',
        'slug',
        'keywords',
        'descriptions'
    ];


    public function store($request){

        if($file = $request->file('img')){
            $destinationPath = public_path('/storage/products/');

            $productImage = date('YmdHis') . "." . $file->getClientOriginalExtension();

            $file->move($destinationPath, $productImage);

            return Product::create([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'discount' => $request->discount,
                'slug' => $request->slug,
                'specification' => $request->specification,
                'descriptions' => $request->descriptions,
                'keywords' => $request->keywords,
                'img' => $productImage,

            ]);
        }

    }

}

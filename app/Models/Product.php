<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
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
        return Product::create($request->except('attr_name', 'attr_val'));
    }

    public function updateData($request){
        return $this->update([
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
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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


    public function getAttributes($data){
        return DB::table('attribute_names')->select('attribute_names.id','attribute_names.name','attribute_values.value')
            ->join('attribute_values', 'attribute_values.attr_id', '=', 'attribute_names.id')
            ->where('attribute_values.product_id', $data->id)
            ->get();
    }

}

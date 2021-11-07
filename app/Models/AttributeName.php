<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AttributeName extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];


    public function store($data, $id){
        foreach ($data as $k => $item){
            if(is_string($k)){
                $attribute = AttributeName::create([
                    'name' => $k
                ]);
                AttributeValue::create([
                    'attr_id' => $attribute->id,
                    'value' => $item,
                    'product_id' => $id,
                ]);
            }
        }
    }


        public function getElements($id)
        {
            return DB::table('attribute_names')->select('attribute_names.id', 'attribute_names.name', 'attribute_values.value')
                ->join('attribute_values', 'attribute_values.attr_id', '=', 'attribute_names.id')
                ->where('attribute_values.product_id', $id)
                ->get();
        }

}

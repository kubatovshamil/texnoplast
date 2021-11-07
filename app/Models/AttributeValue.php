<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{

    use HasFactory;

    protected $fillable = [
        'attr_id',
        'product_id',
        'value'
    ];

    public function store($data, $id){
        foreach ($data as $k => $item){
            if(is_numeric($k)){
                AttributeValue::create([
                    'attr_id' => $k,
                    'value' => $item,
                    'product_id' => $id
                ]);
            }
        }

    }


}

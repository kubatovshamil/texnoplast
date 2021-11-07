<?php

namespace App\Http\Services;

use App\Models\AttributeName;
use App\Models\AttributeValue;

class ProductService
{

    public function storeAttributes($request, $id){
        $attributes  = $request->only('attr_name', 'attr_val');
        $attributes = array_combine($attributes['attr_name'], $attributes['attr_val']);

        foreach ($attributes as $k => $attribute){
            if(is_numeric($k)){
                AttributeValue::create([
                    'attr_id' => $k,
                    'product_id' => $id,
                    'value' => $attribute
                ]);
            }else{
                $attributeName = AttributeName::create([
                    'name' => $k
                ]);
                AttributeValue::create([
                    'attr_id' => $attributeName->id,
                    'product_id' => $id,
                    'value' => $attribute
                ]);
            }

        }
    }


}

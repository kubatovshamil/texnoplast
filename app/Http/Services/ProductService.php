<?php

namespace App\Http\Services;

use App\Models\AttributeName;
use App\Models\AttributeValue;

class ProductService
{

    public $attributeValue;

    public function __construct(AttributeValue $attributeValue)
    {
        $this->attributeValue = $attributeValue;
    }

    public function deleteAttributes($id){

        $attributes = $this->attributeValue->getAttributeValues($id);
        foreach ($attributes as $item){
            AttributeValue::destroy($item->id);
        }

    }

    public function storeAttributes($request, $id){

        $attributes  = $request->only('attr_name', 'attr_val');
        $newArr = [];
        foreach ($attributes['attr_name'] as $k => $item) {
            $newArr[] =  [
                'id' => $attributes['attr_name'][$k],
                'value' => $attributes['attr_val'][$k] ?? null
            ];
        }

        foreach ($newArr as $attribute){
            if(is_numeric($attribute['id'])){
                AttributeValue::create([
                    'attr_id' => $attribute['id'],
                    'product_id' => $id,
                    'value' => $attribute['value']
                ]);
            }else{
                $attributeName = AttributeName::create([
                    'name' => $attribute['id']
                ]);
                AttributeValue::create([
                    'attr_id' => $attributeName->id,
                    'product_id' => $id,
                    'value' => $attribute['value']
                ]);
            }

        }
    }


}

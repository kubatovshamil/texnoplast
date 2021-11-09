<?php

namespace App\Http\Services;

use App\Models\AttributeName;
use App\Models\AttributeValue;

class ProductService
{

    public $attributeValue,
           $attributes;

    public function __construct(AttributeValue $attributeValue)
    {
        $this->attributeValue = $attributeValue;
    }

    public function storeAttributes(){

    }

    public function updateAttributes($request, $id)
    {
        ddd($this->getAttributes($request));
        foreach ($this->getAttributes($request) as $attribute){
            if($attribute['id']){
                AttributeValue::where('id', $attribute['id'])
                    ->update([
                        'attr_id' => $attribute['attr_id'],
                        'value' => $attribute['value']
                    ]);
            }

            if(!$attribute['id'] && $attribute['attr_id'])

            if(!$attribute['id']){

                $name = AttributeName::create([
                    'name' => $attribute['attr_id']
                ]);

                AttributeValue::create([
                    'attr_id' => $name->id,
                    'value' => $attribute['value'],
                    'product_id' => $id,
                ]);
            }
        }
    }

    public function getAttributes($request){
        $attributes = $request->only('attr_name', 'attr_val', 'attr_id');
        $data = [];

        if(count($attributes['attr_name']) > count($attributes['attr_id'])){
            $data[] = $attributes['attr_name'];
        }else{
            $data[] = $attributes['attr_id'];
        }

        foreach ($data[0] as $k => $item){
            $this->attributes[] = [
                'id' =>   $attributes['attr_id'][$k] ?? null,
                'attr_id' => $attributes['attr_name'][$k] ?? null,
                'value' => $attributes['attr_val'][$k] ?? '',
            ];
        }
        return $this->attributes;
    }


}

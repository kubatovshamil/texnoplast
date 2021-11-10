<?php

namespace App\Http\Services;

use App\Models\AttributeName;
use App\Models\AttributeValue;

class ProductService
{

    public $attributeValue;
    public $attributes;
    public $data;

    public function __construct(AttributeValue $attributeValue)
    {
        $this->attributeValue = $attributeValue;
    }

    public function storeAttributes(){

    }

    public function updateAttributes($request, $id)
    {
        $attributes = $this->getAttributes($request);

        foreach ($attributes as $k => $attribute) {
            if(isset($attribute['attr_id'])){
                if(isset($attribute['attr_name'])){
                    AttributeValue::where('id', $attribute['attr_id'])
                        ->update([
                            'attr_id' => $attribute['attr_name'],
                            'value' => $attribute['attr_val'],
                            'product_id' => $id
                        ]);
                }else{
                    AttributeValue::destroy($attribute['attr_id']);
                }
            }else{

                if(is_numeric($attribute['attr_name'])){
                    AttributeValue::create([
                        'attr_id' => $attribute['attr_name'],
                        'value' => $attribute['attr_val'],
                        'product_id' => $id,
                    ]);
                }else{
                    $name = AttributeName::create([
                        'name' => $attribute['attr_name']
                    ]);
                    AttributeValue::create([
                        'attr_id' => $name->id,
                        'value' => $attribute['attr_val'],
                        'product_id' => $id,
                    ]);
                }
            }
        }
    }


    public function getAttributes($request){

        $attributes = $request->only('attr_name', 'attr_val', 'attr_id');

        $names = array_keys($attributes);
        $data = [];
        array_walk($attributes, function ($item, $key) use ($attributes, &$data, $names){

            array_walk($item, function ($value, $k) use ($attributes, $names, &$data, $key){

                if($attributes[$key]  == $attributes[$names[0]]){
                    if(is_numeric($value)){
                        $data[$k][$key] =  (int) $value;
                    }else{
                        $data[$k][$key] = $value;
                    }
                } elseif ($attributes[$key] == $attributes[$names[1]]){
                    $data[$k][$key]  = $value;
                }elseif ($attributes[$key] == $attributes[$names[2]]){
                    $data[$k][$key] = (int) $value;
                }

            });

        });

        return collect($data);
    }


}

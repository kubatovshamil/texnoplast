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
        $this->getAttributes($request);
    }

    public function getAttributes($request){

        $attributes = $request->only('attr_name', 'attr_val', 'attr_id');

         ddd($this->compactArray($attributes));
    }

    public function compactArray($attributes)
    {
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

<?php

namespace App\Http\Services\admin;

use App\Models\AttributeName;
use App\Models\AttributeValue;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{

    public $attributeValue;
    public $attributes;
    public $data;
    public $product;

    public function __construct(AttributeValue $attributeValue)
    {
        $this->attributeValue = $attributeValue;
    }

    public function uploadFile($request)
    {
        if($files = $request->file('img')){

            $destinationPath = public_path('/storage/products/');

            foreach ($files as $k => $file)
            {
                if($files[0] == $file){
                    $productImage = date('YmdHis') . $k . "." . $file->getClientOriginalExtension();
                    $file->move($destinationPath, $productImage);
                    $input = $request->all();
                    $input['img'] = $productImage;
                    $this->product = Product::create($input);
                }else{

                    $productImage = date('YmdHis') . $k . "." . $file->getClientOriginalExtension();
                    $file->move($destinationPath, $productImage);
                    Gallery::create([
                        'product_id' => $this->product->id,
                        'img' => $productImage
                    ]);

                }

            }
        }
        return $this->product;
    }

    public function updateProduct($request, $product)
    {
        if($request->hasFile('img'))
        {
            $file = $request->file('img');

            $request = $request->except('attr_name', 'attr_val');

            $destinationPath = public_path('/storage/products/');

            $imgName = '/products/' . Product::find($product->id)->img;

            $productImage = date('YmdHis') . "." . $file->getClientOriginalExtension();

            if(Storage::disk('public')->exists($imgName))
            {
                Storage::disk('public')->delete($imgName);
            }

            $gallery = Gallery::where('product_id', $product->id);

            foreach ($gallery as $item)
            {
                $galleryImg = '/products/' . $item->img;

                if(Storage::disk('public')->exists($galleryImg))
                {
                    Storage::disk('public')->delete($galleryImg);
                }
            }

            $file->move($destinationPath, $productImage);

            $input =  $request;

            $input['img'] = $productImage;

            return $product->update($input);
        }

        $request = $request->except('attr_name', 'attr_val');

        if(!isset($request['hit'])){
            $request['hit'] = "0";
        }

        return $product->update($request);

    }

    public function storeAttributes($request, $id)
    {
        $attributes = $this->getAttributes($request);
        foreach ($attributes as $attribute)
        {
            if(is_numeric($attribute['attr_name']))
            {
                $this->attributeValue->createAttribute($attribute, $id);
            }else{
                $this->attributeValue->createAttributes($attribute, $id);
            }
        }

    }

    public function updateAttributes($request, $id)
    {
        $attributes = $this->getAttributes($request);

        foreach ($attributes as $k => $attribute) {

            if(isset($attribute['attr_id'])){

                if(isset($attribute['attr_name'])){
                    $this->attributeValue->updateAttributes($attribute, $id);
                }
                else{
                    $this->attributeValue->destroyAttribute($attribute['attr_id']);
                }
            }
            if(!isset($attribute['attr_id']))
            {
                if(is_numeric($attribute['attr_name'])){
                    $this->attributeValue->createAttribute($attribute, $id);
                }
                else{
                    $this->attributeValue->updateAttributes($attribute, $id);
                }
            }

        }
    }

    public function getAttributes($request)
    {

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

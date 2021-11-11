<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AttributeValue extends Model
{

    use HasFactory;

    protected $fillable = [
        'attr_id',
        'product_id',
        'value'
    ];

    public function getAttributeNameValues($id)
    {
        return DB::table('attribute_values')
            ->where('product_id', $id)
            ->join('attribute_names', 'attribute_values.attr_id', '=', 'attribute_names.id')
            ->select('name', 'value')
            ->get();

    }

    public function getAttributeValues($id)
    {
        return DB::table('attribute_values')
            ->where('product_id', $id)
            ->get();
    }

    public function updateAttributes($attribute, $id)
    {
        AttributeValue::where('id', $attribute['attr_id'])
            ->update([
                'attr_id' => $attribute['attr_name'],
                'value' => $attribute['attr_val'],
                'product_id' => $id
            ]);
    }

    public function destroyAttribute($id)
    {
        AttributeValue::destroy($id);
    }

    public function createAttribute($attribute, $id)
    {
        AttributeValue::create([
            'attr_id' => $attribute['attr_name'],
            'value' => $attribute['attr_val'],
            'product_id' => $id,
        ]);
    }

    public function createAttributes($attribute, $id)
    {
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

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


    public function getAttributeValues($id){
        return DB::table('attribute_values')
            ->where('product_id', $id)
            ->get();
    }
}

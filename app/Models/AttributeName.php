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

    public function getElements($id)
    {
        return DB::table('attribute_names')->select('attribute_names.id as attr_id', 'attribute_values.id as id', 'attribute_names.name', 'attribute_values.value')
            ->join('attribute_values', 'attribute_values.attr_id', '=', 'attribute_names.id')
            ->where('attribute_values.product_id', $id)
            ->get();
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{

    protected $primaryKey  = 'attr_id';

    use HasFactory;

    protected $fillable = [
        'attr_id',
        'product_id',
        'value'
    ];

    public function attributeNames(){
        return $this->belongsTo(AttributeName::class, 'attr_id', 'id');
    }


    public function products(){
        return $this->belongsTo(Product::class, 'product_id');
    }

}

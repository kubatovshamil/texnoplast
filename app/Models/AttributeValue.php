<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{

    use HasFactory;

    protected $fillable = [
        'attr_id',
        'product_id',
        'value'
    ];


}

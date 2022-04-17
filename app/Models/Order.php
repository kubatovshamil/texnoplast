<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'mobile',
        'email',
        'city',
        'street',
        'house',
        'apartament',
        'note',
    ];
}

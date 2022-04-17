<?php

namespace App\Models;

use App\Http\Services\ProductService;
use ArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\returnArgument;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'article_number',
        'category_id',
        'price',
        'specification',
        'discount',
        'img',
        'slug',
        'keywords',
        'descriptions',
        'hit'
    ];

}

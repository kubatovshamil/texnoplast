<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'img',
        'parent_id',
        'keywords',
        'descriptions'
    ];

    public function getCategories(){
        return DB::table('categories')
            ->whereNull('parent_id')
            ->get();
    }

}

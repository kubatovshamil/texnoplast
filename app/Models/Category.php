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
            ->whereNotNull('parent_id')
            ->get();
    }


    public static function getNames($category, $subCategory)
    {
        return DB::table('categories')
            ->where('slug', $category)
            ->orWhere('slug', $subCategory)
            ->get(['title', 'slug']);
    }

    public static function getCategoriesBySlug($slug)
    {
        $currentCategory = Category::where('slug', $slug)->whereNull("parent_id")->first();
        if(!$currentCategory){
            abort(404);
        }
        
        return DB::table('categories')
            ->where('slug', $slug)
            ->orWhere('parent_id', $currentCategory->id)
            ->get();
    }


}

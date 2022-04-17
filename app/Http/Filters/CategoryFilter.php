<?php

namespace App\Http\Filters;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Facade;
class CategoryFilter
{

    private static $ids;

    public static function getProducts($slug)
    {
        $categories = Category::getCategoriesBySlug($slug);
        
        self::setIds($categories);

        self::$ids = explode(",", rtrim(self::$ids, ','));

        return Product::whereIn('category_id', self::$ids)
            ->paginate(12);
    }

    public static function setIds($categories)
    {
        foreach ($categories as $category)
        {
            if($category->parent_id)
            {
                self::$ids .= $category->id . ',';
            }
        }
    }

}

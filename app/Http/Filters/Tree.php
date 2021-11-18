<?php

namespace App\Http\Filters;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Facade;

class Tree
{

    public static function buildTree(Array $data, $parent = 0)
    {
        $tree = array();
        foreach ($data as $d) {
            if ($d['parent_id'] == $parent) {
                $children = static::buildTree($data, $d['id']);
                if (!empty($children)) {
                    $d['_children'] = $children;
                }
                $tree[] = $d;
            }
        }
        return $tree;
    }

    public static function getProducts($slug)
    {
        $data = (object) [];

        $category = Category::where('slug', $slug)->first();
        $categories = Category::where('parent_id', $category->id)->get();

        foreach($categories as $k => $category)
        {
            $data = Product::where('category_id', $category->id)->paginate(12);
        }

        return $data;
    }
}

<?php

namespace App\Http\Filters;
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

}

<?php

namespace App\Helpers;

use Illuminate\Support\Collection;
use App\Category;

class Helper
{
	//Lấy tất cả các danh mục thuộc một danh mục
    public static function getCategories(Category $category, Collection $res)
    {
    	$res->push($category);
    	if(count($category->childs)) {
    		foreach ($category->childs as $category) {
    			Helper::getCategories($category, $res);
    		}
    	}
    	return $res;
    }

}

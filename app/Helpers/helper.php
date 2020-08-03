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

    //tạo đường dẫn đến danh mục
    public static function breadcrumbs(Category $category, String $res)
    {
        if ($res == "") {
            $res = "/ " . $category->name . " " . $res;
        }
        else {
            $res = "/ <a href='". url('/categories/'.$category->id.'/products') ."'>" . $category->name . "</a> " . $res;
        }

        if(!isset($category->parent)) {
            $res = "<a href='". url('/') ."'>Trang chủ</a> " . $res;
        }
        else {
            $res = Helper::breadcrumbs($category->parent, $res);
        }
        return $res;
    }
}

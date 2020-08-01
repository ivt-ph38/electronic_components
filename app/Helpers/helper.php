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

    //Lấy tất cả các sản phẩm thuộc một danh mục
    public static function getProductsByCategory(Category $category)
    {
        $products = new Collection;
        $categories = new Collection;
        $categories = Helper::getCategories($category, $categories);
        foreach ($categories as $category_item) {
            foreach ($category_item->products as $product) {
                $products->push($product);
            }
        }
        return $products;
    }

}

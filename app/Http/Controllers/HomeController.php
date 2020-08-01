<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\product;
use Illuminate\Support\Collection;
use Helper;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$menus = Category::where('parent_id', '=', 0)->get();
        $res = new Collection;
        foreach ($menus as $category) {
            $categories = new Collection;
            $categories = Helper::getCategories($category, $categories)->pluck('id')->toArray();
            $products = Product::whereIn('category_id', $categories)->orderBy('id', 'desc')->take(8)->get();
            $category->setAttribute('top_products', $products);
            $res->push($category);   
        }
        return view('pages.home',compact('menus', 'res'));
    }
}

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

            //lấy tất cả product
            $products = Helper::getProductsByCategory($category);

            $top_products = $products->sortByDesc('id')->take(8);
            $category->setAttribute('top_products', $top_products);
            $res->push($category);   
        }
        return view('pages.home',compact('menus', 'res'));
    }
}

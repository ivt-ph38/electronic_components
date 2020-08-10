<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\product;
use Illuminate\Support\Collection;
use Helper;

class HomeController extends Controller
{
    const PAGE = 5;
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

    public function listProductsByCategory(Request $request)
    {
        $menus = Category::where('parent_id', '=', 0)->get();
        $category = Category::findOrFail($request->id);
        $categories = new Collection;
        $categories = Helper::getCategories($category, $categories)->pluck('id')->toArray();

        $query = Product::whereIn('category_id', $categories);
        $filter = [];

        if ($request->orderby) {
            if ($request->orderby == 'price-asc') {
                $query->orderBy('price', 'asc');
                $filter['orderby'] = 'price-asc';
            }
            elseif ($request->orderby == 'price-desc') {
                $query->orderBy('price', 'desc');
                $filter['orderby'] = 'price-desc';
            }
            else {
                $query->orderBy('id', 'desc');
            }
        }
        else {
            $query->orderBy('id', 'desc');
        }

        if ($request->groupby) {
            if ($request->groupby == 'on_sale') {
                $query->where('discount', '<>' , null);
                $filter['groupby'] = 'on_sale';
            }
            if ($request->groupby == 'available') {
                $query->where('status', 1);
                $filter['groupby'] = 'available';
            }
        }
        //$products = $query->get();
        $products = $query->paginate(self::PAGE);
        $breadcrumbs = Helper::breadcrumbs($category, "");
        return view('pages.list_products_by_category',compact('menus', 'products', 'category', 'breadcrumbs', 'filter'));
    }

    public function searchByName(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->key . '%')->get();
        return response()->json($products); 
    }
}

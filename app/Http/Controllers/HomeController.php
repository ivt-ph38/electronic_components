<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

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
        $allMenus = Category::pluck('name','id')->all();
        return view('home',compact('menus','allMenus'));
    }
}

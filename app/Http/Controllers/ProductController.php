<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $product = new Product;

        $product->name  =   $request->name;
        $product->slug  =   $request->slug;
        $product->description   =   $request->description;
        $product->detail    =   $request->price;
        $product->price     =   preg_replace('/\D/', '', $request->price);
        $product->quantity  =   $request->quantity;
        $product->discount  =   $request->discount;
        $product->status    =   $request->status;
        $product->image     =   $request->image;
        $product->category_id   =   $request->category_id;
        $product->save();

        return redirect(route('admin.products.index'))->with('success', 'Sản phẩm đã được lưu.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::find($id);
        
        $product->name  =   $request->name;
        $product->slug  =   $request->slug;
        $product->description   =   $request->description;
        $product->detail    =   $request->price;
        $product->price     =   preg_replace('/\D/', '', $request->price);
        $product->quantity  =   $request->quantity;
        $product->discount  =   $request->discount;
        $product->status    =   $request->status;
        $product->image     =   $request->image;
        $product->category_id   =   $request->category_id;
        $product->save();

        return redirect(route('admin.products.index'))->with('success', 'Sản phẩm cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function copy($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        return view('admin.products.copy',compact('product','categories'));
    }

    public function clone(ProductUpdateRequest $request)
    {
    
        $product = new Product;

        $product->name  =   $request->name;
        $product->slug  =   $request->slug;
        $product->description   =   $request->description;
        $product->detail    =   $request->price;
        $product->price     =   preg_replace('/\D/', '', $request->price);
        $product->quantity  =   $request->quantity;
        $product->discount  =   $request->discount;
        $product->status    =   $request->status;
        $product->image     =   $request->image;
        $product->category_id   =   $request->category_id;
        $product->save();

        return redirect(route('admin.products.index'))->with('success', 'Sao chép sản phẩm thành công.');
    }
    

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect(route('admin.products.index'))->with('success', 'Xóa sản phẩm thành công');

    }
}

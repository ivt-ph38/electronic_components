<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Session;
use Cart;

session_start();
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Category::where('parent_id', '=', 0)->get();
        return view('pages.cart',compact('cart', 'menus'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        $data['id'] = $product->id;
        $data['qty'] = 1;
        $data['name'] = $product->name;
        $data['price'] = $product->price;
        $data['weight'] = "123";
        $data['option'] = ['image' => $product->image];
        Cart::add($data);  
        return redirect('/cart');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function remove(Request $request)
    {
        $rowId = $request->rowId;
        Cart::remove($rowId);
        return response()->json(['view' => view('pages.cart_content')->render()], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

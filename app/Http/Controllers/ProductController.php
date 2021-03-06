<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ProductImage;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Collection;
use Helper;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','DESC')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = \File::allFiles(public_path('images'));
        // $images = Productimage::join('products','products.id','=','product_images.product_id')->select('product_images.*', 'categories.name as category_name')->get();
        $categories = Category::where('parent_id', '=', 0)->get();
        return view('admin.products.create', compact('categories','images'));
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
        $product->slug  =   str_slug($request->name, "-");
        $product->description   =   $request->description;
        $product->detail    =   $request->detail;
        $product->price     =   preg_replace('/\D/', '', $request->price);
        $product->quantity  =   $request->quantity;
        $product->discount  =   $request->discount;
        $product->image     =   $request->image;
        if ($product->quantity >= 1) {
            $product->status = 1;
        }
        else {
            $product->status = 0;
        }
        $product->category_id   =   $request->category_id;
        $product->save();

        // if ($request->has('image')) {
        //     $image = $request->file('image');
        //     $newName = md5(microtime(true)).$image->getClientOriginalName();
        //     $image->move(public_path('images/products/'), $newName);
        //     $path = '/images/products/'.$newName;
        //     $product->image = $path;
        // }
        // $product->save();
        
        if ($request->has('product_images')) {
            $images = $request->file('product_images');
            foreach ($images as $item) {
                $newName = md5(microtime(true)).$item->getClientOriginalName();
                $item->move(public_path('images/products/'), $newName);
                $path= '/images/products/'.$newName;
                $image = ProductImage::create([
                    'path' => $path,
                    'product_id' => $product->id,
                ]);
            }
        }

        return redirect(route('admin.products.index'))->with('success', 'Sản phẩm đã được lưu.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id','=', $id)->first();
        $menus = Category::where('parent_id', '=', 0)->get();
        $res = new Collection;
        $relateds = Product::where('slug', '!=', $product->slug)->where('category_id', '=', $product->category_id)->orderBy('id', 'DESC')->limit(8)->get();
        // foreach ($menus as $category) {

        //     //lấy tất cả product
        //     // $products = Helper::getProductsByCategory($category);
        //     // $top_products = $products->sortByDesc('id')->take(8);
        //     // $category->setAttribute('top_products', $top_products);
        //     // $res->push($category);   
        // }
         return view('home.products.show',compact('menus', 'res','product','relateds'));
    }

    public function listProducts(Request $request)
    {
        $menus = Category::where('parent_id', '=', 0)->get();

        $query = Product::where('id', '<>', 0);
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
        $products = $query->paginate(12);

        return view('home.products.all',compact('products','menus', 'filter'));
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
        $categories = Category::where('parent_id', '=', 0)->get();
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
        $product->slug  =   str_slug($request->name, "-");
        $product->description   =   $request->description;
        $product->detail    =   $request->detail;
        $product->price     =   preg_replace('/\D/', '', $request->price);
        $product->quantity  =   $request->quantity;
        $product->discount  =   $request->discount;
        if ($product->quantity >= 1) {
            $product->status = 1;
        }
        else {
            $product->status = 0;
        }
        $product->category_id   =   $request->category_id;
        if ($request->has('image')) {
            $image = $request->file('image');
            $newName = md5(microtime(true)).$image->getClientOriginalName();
            $image->move(public_path('images/products/'), $newName);
            $path = '/images/products/'.$newName;
            $product->image = $path;
        }
        $product->save();
        
        if ($request->has('product_images')) {
            $images = $request->file('product_images');
            foreach ($images as $item) {
                $newName = md5(microtime(true)).$item->getClientOriginalName();
                $item->move(public_path('images/products/'), $newName);
                $path= '/images/products/'.$newName;
                $image = ProductImage::create([
                    'path' => $path,
                    'product_id' => $product->id,
                ]);
            }
        }
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

    public function clone(ProductUpdateRequest $request, $id)
    {
    
        $product = new Product;

        $product->name  =   $request->name;
        $product->slug  =   $request->slug;
        $product->description   =   $request->description;
        $product->detail    =   $request->price;
        $product->price     =   preg_replace('/\D/', '', $request->price);
        $product->quantity  =   $request->quantity;
        $product->discount  =   $request->discount;
        if ($product->quantity >= 1) {
            $product->status = 1;
        }
        else {
            $product->status = 0;
        }
        $product->category_id   =   $request->category_id;
        if ($request->has('image')) {
            $image = $request->file('image');
            $newName = md5(microtime(true)).$image->getClientOriginalName();
            $image->move(public_path('images/products/'), $newName);
            $path = '/images/products/'.$newName;
            $product->image = $path;
        }
        $product->save();
        
        if ($request->has('product_images')) {
            $images = $request->file('product_images');
            foreach ($images as $item) {
                $newName = md5(microtime(true)).$item->getClientOriginalName();
                $item->move(public_path('images/products/'), $newName);
                $path= '/images/products/'.$newName;
                $image = ProductImage::create([
                    'path' => $path,
                    'product_id' => $product->id,
                ]);
            }
        }    
        $product->save();
          

        return redirect(route('admin.products.index'))->with('success', 'Sao chép sản phẩm thành công.');
    }
    

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect(route('admin.products.index'))->with('success', 'Xóa sản phẩm thành công');

    }

    public function destroy_image($id)
    {
        $product_image = ProductImage::findOrFail($id);
        $product_id = $product_image->product_id;
        $product_image->delete();
        return redirect(route('admin.products.edit', ['id' => $product_id]))->with('success', 'Xóa ảnh thành công');

    }

    public function search(Request $request)
    {

            $products = Product::join('categories','categories.id','=','products.category_id')->where('products.name', 'LIKE', '%' . $request->search . '%')->orderBy('products.id','DESC')->select('products.*', 'categories.name as category_name')->take(20)->get();
            return response()->json($products); 
      
    }    
}
    // $images = Productimage::join('products','products.id','=','product_images.product_id')->select('product_images.*', 'categories.name as category_name')->get();
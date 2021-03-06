<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Product;
use App\Category;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\BlogUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Session;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id','DESC')->get();
        return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = \File::allFiles(public_path('images'));
        return view('admin.blogs.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(BlogCreateRequest $request)
    {
        $blog = new Blog;

        $blog->title = $request->title;
        $blog->slug = str_slug($request->title, "-");
        $blog->description = $request->description;
        $blog->content = $request->content;
        // if ($request->has('image')) {
        //     $image = $request->file('image');
        //     $newName = md5(microtime(true)).$image->getClientOriginalName();
        //     $image->move(public_path('images/blogs/'), $newName);
        //     $path = '/images/blogs/'.$newName;
        //     $blog->image = $path;
        // }
        $blog->image = $request->image;       
        $blog->save();
        return redirect(route('admin.blogs.index'))->with('success', 'Thêm Tin Tức thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        
        $menus = Category::where('parent_id', '=', 0)->get();
        $res = new Collection;
        $blogs = Blog::paginate(3);
        return view('home.blogs.search',compact('menus', 'res','blogs'));
    }

    public function ShowBlogById($id)
    {
        $menus = Category::where('parent_id', '=', 0)->get();
        $res = new Collection;
        $blog = Blog::where('slug', $id)->first();    
        return view('home.blogs.show',compact('menus', 'res','blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogUpdateRequest $request, $id)
    {
        $blog = Blog::find($id);

        $blog->title = $request->title;
        $blog->slug = str_slug($request->title, "-");;
        $blog->description = $request->description;
        $blog->content = $request->content;
        $blog->image = $request->image;
        $blog->save();

        return redirect(route('admin.blogs.index'))->with('success', 'Tin tức đã được chỉnh sửa.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $blog = Blog::find($id);
         $blog->delete();
         return redirect(route('admin.blogs.index'))->with('success', 'Tin tức đã được xóa.');
    }
}

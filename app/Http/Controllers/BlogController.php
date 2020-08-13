<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Product;
use App\Category;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Http\Requests\BlogCreateRequest;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::get();
        return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $blog->slug = $request->slug;
        $blog->description = $request->description;
        $blog->content = $request->content;
        if ($request->has('image')) {
            $image = $request->file('image');
            $newName = md5(microtime(true)).$image->getClientOriginalName();
            $image->move(public_path('images/blogs/'), $newName);
            $path = '/images/blogs/'.$newName;
            $blog->image = $path;
        }        
        $blog->save();

        return redirect(route('admin.blogs.index'))->with('success', 'Tin tức đã được lưu.');
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
        $blogs = Blog::all();
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
    public function update(BlogCreateRequest $request, $id)
    {
        $blog = Blog::find($id);

        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->description = $request->description;
        $blog->image = $request->image;
        $blog->content = $request->content;
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

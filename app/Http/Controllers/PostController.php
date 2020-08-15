<?php

namespace App\Http\Controllers;
use App\Post;
use App\Product;
use App\Category;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->left = $request->left;
        $post->bottom = $request->bottom;
        $post->bottom1 = $request->bottom1;
        $post->content = $request->content;
        $post->save();
        
        return redirect(route('admin.posts.index'))->with('success', 'Bài viết đã được lưu.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menus = Category::where('parent_id', '=', 0)->get();
        $res = new Collection;
        $post = Post::where('slug', $id)->first();    
        return view('home.posts.show',compact('menus', 'res','post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit',compact('post'));
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
        $post = Post::find($id);

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->left = $request->left;
        $post->bottom = $request->bottom;
        $post->bottom1 = $request->bottom1;
        $post->content = $request->content;
        $post->save();
        
        return redirect(route('admin.posts.index'))->with('success', 'Bài viết đã được chỉnh sửa.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect(route('admin.posts.index'))->with('success', 'Bài viết đã được Xoá.');
    }
}

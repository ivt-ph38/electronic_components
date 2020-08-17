<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CommentCreateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('id', 'desc')->paginate(20);
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentCreateRequest $request)
    {
        $data = $request->except('_token');
        Comment::create($data);
        return redirect(url('/products/'.$request->product_id.'/#comments-box'));
    }

    public function getComments(Request $request)
    {
        $product = Product::find($request->product_id);
        $comments = Comment::where('parent_id', 0)->where('product_id', $product->id)->orderBy('id', 'desc')->skip($request->count_comments)->take(5)->get();
        $data['view'] = view('home.products.get_comments', compact('product', 'comments'))->render();
        $data['count'] = $request->count_comments + count($comments);
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $comment = Comment::findOrFail($request->id);
        foreach ($comment->childs as $item) {
            $item->delete();
        }
        $comment->delete();
        $request->session()->flash('alert-success', 'Xóa bình luận thành công');
        return redirect(route('admin.comments.index'));
    }
}

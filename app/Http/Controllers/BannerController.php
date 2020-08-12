<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use App\Http\Requests\BannerCreateRequest;
use App\Http\Requests\BannerUpdateRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::All();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerCreateRequest $request)
    {
        if ($request->has('image')) {
            $image = $request->file('image');
            $newName = md5(microtime(true)).$image->getClientOriginalName();
            $image->move(public_path('images/banners/'), $newName);
            $path = '/images/banners/'.$newName;
        }
        $request->request->add(['path' => $path]);
        $data = $request->except('_token');
        Banner::create($data);
        $request->session()->flash('alert-success', 'Thêm banner thành công');
        return redirect(route('admin.banners.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $banner = Banner::findOrFail($request->id);
        return view('admin.banners.edit', compact('banner'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerUpdateRequest $request)
    {
        $banner = Banner::findOrFail($request->id);
        if ($request->has('image')) {
            unlink(public_path($banner->path));
            $image = $request->file('image');
            $newName = md5(microtime(true)).$image->getClientOriginalName();
            $image->move(public_path('images/banners/'), $newName);
            $path = '/images/banners/'.$newName;
            $request->request->add(['path' => $path]);
        }
        $data = $request->except('_token');
        
        $banner->update($data);
        $request->session()->flash('alert-success', 'Sửa banner thành công');
        return redirect(route('admin.banners.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $banner = Banner::findOrFail($request->id);
        unlink(public_path($banner->path));
        $banner->delete();
        $request->session()->flash('alert-success', 'Xóa banner thành công');
        return redirect(route('admin.banners.index'));

    }
}

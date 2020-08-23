<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryCreateRequest;
use Helper;
use Illuminate\Support\Collection;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('childs')->where('parent_id', '=', 0)->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        $request->request->add(['slug' => str_slug($request->name)]);
        $data = $request->except('_token');
        Category::create($data);
        return redirect(route('admin.categories.index'))->with('success', 'Danh mục đã được lưu.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::where('parent_id', '=', 0)->get();

/*       $categories = new Collection;
        $categories = $all_categories->diff(Helper::getCategories($category, $categories));   */
        return view('admin.categories.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryCreateRequest $request)
    {
        $category = Category::findOrFail($request->id);
        $data = $request->except(['_method','_token']);
        $category->update($data);
        return redirect(route('admin.categories.index'))->with('success', 'Cập nhật danh mục thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $category = Category::find($request->id);
        $categories = new Collection;
        $categories = Helper::getCategories($category, $categories);
        $i = 0;
        foreach ($categories as $category) {
            if (count($category->products) != 0) {
                $i++;
            }
        }
        if ($i == 0) {
            foreach ($categories as $category) {
                $category->delete();
            }
            $request->session()->flash('alert-success', 'Xóa danh mục thành công');
            return redirect(route('admin.categories.index'));
        }
        else {
            $request->session()->flash('alert-danger', 'Không thể xóa danh mục này');
            return redirect(route('admin.categories.index'));
        }
    }
}
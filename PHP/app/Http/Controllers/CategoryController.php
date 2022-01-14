<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=category::all();
        return view('admin.category')->with('categories',$categories);
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
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_name' => 'required',
            'category_desc' => 'required',
            'category_status' => 'required'
        ]);
        $data = $request->all();
        $category = new category();
        $category->category_name = $data['category_name'];
        $category->category_desc = $data['category_desc'];
        $category->category_status = $data['category_status'];
        $category->save();
    	Session::put('message','Thêm danh mục sản phẩm thành công!');
        return Redirect::to('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($category_id)
    {
        $edit_category=category::where('category_id',$category_id)->get();
        return view('admin.category')->with('edit_category',$edit_category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        $this->validate($request,[
            'category_name' => 'required',
            'category_desc' => 'required',
            'category_status' => 'required'
        ]);
        $category = category::find($category_id);
        $category->category_name = $request->input('category_name');
        $category->category_desc = $request->input('category_desc');
        $category->category_status = $request->input('category_status');

        $category -> save();
        Session::put('message','Sửa danh mục sản phẩm thành công!');
        return Redirect::to('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        $category =category::where('category_id',$category_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công!');
        return Redirect::to('category');
    }
}

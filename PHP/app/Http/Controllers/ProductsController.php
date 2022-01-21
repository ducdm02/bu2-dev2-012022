<?php

namespace App\Http\Controllers;


use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=products::join('categories','products.category_id','=','categories.category_id')
        ->join('producer','products.producer_id','=','producer.producer_id')
        ->orderBy('products.product_id','desc')
        ->paginate(5);
        return view('admin.product',compact('products'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $product =products::where('product_id',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công!');
        return Redirect::to('products');
    }
    public function filter(){
        
        if(isset($_GET['start_price']) && isset($_GET['start_price'])){
            $min_price =$_GET['start_price'];
            $max_price =$_GET['end_price'];
            $products=products::join('categories','products.category_id','=','categories.category_id')
            ->join('producer','products.producer_id','=','producer.producer_id')
            ->orderBy('products.product_id','desc')
            ->whereBetween('product_price',[$min_price,$max_price])
            ->orderBy('product_price','desc')
            ->paginate(6);
            return view('welcome',compact('products'));
        }
    }
    public function ShowProduct(){
        $products=products::join('categories','products.category_id','=','categories.category_id')
        ->join('producer','products.producer_id','=','producer.producer_id')
        ->paginate(6);
    return view('welcome',compact('products'));
    }
}

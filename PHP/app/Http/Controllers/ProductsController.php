<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Producer;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::join('categories', 'products.category_id', '=', 'categories.category_id')
            ->join('producer', 'products.producer_id', '=', 'producer.producer_id')
            ->orderBy('products.product_id', 'desc')
            ->paginate(5);
        return view('admin.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::all();
        $producers = Producer::all();
        return view('admin.createProduct', compact('category','producers'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // exit;
        $input = $request->all();
        // dd($input['product_image']);
        // dd($request->all());
        
        if ($request->has('product_image')) {
            $file = $request->product_image;
            
            //lấy tên file
            $product_image = $file->getClientOriginalName();
            //upload
            $file->move(base_path('public/backend/img'), $product_image);
        }

        $request->validate([
            
            'product_name' => 'required',
            'product_quantity' => 'required',
            'category_id' => 'required',
            'producer_id' => 'required',
            'product_desc' => 'required',
            'product_price' => 'required',
            
            'product_status' => 'required',

        ]);        
        // dd($input);
        $product = new products();
        // $product->create($request->all());
        // $product->product_id;
        $product->product_name = $input['product_name'];
        $product->product_quantity= $input['product_quantity'];
        $product->product_status= $input['product_status'];
        $product->product_desc= $input['product_desc'];
        $product->product_price= $input['product_price'];
        $product->product_image= $input['product_image'];
        $product->producer_id= $input['producer_id'];
        $product->category_id= $input['category_id'];
        $product->save();
    //   if(  $product->save()){
    //       echo"ok";
    //   }
    //   else  echo"flase";
        // $product = new products();
        // products::create($input);
        // products::save();
        return Redirect::route('product.index')->with('flash_message', 'Producer Added!!!');
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
        $product = products::where('product_id', $product_id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công!');
        return Redirect::to('products');
    }
}

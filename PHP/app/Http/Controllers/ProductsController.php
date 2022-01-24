<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\producer;
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
        $category = category::all();
        $producers = producer::all();
        return view('admin.createProduct', compact('category', 'producers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
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
        $product->product_quantity = $input['product_quantity'];
        $product->product_status = $input['product_status'];
        $product->product_desc = $input['product_desc'];
        $product->product_price = $input['product_price'];

        if ($request->has('product_image')) {
            $file = $request->product_image;
            //đuôi file
            // $ext = $request->product_image->extension();
            // $product_image = time().'-'.'product.'.$ext;
            //lấy tên file
            $product_image = $file->getClientOriginalName();
            //upload
            // echo $product_image;
            // exit;
            $extension = $file->getClientOriginalExtension();
            $new_name = time() . '-' . $product_image;

            // kiểm tra ảnh nếu đã tồn tại thì rename nó
            while (file_exists('public/backend/img' . $file)) {
                $new_name =  $new_name = time() . '-' . $product_image;
            }
            $file->move(base_path('public/backend/img/'), $new_name);
            $product->product_image = $new_name;
        }


        $product->producer_id = $input['producer_id'];
        $product->category_id = $input['category_id'];
        $product->save();
        //   if(  $product->save()){
        //       echo"ok";
        //   }
        //   else  echo"flase";
        // $product = new products();
        // products::create($input);
        // products::save();
           return Redirect::to('products')->with('flash_message', 'Producer Added!!!');
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
    public function edit( $product_id)
    {
        $category = category::all();
        $producers = Producer::all();
        $products = products::find($product_id);
        // return view('admin.editProduct')->with('products', 'category', products::find($product_id));
        return view('admin.editProduct', compact('category', 'producers', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $product_id)
    {
        $request->validate([
            // 'title' => 'required',
            'product_name' => 'required',
            'product_quantity' => 'required',
            'category_id' => 'required',
            'producer_id' => 'required',
            'product_desc' => 'required',
            'product_price' => 'required',
            'product_status' => 'required',
        ]);


        $product = products::find($product_id);
        $input = $request->all();
        $product->product_name = $input['product_name'];
        $product->product_quantity = $input['product_quantity'];
        $product->product_status = $input['product_status'];
        $product->product_desc = $input['product_desc'];
        $product->product_price = $input['product_price'];

        if ($request->has('product_image')) {

            if($product->product_image){

                // echo "<img src='http://localhost/bu2-dev2-012022/PHP/public/backend/img/".$product->product_image."' alt='Girl in a jacke'>"  ;

                
                // exit;
                unlink('backend/img/'.$product->product_image);
            }

            $file = $request->product_image;
            //đuôi file
            // $ext = $request->product_image->extension();
            // $product_image = time().'-'.'product.'.$ext;
            //lấy tên file
            $product_image = $file->getClientOriginalName();
            //upload
            // echo $product_image;
            // exit;
            $extension = $file->getClientOriginalExtension();
            $new_name = time() . '-' . $product_image;

            // kiểm tra ảnh nếu đã tồn tại thì rename nó
            while (file_exists('public/backend/img' . $file)) {
                $new_name =  $new_name = time() . '-' . $product_image;
            }
            $file->move(base_path('public/backend/img/'), $new_name);
            $product->product_image = $new_name;
        }


        $product->producer_id = $input['producer_id'];
        $product->category_id = $input['category_id'];
        $product->save();

        return Redirect::route('product.index')->with('flash_message','Product updated successfully!!!');
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

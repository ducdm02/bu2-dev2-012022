@extends('admin_page')
@section('content')
    <?php
    $i=0;
    ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Các loại Sản phẩm</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="text-center">
       
      </div>
    <div class="p-2 flex-shrink-0 bd-highlight" style="margin-bottom: 10px;">
        <a href="" class="btn btn-info btn-rounded mb-4" data-toggle="modal" data-target="#addForm">
            <i class="fa fa-plus-circle" ></i> 
            Thêm danh mục
        </a>
    </div>
   
    <table id="datatable" class="table table-striped table-dark">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Stt</th>
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Số lượng sản phẩm</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Tên nhà sản xuất</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Giá</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Chức năng</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
        <tr>
            <th scope="row">
            <?php
            echo  ++$i; ?></th>
            <th>SP{{$product->product_id}}</th>
            <td>{{$product->product_name}}</td>
            <td>{{$product->product_quantity}}</td>
            <td>{{$product->category_name}}</td>
            <td>{{$product->producer_name}}</td>
            <td>{{$product->product_desc}}</td>
            <td>{{ number_format($product->product_price,0,',','.') }}đ</td>
            <td><img src="../public/backend/img/{{$product->product_image}}" alt=""></td>
            @if($product->product_status==1)
            <td><p class="text-success">Hiển thị</p></td>
            @else
            <td><p class="text-danger">Ẩn</p></td>
            @endif
            <td>  <a href="#" id="" class="btn btn-warning edit btn-rounded mb-4" data-toggle="modal" data-target="#editForm">
                <i class="fa fa-edit" ></i>
                Sửa
            </a>
            <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="{{URL::to('/delete-product/'.$product->product_id)}}" class="btn btn-danger">
                Xóa
            </a></td>
          </tr>
        @endforeach
        </tbody>
      </table>
   
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      {{$products->links("pagination::bootstrap-4")}}
    </ul>
  </nav>
   
    
  </div>
    <?php

use Illuminate\Support\Facades\Session;

$message = Session::get('message');
    if($message){
        echo '<div class="alert alert-success" role="alert">'.$message.'</div>';
        Session::put('message',null);
    }
    ?>
</div>
@endsection
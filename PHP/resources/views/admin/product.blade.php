@extends('admin_page')
@section('content')
    <?php
    $i=0;
    ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">製品</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="text-center">

      </div>
    <div class="p-2 flex-shrink-0 bd-highlight" style="margin-bottom: 10px;">
      <a href="{{ url('/product-create') }}" class="btn btn-success btn-sm" title="Add New Product">
        <i class="fa fa-plus" aria-hidden="true"></i> 新しく追加する
    </a>
    </div>

    <table id="datatable" class="table table-striped table-dark">
        <thead class="thead-dark">
          <tr>
            <th scope="col">番号</th>
            <th scope="col">製品コード</th>
            <th scope="col">製品名</th>
            <th scope="col">製品の数</th>
            <th scope="col">名前リスト</th>
            <th scope="col">メーカー名</th>
            <th scope="col">説明</th>
            <th scope="col">価格</th>
            <th scope="col">画像</th>
            <th scope="col">スターテス</th>
            <th scope="col">関数</th>
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
            <td>{{$product->category->category_name}}</td>
            <td>{{$product->producer->producer_name}}</td>
            <td>{{$product->product_desc}}</td>
            <td>{{ number_format($product->product_price,0,',','.') }}đ</td>
            <td><img src="backend/img/{{$product->product_image}}" alt=""></td>
            @if($product->product_status==1)
            <td><p class="text-success">画面</p></td>
            @else
            <td><p class="text-danger">隠れる</p></td>
            @endif
            <td>  <a href="{{ url('product-edit/'.$product->product_id) }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i
              class="fa fa-pencil-square-o" aria-hidden="true"></i>
              編集</button></a>&nbsp;
            <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="{{URL::to('/delete-product/'.$product->product_id)}}" class="btn btn-danger">
              消去
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

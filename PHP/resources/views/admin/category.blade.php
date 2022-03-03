@extends('admin_page')
@section('content')
<?php
$i=0;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">製品カテゴリ</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="text-center">
       
      </div>
    <div class="p-2 flex-shrink-0 bd-highlight" style="margin-bottom: 10px;">
        <a href="" class="btn btn-info btn-rounded mb-4" data-toggle="modal" data-target="#addForm">
          <i class="fa fa-plus-circle" ></i> 
          カテゴリを追加
        </a>
    </div>
   
    <table id="datatable" class="table table-striped table-dark">
        <thead class="thead-dark">
          <tr>
            <th scope="col">番号</th>
            <th scope="col">カテゴリコード</th>
            <th scope="col"> 名前リスト</th>
            <th scope="col">カテゴリの説明</th>
            <th scope="col">スターテス</th>
            <th scope="col">関数</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
        <tr>
            <th scope="row">
              <?php
              echo  ++$i; ?></th>
            </th>
            <th>BU{{$category->category_id}}</th>
            <td>{{$category->category_name}}</td>
            <td>{{$category->category_desc}}</td>
            @if($category->category_status==1)
            <td><p class="text-success">画面</p> </td>
            @else
            <td><p class="text-danger">隠れる</p></td>
            @endif
            <td>  <a href="" id="{{$category->category_id}}" class="btn btn-warning edit btn-rounded mb-4" data-toggle="modal" data-target="#editForm">
              <i class="fa fa-edit" ></i> 
              編集
            </a>
            <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-category/'.$category->category_id)}}" class="btn btn-danger">
              消去
            </a></td>
          </tr>
        @endforeach
        </tbody>
      </table>
     {{--  Form add --}}
      <div class="modal fade" id="addForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">製品カタログ情報を入力してください</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> 
          <form role="form" action="{{URL::to('/add-category')}}" method="post">
            {{ csrf_field() }}
          <div class="modal-body mx-3">
           
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="orangeForm-name">名前リスト</label>
              <input name="category_name" type="text" id="orangeForm-name" class="form-control validate">
            </div>
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="orangeForm-email">カテゴリの説明</label>
              <textarea name="category_desc"  type="text" class="form-control form-control-lg"></textarea>
            </div>
    
            <div class="md-form mb-4">
              <label data-error="wrong" data-success="right" for="orangeForm-pass">スターテス</label>
              <select name="category_status" class="form-control form-control-lg">
                <option value="1">画面</option>
                <option value="0">隠れる</option>
              </select>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-deep-orange">もっと</button>
          </div>
          </form>

        </div>
      </div>
    </div>
   
    {{--  Form edit --}}
    <div class="modal fade" id="editForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">Sửa thông tin danh mục sản phẩm</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> 
        <form id="editForm" class="editForm" role="form" class="" method="post" >
          {{ csrf_field() }}
        <div class="modal-body mx-3">
         
          <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="orangeForm-name">Tên danh mục</label>
            <input name="category_name" type="text" id="category_name" class="form-control validate">
          </div>
          <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="orangeForm-email">Mô tả danh mục</label>
            <textarea name="category_desc" id="category_desc"  type="text" class="form-control form-control-lg"></textarea>
          </div>
  
          <div class="md-form mb-4">
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Trạng thái</label>
            <select name="category_status" class="form-control form-control-lg">
              <option value="1">Hiển thị</option>
              <option value="0">Ẩn</option>
            </select>
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="submit" class="btn btn-deep-orange" id="edit">Sửa</button>
        </div>
        </form>

      </div>
    </div>
    
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      
  
     
      {{$categories->links("pagination::bootstrap-4")}}
    </ul>
  </nav>
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
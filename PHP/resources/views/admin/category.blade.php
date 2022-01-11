@extends('admin_page')
@section('content')
    
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
    <div class="p-2 flex-shrink-0 bd-highlight">
        <a href="" class="btn btn-info btn-rounded mb-4" data-toggle="modal" data-target="#addForm">
            Thêm danh mục
        </a>
    </div>
   
    <table class="table table-striped table-dark">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Mô tả danh mục</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Chức năng</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
        <tr>
            <th scope="row">{{$category->category_id}}</th>
            <td>{{$category->category_name}}</td>
            <td>{{$category->category_desc}}</td>
            @if($category->category_status==1)
            <td>Hiển thị</td>
            @else
            <td>Ẩn</td>
            @endif
            <td>  <a href="" class="btn btn-warning btn-rounded mb-4" data-toggle="modal" data-target="#addForm">
                Sửa
            </a>
              <a href="" class="btn btn-danger" data-toggle="modal" data-target="#DeleteForm">
                Xóa
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
            <h4 class="modal-title w-100 font-weight-bold">Nhập thông tin danh mục sản phẩm</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> 
          <form role="form" action="{{URL::to('/add-category')}}" method="post">
            {{ csrf_field() }}
          <div class="modal-body mx-3">
           
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="orangeForm-name">Tên danh mục</label>
              <input name="category_name" type="text" id="orangeForm-name" class="form-control validate">
            </div>
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="orangeForm-email">Mô tả danh mục</label>
              <textarea name="category_desc"  type="text" class="form-control form-control-lg"></textarea>
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
            <button type="submit" class="btn btn-deep-orange">Thêm</button>
          </div>
          </form>

        </div>
      </div>
    </div>
   {{--  form delete --}}
   <div class="modal fade" id="DeleteForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLongTitle">Bạn có chắc chắn xóa?</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger">Delete</button>
          </div>
        </div>
      </div>
    </div>
    <?php
    $message = Session::get('message');
    if($message){
        echo '<div class="alert alert-success" role="alert">'.$message.'</div>';
        Session::put('message',null);
    }
    ?>
</div>
@endsection
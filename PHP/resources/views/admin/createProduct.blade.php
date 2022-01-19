@extends('admin_page')
@section('content')

<div class="card">
    <div class="card-header">Create Producer</div>
    <h1>Create Producer</h1>
    <div class="card-body">
        
        <form action="{{ URL::to('product-create') }}" method="post">
         @csrf
          <label>Tên sản phẩm</label></br>
          <input type="text" name="product_name" id="name" class="form-control"></br>
          <label>Số lượng</label></br>
          <input type="text" name="product_quantity" id="quantity" class="form-control"></br>
          <label>Tên danh mục</label></br>
          <input type="text" name="category_name" id="category_name" class="form-control"></br>
          <label>Tên nhà sản xuất</label></br>
          <input type="text" name="producer_name" id="producer_name" class="form-control"></br>
          <label>Giá</label></br>
          <input type="text" name="product_price" id="price" class="form-control"></br>
          <label>Trạng thái </label></br>
          <input type="text" name="product_status" id="status" class="form-control"></br>
          <label>Mô tả</label></br>
          <textarea name="product_desc" id="" cols="30" rows="10"></textarea> <br>
          <label>Hình ảnh</label></br>
            <input type="text" name="product_image" id="status" class="form-control"></br>
          <input type="submit" value="Save" class="btn btn-success"></br>
      </form>
    
    </div>
  </div>

@endsection
@extends('admin_page')
@section('content')

    <div class="container">
        <div class="card-header">Create Producer</div>
        <h1>Create Producer</h1>
        {{-- <div class="card-body"> --}}
        <div class="col-md-8">
            <form action="{{ URL::to('product-create') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-8">
                        <label>Tên sản phẩm</label><br>
                        <input type="text" name="product_name" id="name" class="form-control"
                            placeholder="Nhập tên sản phẩm"><br>
                        <label>Mô tả</label><br>
                        <textarea name="product_desc" id="" cols="30" rows="5" class="form-control"
                            placeholder="Mô tả sản phẩm"></textarea> <br>
                        <script>
                            CKEDITOR.replace('product_desc');
                        </script>

                        <label>Hình ảnh</label><br>
                        <input type="file" name="product_image" id="" class="form-control"><br>
                    </div>
                    <div class="col-md-4">
                        <label>Danh mục sản phẩm</label><br>
                        <select name="category_id" id="input" class="form-control">
                            <option value="">----- Chọn danh mục -----</option>
                            @foreach ($category as $cate)
                                <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>

                            @endforeach
                        </select><br>
                        <label>Số lượng</label><br>
                        <input type="text" name="product_quantity" id="quantity" class="form-control"
                            placeholder="Nhập số lượng"><br>
                        <label>Giá</label><br>
                        <input type="text" name="product_price" id="price" class="form-control"
                            placeholder="Nhập giá sản phẩm"><br>
                        <label>Trạng thái </label>
                        <div class="radio">
                            <label><input type="radio" name="product_status" id="status" checked="checked" value="1">
                                Hiện</label>
                            <label><input type="radio" name="product_status" id="status" value="0">Ẩn</label>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>
        </div>
    </div>
    <script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
@endsection

@extends('admin_page')
@section('content')

    <div class="container">
        <div class="card-header">新製品を作成する</div>
        <h1>製品</h1>
        {{-- <div class="card-body"> --}}
        <div class="col-md-8">
            <form action="{{ URL::to('create') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-8">
                        <label>製品名</label><br>
                        <input type="text" name="product_name" id="name" class="form-control"
                            placeholder="製品名を入力してください"><br>
                            <label>説明</label><br>
                        <textarea name="product_desc" id="" cols="30" rows="5" class="form-control"
                            placeholder="製品説明"></textarea> <br>
                        <script>
                            CKEDITOR.replace('product_desc');
                        </script>

                        <label>画像</label><br>
                        <input type="file" name="product_image" id="" class="form-control" placeholder="ac"><br>
                    </div>
                    <div class="col-md-4">
                        <label>製品ポートフォリオ</label><br>
                        <select name="category_id" id="input" class="form-control">
                            <option value="">----- カテゴリーを選ぶ -----</option>
                            @foreach ($category as $cate)
                                <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                            @endforeach
                        </select><br>
                        <label>Nhà sản xuất</label><br>
                        <select name="producer_id" id="input" class="form-control">
                            <option value="">----- メーカーを選択してください -----</option>
                            @foreach ($producers as $produ)
                                <option value="{{ $produ->producer_id }}">{{ $produ->producer_name }}</option>
                            @endforeach
                        </select><br>
                        <label>額</label><br>
                        <input type="text" name="product_quantity" id="quantity" class="form-control"
                            placeholder=""><br>
                        <label>価格</label><br>
                        <input type="text" name="product_price" id="price" class="form-control"
                            placeholder=""><br>
                        <label>スターテス </label>
                        <div class="radio">
                            <label><input type="radio" name="product_status" id="status" checked="checked" value="1">
                                現在</label>
                            <label><input type="radio" name="product_status" id="status" value="0">隠れる</label>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Save" class="btn btn-success"><br>
            </form>
        </div>
    </div>
    <script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
@endsection

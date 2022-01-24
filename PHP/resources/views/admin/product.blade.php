@extends('admin_page')
@section('content')
    <?php
    $i = 0;
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Sản phẩm</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="text-center">

        </div>
        @if (session('flash_message'))
            <div class="alert alert-success">{{ session('flash_message') }}</div>
        @endif
        <a href="{{ url('/product-create') }}" class="btn btn-success btn-sm" title="Add New Product    ">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>

        <table id="datatable" class="table table-striped table-dark">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Tên nhà sản xuất</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Action</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">
                            <?php
                            echo ++$i; ?></th>
                        <th>SP{{ $product->product_id }}</th>
                        <td>{{ $product->product_name }}</td>
                        <td><img src="./backend/img/{{$product->product_image}}" width="60" height="40" alt=""></td>
                        <td>{{ $product->product_quantity }}</td>
                        <td>{{ $product->category_name }}</td>
                        <td>{{ $product->producer_name }}</td>
                        <td>{{ $product->product_desc }}</td>
                        <td>{{ number_format($product->product_price, 0, ',', '.') }}đ</td>
                        @if ($product->product_status == 1)
                            <td>
                                <p class="text-success">Hiển thị</p>
                            </td>
                        @else
                            <td>
                                <p class="text-danger">Ẩn</p>
                            </td>
                        @endif
                        <td>
                            <a href="{{ url('product-edit/'.$product->product_id) }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    Edit</button></a>&nbsp;
                            <form method="POST" action="}}" accept-charset="UTF-8" style="display:inline">

                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact"
                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                        aria-hidden="true"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                {{ $products->links('pagination::bootstrap-4') }}
            </ul>
        </nav>


    </div>
    <?php
    
    use Illuminate\Support\Facades\Session;
    
    $message = Session::get('message');
    if ($message) {
        echo '<div class="alert alert-success" role="alert">' . $message . '</div>';
        Session::put('message', null);
    }
    ?>
    </div>
@endsection
    
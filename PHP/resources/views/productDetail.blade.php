<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    {{-- <link rel="stylesheet" href="chiTietSP.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

</head>

<body>
    
    <div class="container">
        <h1>CHI TIẾT SẢN PHẨM</h1>
        <div class="pic-price">
            <div class="pic">
                <img src="../backend/img/{{$products->product_image}}" alt="" srcset="">
            </div>
            <div class="price">
                <div class="title">{{ $products->product_name }}</div>
                <div class="quanlity">Số lượng: {{ $products->product_quantity }}</div>
                <div class="pri">Giá: {{ $products->product_price }}</div>
                <div class="nsx">NSX: {{ $products->producer->producer_name }}</div>
                <div class="cate">Danh mục: {{ $products->category->category_name }}</div>
            </div>

        </div>
        <div class="des">
            <h3>Mô tả</h2>
            {{ $products->product_desc }}
        </div>
    </div>
    
</body>

</html>


<style>
    .container {
        /* height: 800px; */
        /* background-color: burlywood; */
        width: 80%;
        display: flex;
        flex-direction: column !important;
        margin-top: 50px;
    }

    .pic-price {
        display: flex;
        width: 100%;
    }

    .pic {
        width: 50%;
    }

    .pic img {
        width: 600px;
        height: 400px;
    }

    .title {
        text-transform: uppercase;
        font-weight: bold;
        /* text-align: center; */
        /* width: 400px; */
        font-size: 25px;
    }

    .price {
        display: flex;
        flex-direction: column;
        text-align: center;
        width: 50%;
        margin-top: 50px;
    }

    .des {
        margin: 20px 0px;
    }

    h1 {
        text-align: center;
        padding-bottom: 20px;
    }

</style>

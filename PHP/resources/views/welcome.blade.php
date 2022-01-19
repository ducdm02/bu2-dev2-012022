<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('frontend/layout.css')}}">
{{-- Style combobox --}}

</head>
<body>

<!-- MAIN (Center website) -->
<div class="main">

<h1>BU-Development.COM</h1>
<hr>

<h2 class="text-primary">Danh mục sản phẩm</h2>

<div id="myBtnContainer">
  <button  type="button" class="btn btn-outline-primary" onclick="filterSelection('all')"> Show all</button>
  @foreach ($products as $product)
  <button  type="button" class="btn btn-outline-secondary" onclick="filterSelection('{{$product->category_name}}')"> {{$product->category_name}}</button>
  @endforeach
  
</div>
<h2  class="text-success">Nhà sản xuất</h2>

<div id="myBtnContainer" style="display: flex; justify-content: space-between;">
  <div class="button">
    <button  type="button" class="btn btn-outline-secondary" onclick="filterSelection('Công ty dược phẩm Nam Hà')"> Công ty dược phẩm Nam Hà</button>
    <button  type="button" class="btn btn-outline-secondary" onclick="filterSelection('Công ty dược phẩm Genphar')"> Công ty dược phẩm Genphar</button>
  </div>
  <div class="filter" style="margin-top:-50px ">
      <label for="amount">Lọc giá theo</label>
        <form action="{{URL::to('/filter')}}" >
          <div id="slider-range" style="margin-bottom: 10px"></div>
          <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
          <input type="hidden" name="start_price" id="start_price">
          <input type="hidden" name="end_price" id="end_price">
          <input type="submit" name="filter-price" class="btn btn-outline-secondary" value="Lọc giá">
        </form>
  </div>
</div>

<!-- Portfolio Gallery Grid -->
<div class="row">
    @foreach ($products as $product)
    @if($product->product_status==1)
  <div class="column {{$product->category_name}} {{$product->producer_name}}">
    <div class="content">
        <img src="../public/backend/img/{{$product->product_image}}" style="width: 100%" alt="">
      <h4>{{$product->product_name}}</h4>
      <p>{{$product->product_desc}}</p>
      <td ><div class="text-primary">{{ number_format($product->product_price,0,',','.') }}đ</div></td>
    </div>
  </div>
  @endif
  @endforeach
  
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      {{$products->links("pagination::bootstrap-4")}}
    </ul>
  </nav>
  
</div>
<!-- END GRID -->
</div>

</div>
<!-- END MAIN -->
</div>
<script src="{{asset('backend/js/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('frontend/layout.js')}}"></script>
</body>
</html>

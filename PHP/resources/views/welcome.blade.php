<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
            padding: 20px;
            font-family: Arial;
        }

        h2 {
            margin: 20px 0;
        }

        /* Center website */
        .main {
            max-width: 1000px;
            margin: auto;
        }

        h1 {
            font-size: 50px;
            word-break: break-all;
        }

        .row {
            margin: 10px -16px;
        }

        /* Add padding BETWEEN each column */
        .row,
        .row>.column {
            padding: 8px;
        }

        /* Create three equal columns that floats next to each other */
        .column {
            float: left;
            width: 33.33%;
            display: none;
            /* Hide all elements by default */
        }

        /* Clear floats after rows */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Content */
        .content {
            background-color: white;
            padding: 10px;
        }

        /* The "show" class is added to the filtered elements */
        .show {
            display: block;
        }

        /* Style the buttons */

    </style>
    {{-- Style combobox --}}

</head>

<body>

    <!-- MAIN (Center website) -->
    <div class="main">

        <h1>BU-Developement.COM</h1>
        <hr>

        <h2 class="text-primary">Danh mục sản phẩm</h2>

        <div id="myBtnContainer">
            <button type="button" class="btn btn-outline-primary" onclick="filterSelection('all')"> Show all</button>
            <button type="button" class="btn btn-outline-secondary" onclick="filterSelection('Thuốc dạ dày')"> Thuốc dạ
                dày</button>
            <button type="button" class="btn btn-outline-secondary" onclick="filterSelection('Thuốc cảm')"> Thuốc
                cảm</button>
            <button type="button" class="btn btn-outline-secondary" onclick="filterSelection('people')"> People</button>
        </div>
        <h2 class="text-success">Nhà sản xuất</h2>

        <div id="myBtnContainer">
            <button type="button" class="btn btn-outline-secondary"
                onclick="filterSelection('Công ty dược phẩm Nam Hà')"> Công ty dược phẩm Nam Hà</button>
            <button type="button" class="btn btn-outline-secondary"
                onclick="filterSelection('Công ty dược phẩm Genphar')"> Công ty dược phẩm Genphar</button>
        </div>

        <!-- Portfolio Gallery Grid -->
        <div class="row">
            @foreach ($products as $product)
                @if ($product->product_status == 1)
                    <div class="column {{ $product->category_name }} {{ $product->producer_name }}">
                        <div class="content">
                            <a href="{{ URL::to('chi-tiet-san-pham/'. $product->product_id) }}" target="_blank"
                                rel="noopener noreferrer"><img src="../public/backend/img/{{ $product->product_image }}"
                                    style="width: 100%" alt=""></a>
                            <h4>{{ $product->product_name }}</h4>
                            <p>{{ $product->product_desc }}</p>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                {{ $products->links('pagination::bootstrap-4') }}
            </ul>
        </nav>

    </div>
    <!-- END GRID -->
    </div>

    </div>
    <!-- END MAIN -->
    </div>
    <script src="{{ asset('../public/backend/js/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        filterSelection("all")

        function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("column");
            if (c == "all") c = "";
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
        }

        function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                    element.className += " " + arr2[i];
                }
            }
        }

        function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }


        // Add active class to the current button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>

</body>

</html>

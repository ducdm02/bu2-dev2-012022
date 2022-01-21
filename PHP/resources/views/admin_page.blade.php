<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>BU2</title>
       <base href="{{asset('')}}">
        <!-- Bootstrap Core CSS -->
        <link href="backend/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="backend/css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="backend/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="backend/css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="backend/css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
    </head>
    <body style="background-image: url('')">

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">Bu2</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown navbar-inverse">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </a>
                       
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> xuannt <b class="caret"></b>
                        </a>
                        
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search" style="padding: 3px;"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="index.html" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Danh mục sản phẩm</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="flot.html">Danh sách loại sản phẩm</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="{{URL::to('/products')}}"><i class="fa fa-table fa-fw"></i> Sản phẩm</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{URL::to('/products')}}">Danh sách sản phẩm</a>
                                    </li>
                                   
                                </ul>
                            </li>
                            <li>
                                <a href="{{URL::to('/producer')}}"><i class="fa fa-edit fa-fw"></i> Nhà sản xuất</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{URL::to('/producer')}}">Danh sách Nhà sản xuất</a>
                                    </li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="page-wrapper" style="background-image: url('https://www.fda.gov/files/ConsumerSubtopic_1600x900_201207_1515-pills.png'); height: 900px;">
                @yield('content')
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="{{asset('../public/backend/backend/js/jquery.min.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('../public/backend/backend/js/bootstrap.min.js')}}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{asset('../public/backend/backend/js/metisMenu.min.js')}}"></script>

        <!-- Morris Charts JavaScript -->
        <script src="{{asset('../public/backend/backend/js/raphael.min.js')}}"></script>
        <script src="{{asset('../public/backend/backend/js/morris.min.js')}}"></script>
        <script src="{{asset('../public/backend/backend/js/morris-data.js')}}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{asset('../public/backend/backend/js/startmin.js')}}"></script>
        
        
    </body>
</html>
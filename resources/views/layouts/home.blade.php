<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>緯昶管理後台 </title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{url('admin/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('admin/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url('admin/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- swalert -->
    <script src="{{url('sweetalert-master/dist/sweetalert.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{url('sweetalert-master/dist/sweetalert.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('selfcss')
</head>
<style type="text/css">
    .slf_topac{
        height: auto;;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    a:hover{
        text-decoration: none;
    }
    .error{
        color:#ff4f4f;
    }
</style>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">緯昶管理後台</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                        <!--<a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>-->
                            <a href="{{ url('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                               {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!--搜尋框
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </li>-->
                        <li>
                            <a href="#"><i class="fa fa-gear"></i>權限模組<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @if( explode(",",$can[0]->power)[3] == 1 )
                                <li>
                                <a href="{{url('/account')}}"><i class="glyphicon glyphicon-triangle-right"></i> 帳號管理 </a>
                                </li>
                                @endif()
                                
                                @if( explode(",",$can[1]->power)[3] == 1 )
                                <li>
                                <a href="{{url('/features')}}"><i class="glyphicon glyphicon-triangle-right"></i> 功能管理 </a>
                                </li>
                                @endif()
                                
                                @if( explode(",",$can[2]->power)[3] == 1 )
                                <li>
                                <a href="{{url('/grppower')}}"><i class="glyphicon glyphicon-triangle-right"></i> 群組管理 </a>
                                </li>
                                @endif()

                                @if( explode(",",$can[3]->power)[3] == 1 )
                                <li>
                                <a href="{{url('/mod')}}"><i class="glyphicon glyphicon-triangle-right"></i> 模組管理 </a>
                                </li>
                                @endif()
                            </ul>     
                        </li>
                        
                        <li>
                            <a href="{{url('/act_log')}}"><i class="fa fa-edit"></i>紀錄模組</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-gear"></i>商品管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @if( explode(",",$can[5]->power)[3] == 1 )
                                <li>
                                <a href="{{url('/edit/type_manager')}}"><i class="glyphicon glyphicon-triangle-right"></i>葡萄酒類別管理</a>
                                </li>
                                @endif()

                                @if( explode(",",$can[5]->power)[3] == 1 )
                                <li>
                                <a href="{{url('/edit/variety_manager')}}"><i class="glyphicon glyphicon-triangle-right"></i>葡萄品種管理</a>
                                </li>
                                @endif()

                                @if( explode(",",$can[5]->power)[3] == 1 )
                                <li>
                                <a href="{{url('/edit/origin_manager')}}"><i class="glyphicon glyphicon-triangle-right"></i>產地管理</a>
                                </li>
                                @endif()

                                @if( explode(",",$can[5]->power)[3] == 1 )
                                <li>
                                <a href="{{url('/edit/taste_manager')}}"><i class="glyphicon glyphicon-triangle-right"></i>口感管理</a>
                                </li>
                                @endif()

                                @if( explode(",",$can[5]->power)[3] == 1 )
                                <li>
                                <a href="{{url('/edit/winery_manager')}}"><i class="glyphicon glyphicon-triangle-right"></i>酒廠管理</a>
                                </li>
                                @endif()                                                                  
                                
                                
                                @if( explode(",",$can[5]->power)[3] == 1 )
                                <li>
                                <a href="{{url('/edit/wine_manager')}}"><i class="glyphicon glyphicon-triangle-right"></i>酒品管理</a>
                                </li>                                
                                @endif()
                            </ul>     
                        </li>
                        @if( explode(",",$can[5]->power)[3] == 1 )
                        <li>
                            <a href="{{url('/edit/news_manager')}}"><i class="glyphicon glyphicon-info-sign"></i>最新消息</a>
                        </li>
                        @endif()
                        @if( explode(",",$can[6]->power)[3] == 1 )
                        <li>
                            <a href="#"><i class="fa fa-gear"></i>客戶管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
                                <li>
                                <a href="{{url('/infom/msg')}}"><i class="glyphicon glyphicon-triangle-right"></i>留言查看</a>
                                </li>
                                

                              
                                <li>
                                <a href="{{url('/infom/jmbr')}}"><i class="glyphicon glyphicon-triangle-right"></i>會員資料查看</a>
                                </li>
                                                              
                            </ul>     
                        </li>
                        @endif()                        
                        <!--
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>

                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="active">
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="active" href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                        </li>
                        -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{url('admin/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{url('admin/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{url('admin/dist/js/sb-admin-2.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    

    @yield('selfjs')

</body>

</html>

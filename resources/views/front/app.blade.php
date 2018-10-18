<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<!-- jQuery -->
    <script src="{{url('/admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('/admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <link href="//fonts.googleapis.com/earlyaccess/notosanstc.css" rel="stylesheet"> 
    <!-- CSS    -->
    <link href="{{url('/admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/css/frontapp.css')}}" rel="stylesheet">

    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-98801211-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments)};
        gtag('js', new Date());

        gtag('config', 'UA-98801211-2');
    </script>    
    
    @yield('selfjs')
    @yield('selfcss')

</head>
<body>
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-12 col-sm-12 col-xs-12' id='headbar'>       
                <div class="col-md-2 col-md-offset-10 col-sm-2 col-sm-offset-2 col-xs-2 col-sm-offset-10 text-center" id='join_account'>
                
                
                <a href="{{ url('/join_account') }}">
                加入會員
                </a>

                </div>
         	</div> 

        </div>
    @yield('content')	
    </div>
</body>
</html>
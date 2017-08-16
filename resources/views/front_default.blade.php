<!DOCTYPE html>
<html>
<head>
	<title>WE - @yield('title')</title>
	<!-- 全體meta -->
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<!-- 個體meta -->

    <!-- 全體js   -->
	<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ url('slick/slick.min.js')}}"></script>
    <script src="{{ url('bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ url('lightbox2-master/dist/js/lightbox.js')}}"></script>
	<!-- 個體js   -->
    @yield('selfjs')
	
    <!-- 全體css  -->
    <link href="{{ url('lightbox2-master/dist/css/lightbox.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{ url('bootstrap/dist/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{ url('css/front_default.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('slick/slick-theme.css')}}"/>
	<!-- 個體css  -->
    @yield('selfcss')    

    <script type="text/javascript">
    // 首頁輪播
    $(document).ready(function(){
        $('.slider_class').slick({
            dots: true,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            arrows:true,
            dots: false,
            autoplay: true,
            autoplaySpeed: 3000,
        });

        $('.partner_slide').
        slick({
           slidesToShow: 5,
           slidesToScroll: 2,
           autoplay: true,
           autoplaySpeed: 15000,
           dots:true,
           arrows:false,
        });

          $('.hbslider').slick({
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            arrows:false,
            dots: false,
            autoplay: true,
            autoplaySpeed: 1500,
        });
        //手機板menu開合
        $("#m_list").click(function(){
            
            if($("#m_menu_body").css('display')=='block'){
                $("#m_menu_body").slideUp('milliseconds');
            }else{
                $("#m_menu_body").slideDown('milliseconds');
            }
        });
        //商品開合
        $(".mgood").click(function(){
            
            if($("#gooditm").css('display')=='block'){
                $("#gooditm").slideUp('milliseconds');
            }else{
                $("#gooditm").slideDown('milliseconds');
            }
        });
        //知識專區開合
        $(".mknowledge").click(function(){
            
            if($("#knowledgeitm").css('display')=='block'){
                $("#knowledgeitm").slideUp('milliseconds');
            }else{
                $("#knowledgeitm").slideDown('milliseconds');
            }
        });
        //會員專區
        $(".mmbr").click(function(){
            
            if($("#mmbritm").css('display')=='block'){
                $("#mmbritm").slideUp('milliseconds');
            }else{
                $("#mmbritm").slideDown('milliseconds');
            }
        });        
        $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function(){
            $(this).toggleClass('open');
        });

    });
</script>
</head>
<body>

<div class='container-fluid'>
<!-- 共用header區塊 --> 
<div id='header' class='row'>
    <div id='m_menu' class='col-md-12 col-sm-12 col-xs-12'>
        <!-- 會員專區
        <div id='m_member' class='col-md-1 col-sm-1 col-sm-offset-1 col-xs-1 col-xs-offset-1'>
        </div>
        -->
        <!-- logo -->
        <div id='m_logo' class='col-md-1 col-sm-7 col-sm-offset-1 col-xs-7 col-xs-offset-1'>
        </div>

        <!-- menu -->
        <div id='m_list' class='col-md-1 col-sm-1 col-sm-offset-2 col-xs-1 col-xs-offset-2 text-right'>
            <div id="nav-icon3">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <div id='m_menu_body' class='col-md-12 col-sm-12 col-xs-12'>
    <ul>
        <li>
            <a href="{{url('/hindex')}}">首頁</a>
        </li>
        <li>
            <a href="{{url('/about')}}">關於緯昶</a>
        </li>
        <li>
             <a href="{{url('/news')}}"><!--
             <a href="{{ url('image/home/comingsoon-01.png') }}" data-lightbox="image-1" data-title="hau_jiou_chen_wong_di">-->最新消息</a>
        </li>
        <li>
            <span class='mgood'>商品</span><span class='mgood glyphicon glyphicon-chevron-down'></span>
            <ul id='gooditm'>
                <li>紅酒</li>
                <li>白酒</li>
                <li>氣泡酒</li>
            </ul>
        </li>
        <li>
         <a href="{{ url('image/home/comingsoon-01.png') }}" data-lightbox="image-1" data-title="hau_jiou_chen_wong_di">
            <span class='mknowledge'>知識專區</span><span class='mknowledge glyphicon glyphicon-chevron-down'></span>
            <ul id='knowledgeitm'>
                <li>葡萄品種</li>
                <li>產地</li>
                <li>口感</li>
                <li>義大利酒窖</li>
                <li>義大利葡萄酒產業簡介</li>
                <li>義大利葡萄酒分級制</li>
            </ul>
            </a>
        </li>
        <li>
             <a href="{{url('/contacts')}}">聯絡我們</a>
        </li>
        <li> <a href="{{ url('image/home/comingsoon-01.png') }}" data-lightbox="image-1" data-title="hau_jiou_chen_wong_di">
            <span class='mmbr'>會員專區</span><span class='mmbr glyphicon glyphicon-chevron-down'></span>
            <ul id='mmbritm'>
                <li>登入會員</li>
                <li> 加入會員</li>
            </ul>
            </a>
        </li>        
    </ul>
    </div>

    <div id='row_content' class='col-md-12 col-sm-12 col-xs-12'>
        <div id='logo_area'  class='col-md-3 col-sm-3 col-xs-3'>
        	<div id='logo'>
        		
        	</div>
     	        	        	        	
        </div>
            <div class='col-md-1 col-md-offset-1 col-sm-1 col-xs-1 topmenu '>
                <a href="{{url('/hindex')}}" rel="external">
                    首頁
                    <br/>
                    Home
                </a>
            </div>
            <div class='col-md-1  col-sm-1 col-xs-1 topmenu'>
                <a href="{{url('/about')}}" rel="external">
                    關於緯昶
                    <br/>
                    About us
                </a>                
            </div>
            <div class='col-md-1 col-sm-1 col-xs-1 topmenu'>
                <!--<a href="{{url('/news')}}">-->
                <a href="{{url('/news')}}" rel="external">
                    最新消息
                    <br/>
                    News
                </a>                
            </div>
            <div class='col-md-1 col-sm-1 col-xs-1 topmenu'>
                <a href="{{url('/goods')}}" rel="external">
                    商品
                    <br/>
                    Products
                </a>
            </div>
            <div class='col-md-1 col-sm-1 col-xs-1 topmenu'>
                <a href="" rel="external">
                    知識專區
                    <br/>
                    Knowledge
                </a>                
            </div>
            <div class='col-md-1 col-sm-1 col-xs-1 topmenu'>
                <a href="{{url('/contacts')}}" rel="external">
                    聯絡我們
                    <br/>
                    Contacts
                </a>
            </div>
            <div class='col-md-1 col-sm-1 col-xs-1 topmenu2'>
                <!--<a href="{{url('/signup')}}">-->
                <a href="{{ url('image/home/comingsoon-01.png') }}" data-lightbox="image-1" data-title="hau_jiou_chen_wong_di" rel="external">
                <div id='login'>
                    
                </div>
                </a>
            </div>
            <div class='col-md-1 col-sm-1 col-xs-1 topmenu2'>
                <a href="{{url('/join')}}" rel="external">
                <div id='join'>
                    
                </div>
                </a>
            </div>         
    </div>
    @yield('home_banner')
    @yield('home_ifo')
</div>
<div id='main' class='row'>
@yield('main')
</div>
<div id='footer' class='row'>
    <div id='footer_area' class='col-md-12 col-sm-12 col-xs-12'>
        <div id='footer_logo_area' class='col-md-3 col-md-offset-1 col-sm-0 col-xs-0'>
            <div id='footer_pic'>
                
            </div>
        </div>

        <div id='footer_icon_area' class='col-md-2 col-md-offset-1 col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4'>
            <div id='ig' class='icon col-sm-4 col-xs-4'>
                
            </div>
            <div id='fb' class='icon col-sm-4 col-xs-4'>
                
            </div>
            <div id='yt' class='icon col-sm-4 col-xs-4'>
                
            </div>
        </div>

        <div id='footer_right_area' class='col-md-3 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0'>
            <p>
            © 2017 Wealeternity Corporation. All Rights Reserved
            </p>
        </div>
    </div>
</div>
</div>

</body>
</html>
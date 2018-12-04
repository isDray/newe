@extends('front_default')

@section('title', '知識專區')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_detail.css')}}"/>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.js"></script>

<script type="text/javascript">
$(function(){

    $('.ptile').click(function(){
        console.log($(this).attr('class'));
        if( $(this).attr('class') == 'ptile glyphicon glyphicon-chevron-down'){
            $(this).attr('class','ptile glyphicon glyphicon-chevron-up');
        }else{
            $(this).attr('class','ptile glyphicon glyphicon-chevron-down');
        }
    });

    $("#pm_main").on('swiperight',function(){
        var nowpoint = $("#pm_main").offset(); 
        $("#pm_main").animate({left:"0px"});
        $("#pm_label").attr('class','pm_in');
    });

    $("#pm_main").on('swipeleft',function(){
        var nowpoint = $("#pm_main").offset();
        $("#pm_main").animate({left:"-250px"});
        $("#pm_label").attr('class','pm_out');
    });
    
});
</script>
@endsection

@section('main')
<div id='detail_area' class='col-md-12 col-sm-12 col-xs-12'>
    <div id='detail_top' class='col-md-12 col-sm-12 col-xs-12'>
        
    <div id='pm_main'>
        <div id='pm_label' class='pm_out'></div>
        
        <ul class="nav nav-stacked " id="accordion1">
            <!--
            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#pfirstLink">葡萄種類(由北至南)</a></span>

                <ul id="pfirstLink" class="collapse">
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                    <li>SubTest2</li>                                                         
                </ul>
            </li>

            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#psecondLink">產地(由北至南)</a></span>

                <ul id="psecondLink" class="collapse">
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                </ul>
            </li>

            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#pthirdLink">口感</a>
                </span>
                <ul id="pthirdLink" class="collapse">
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                </ul>
            </li>

            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#pfourLink">義大利酒業</a>
                </span>
                <ul id="pfourLink" class="collapse">
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                </ul>
            </li> -->
            @foreach ($types as $key=>$type)
            <li class="ppanel ">
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#p{{$type->id}}">{{$type->name}}</a>
                </span>
                <ul id="p{{$type->id}}" class="collapse">
                @foreach ($ald[$type->id] as $key2=>$val2)
                    <li>
                        <a href="{{url('detail/')}}/{{$val2->id}}"  rel="external">
                        {!! $val2->name !!}
                        </a>
                    </li>
             
                @endforeach
                </ul>
            </li>
            @endforeach
            <!--
            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#t{{$type->id}}">義大利葡萄酒產業簡介</a>
                </span>
                <ul id="p{{$type->id}}" class="collapse">
                    <li><a href="{{url('knowledge/4/1')}}"  rel="external">產業簡介</a></li>
                </ul>
            </li>

            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#psixLink">義大利葡萄酒分級制</a>
                </span>
                <ul id="psixLink" class="collapse">
                    <li><a href="{{url('knowledge/5/1')}}"  rel="external">DOC(Denominazione di OrigineControllata)法定產區</a></li>
                     <li><a href="{{url('knowledge/5/2')}}"  rel="external">DOCG (Denominazione di Origine Controllata e Garantita)保證法定產區</a></li>
                     <li><a href="{{url('knowledge/5/3')}}"  rel="external">IGT(Indicazione geografica tipica)地區標誌酒</a></li>
                     <li><a href="{{url('knowledge/5/4')}}"  rel="external">VDT(Vino da Tavola)日常餐酒</a></li>
                </ul>
            </li> -->

        </ul>        
         
    </div>

    <div id='detail_menu' class='col-md-3 col-md-offset-1 col-sm-0 col-xs-0'>
        
    
    <div id='detail_body' class="col-md-12 col-sm-12 col-xs-12" style='padding-right: 0px;padding-left: 0px;'>

        <ul class="nav nav-stacked wnav" id="accordion1">
            <!--
            <li class="panel" data-toggle="collapse" data-parent="#accordion1" href="#firstLink">
            <span class='ptile glyphicon glyphicon-chevron-down'><a>葡萄產地(由北到南)</a>
            </span>
                <ul id="firstLink" class="collapse">
                <li style='color:#752761;'>
                SALICARIA TOSCANA IGT<br/>
                千禧花超級托斯卡尼紅酒
                </li>
                <li>                
FIORE DI VIGNA PRIMITIVO SALENTO IGT<br/>
「葡萄花精靈」普里米蒂沃紅酒
                </li>
                <li>
ORFEO NEGROAMARO PUGLIA IGT<br/>
「詩人奧菲歐」尼古阿馬羅紅酒
                </li>
                <li>
NEGROAMARO PUGLIA IGT<br/>
魅紫尼古阿馬羅紅酒
                </li>
                <li>
BRICCO MAIOLICA LANGHE NEBBIOLO DOC<br/>
「瑪若利卡山莊(藍)」朗格內比奧羅紅酒
                </li>
                <li>
BRICCO MAIOLICA BARBERA D'ALBA DOC<br/>
「瑪若利卡山莊(紅)」巴貝拉紅酒
                </li>
                <li>
CASCINA GALLETTO LANGHE NEBBIOLO DOC<br/>
「小公雞(藍)」朗格內比奧羅紅酒
                </li>
                <li>
CASCINA GALLETTO BARBERA D'ASTI DOCG<br/>
「小公雞(紅)」巴貝拉紅酒
                </li>
                <li>
GRIGNANO CHIANTI RUFINA DOCG<br/>
格里納羅奇安提露菲娜紅酒
                </li>
                <li>
POGGIO GUALTIERI CHIANTI RUFINA RISERVA DOCG<br/>
「露菲娜山丘」奇安提露菲娜陳釀紅酒
                </li>
                <li>
CORNO GRANDE RISERVA MONTEPULCIANO D’ABRUZZO<br/>
大角山羊陳釀蒙特普爾恰諾紅酒
                </li>
                <li>
CORNO GRANDE PREMIUM MONTEPULCIANO D'ABRUZZO DOC<br/>
「大角山羊」蒙特普爾恰諾紅酒
                </li>
                <li>
VILLA GALASSO VETICA MONTEPULCIANO D’ABRUZZO DOC<br/>
葛拉索山莊蒙特普爾恰諾紅酒
                </li>
                </ul>
            </li>
            <li class="panel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#secondLink">產區(由北到南)</a></span>

                <ul id="secondLink" class="collapse">
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                </ul>
            </li>

            <li class="panel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#thirdLink">口感</a>
                </span>
                <ul id="thirdLink" class="collapse">
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                </ul>
            </li> 

            <li class="panel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#fourLink">義大利酒業</a>
                </span>
                <ul id="fourLink" class="collapse">
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                    <li>SubTest2</li>
                </ul>
            </li> -->                      
            @foreach ($types as $key=>$type)
            <li class="panel detailli" > 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#t{{$type->id}}">{{$type->name}}</a>
                </span>
                <ul id="t{{$type->id}}" class="collapse">
                @foreach ($ald[$type->id] as $key2=>$val2)
                    <li>
                        <a href="{{url('detail/')}}/{{$val2->id}}"  rel="external">
                        {!! $val2->name !!}
                        </a>
                    </li>
             
                @endforeach
                </ul>
            </li>
            @endforeach
            <!--
            <li class="panel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#fiveLink">義大利葡萄酒產業簡介</a>
                </span>
                <ul id="fiveLink" class="collapse">
                    <li><a href="{{url('knowledge/4/1')}}"  rel="external">產業簡介</a></li>
                </ul>
            </li>

            <li class="panel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#sixLink">義大利葡萄酒分級制</a>
                </span>
                <ul id="sixLink" class="collapse">
                     <li><a href="{{url('knowledge/5/1')}}"  rel="external">DOC(Denominazione di OrigineControllata)法定產區</a></li>
                     <li><a href="{{url('knowledge/5/2')}}"  rel="external">DOCG (Denominazione di Origine Controllata e Garantita)保證法定產區</a></li>
                     <li><a href="{{url('knowledge/5/3')}}"  rel="external">IGT(Indicazione geografica tipica)地區標誌酒</a></li>
                     <li><a href="{{url('knowledge/5/4')}}"  rel="external">VDT(Vino da Tavola)日常餐酒</a></li>
                </ul>
            </li>  -->           

        </ul>
    </div>
    <?php 
    ?>
    <div class="col-md-9"></div>
    </div>

    <div id='detail_pic' class='col-md-3 col-md-offset-0 col-sm-12 col-xs-12' style='padding-left:0px;padding-right: 0px;background-color:#fdfbf1;'>
        
        
        <div id='pwine_title' class='col-md-0 col-md-offset-0 col-sm-12 col-xs-12 text-center'>
                {!! $wine[0]->name !!}
        </div>
        

        <!-- 本為酒瓶,現在改為葡萄圖 -->
        <img  id='wwine_pic' src="{{ url('image/wine/large/')}}/{{$wine[0]->pic}}">
        <img  id='pwine_pic' src="{{ url('image/wine/large/')}}/{{$wine[0]->pic}}"
              class='col-md-12 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2'
              width="100%" style='padding-left:0px;padding-right: 0px;background-color:#fdfbf1;'>
        
        <!-- 酒滴 -->
        <!--
        <div id='rain' class='col-md-12 col-md-offset-0 col-sm-12 col-xs-12 text-center'>
            <img src="{{ url('image/knowledge/drop_knowledg_webside_grid-05.png')}}" width="24px" height="39px;">
        </div>
        -->
        <!-- 酒瓶 -->
        <!--
        <div id='bottle' class='col-md-12 col-md-offset-0 col-sm-12 col-xs-12 text-center'>
            <img src="{{ url('image/knowledge/place_Knowledg_webside_grid-08.png')}}" width="98px" height="261px;">
        </div>
        -->
        <!-- 手機版,觀看更多按鈕-->
        <!--
        <div id='pmore' class='col-md-4 col-md-offset-0 col-sm-12 col-xs-12 text-center'>
            <div>了解更多</div>
        </div>
        -->
    </div>

    <!-- 手機版區塊 -->
    
    <!-- 手機版專用水滴區塊 -->
    <!--
    <div id='prain' class='col-md-0 col-md-offset-0 col-sm-12 col-xs-12 text-center'>
        <img src="{{ url('image/knowledge/drap_RWD_phone_grid-05.png')}}" width="55px" height="91px;">
    </div>
    -->
    <!-- 手機版酒瓶 -->
    <!--
    <div id='pbottle' class='col-md-0 col-md-offset-0 col-sm-12 col-xs-12 text-center'>
        <img src="{{ url('image/knowledge/wine_know_RWD_phone_grid-06.png')}}" width="245px" height="619px">
    </div>
    -->
    <!-- 手機板按鈕 -->
    <!--
    <div id='ppmore' class='col-md-0 col-md-offset-0 col-sm-12 col-xs-12 text-center'>
        <div>了解更多</div>
    </div>    
    -->
    <!-- 由詳細資料修改樣式 -->
    <div id='detail_txt' class='col-md-3 col-md-offset-1 col-sm-12 col-xs-12'>
            
        <div id='txt_name' class='col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0'>
        {!! $wine[0]->name !!}
        </div>

        <div id='txt_des' class='col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-10  col-xs-offset-1'>
        {{$wine[0]->des}}
        </div>
          
        <div id='txt_ifo' class='col-sm-12 col-sm-offset-0 col-xs-12  col-xs-offset-0'>
        {!! $wine[0]->detail !!}
        </div>
        <!--
        <a href="{{url('/join')}}" rel="external">
        <div id='more'>
            獲取更多優惠訊息
        </div>
        </a>
        -->
        

        </div>
    </div>
    <div id='detail_mid' class='col-md-12 col-md-offset-0 col-sm-12 col-xs-12'>
        <div id='mid_pic' class='col-md-3 col-md-offset-1 col-sm-12 col-xs-12'>
            <img src="{{ url('image/winery2/')}}/{{ $winery[0]->pic_name2 }}" width="100%" height="100%">
        </div>
        <div id='mid_txt' class='col-md-6 col-md-offset-1 col-sm-12 col-xs-12'>
        {{$winery[0]->description}}
        </div>        
    </div>
    <!-- 新增兩個按鈕 -->
    <div id='detailBoxArea' class='col-md-12 col-md-offset-0 col-sm-12 col-xs-12 text-center'>
        <!-- 品種介紹 -->
        <a href="">
        <div id='type_intro' class='col-md-3 col-md-offset-4 col-sm-12 col-xs-12 text-center'>
            葡萄品種介紹
        </div>
        </a>
        <!-- 產地介紹 -->
        <a href="">
        <div id='oriINtro' class='col-md-3 col-md-offset-1 col-sm-12 col-xs-12 text-center'>
            產地介紹
        </div> 
        </a> 
    </div>

    <div id='detail_btm' class='col-md-12 col-md-offset-0 col-sm-12 col-xs-12 text-center'>
        <div class='col-md-4 col-md-offset-0 col-sm-4 col-xs-4'>
            <a href="{{url('/knowledge')}}/1/{{$wine[0]->variety}}" rel="external">
            <div class='col-md-6 col-md-offset-3 col-sm-12 col-xs-12 text-right'>
                <img class='wicon' src="{{ url('image/detail/grape_allgoods.png')}}"'>
                <img class='picon' src="{{ url('image/detail/grape_goods_RWD_phone_grid.png')}}"'>

            </div>
            </a>
            <!--
            <div class='btmtxt col-md-3 col-md-offset-0 col-sm-4 col-xs-4 text-left'>
                <p>葡萄品種</p>
                <p>Negroamar</p>

            </div>-->
        </div>

        <div class='col-md-4 col-md-offset-0 col-sm-4 col-xs-4 text-center'>
            <img class='wicon' src="{{ url('image/winery/')}}/{{$winery[0]->pic_name}}">
            <img class='picon' src="{{ url('image/winery/')}}/{{$winery[0]->pic_name}}">
        </div>
        <div class='col-md-4 col-md-offset-0 col-sm-4 col-xs-4'>
        <a href="{{url('/knowledge/')}}/2/{{$wine[0]->origin}}" rel="external">
            <div class='col-md-6 col-md-offset-0 col-sm-12 col-xs-12 text-right'>
                <img class='wicon' src="{{ url('image/detail/location_allgoods.png')}}"'>
                <img class='picon' src="{{ url('image/detail/place)goods_RWD_phone_grid.png')}}"'>
            </div>
            </a>
            <!--
            <div class='btmtxt col-md-3 col-md-offset-0 col-sm-4 col-xs-4 text-left'>
                <p>產品介紹</p>
                <p>Puglia</p>

            </div>-->
        </div>              
    </div>
</div>
@endsection
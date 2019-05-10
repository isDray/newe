@extends('front_default')

@section('title', '知識專區')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_knowledge.css')}}"/>
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
<div id='knowledge_area' class='col-md-12 col-sm-12 col-xs-12'>
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
            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#pfirstLink">葡萄種類(由北至南)</a>
                </span>
                <ul id="pfirstLink" class="collapse">
                    @foreach($alvariety as $key=>$val)
                    <li><a href="{{url('knowledge/1')}}/{{$val->id}}"  rel="external">{{$val->name}}</a></li>
                    @endforeach
                </ul>
            </li>

            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#psecLink">產區(由北至南)</a>
                </span>
                <ul id="psecLink" class="collapse">
                    @foreach($alorigin as $key=>$val)
                    <li><a href="{{url('knowledge/2')}}/{{$val->id}}"  rel="external">{{$val->name}}</a></li>
                    @endforeach
                    
                </ul>
            </li>

            <li class="ppanel"> 
                
                <span class='nptile glyphicon glyphicon-minus'><a data-parent="#accordion1" href="{{url('knowledge/3')}}" rel="external">義大利葡萄酒風味</a>
                </span>
                <!--
                <ul id="thirdLink" class="collapse">
                    <li><a href="{{url('knowledge/4/1')}}"  rel="external">產業簡介</a></li>
                </ul>-->
            </li>            

            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#pfiveLink">義大利葡萄酒產業簡介</a>
                </span>
                <ul id="pfiveLink" class="collapse">
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
            </li> 

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
            <li class="panel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#firstLink">葡萄種類(由北至南)</a>
                </span>
                <ul id="firstLink" class="collapse">
                    @foreach($alvariety as $key=>$val)
                    <li><a href="{{url('knowledge/1')}}/{{$val->id}}"  rel="external">{{$val->name}}</a></li>
                    @endforeach
                </ul>
            </li>

            <li class="panel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#secLink">產區(由北至南)</a>
                </span>
                <ul id="secLink" class="collapse">
                    @foreach($alorigin as $key=>$val)
                    <li><a href="{{url('knowledge/2')}}/{{$val->id}}"  rel="external">{{$val->name}}</a></li>
                    @endforeach
                    
                </ul>
            </li>

            <li class="panel"> 
                
                <span class='nptile glyphicon glyphicon-minus'><a data-parent="#accordion1" href="{{url('knowledge/3')}}" rel="external">義大利葡萄酒風味</a>
                </span>
                <!--
                <ul id="thirdLink" class="collapse">
                    <li><a href="{{url('knowledge/4/1')}}"  rel="external">產業簡介</a></li>
                </ul>-->
            </li>


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
            </li>             

        </ul>
    </div>
    <div class="col-md-9"></div>
    </div>

    <div id='detail_pic' class='col-md-3 col-md-offset-0 col-sm-12 col-xs-12' style='padding-left:0px;padding-right: 0px;'>
        
        <!-- 手機版酒品名稱,在知識專區不用
        <div id='pwine_title' class='col-md-0 col-md-offset-0 col-sm-12 col-xs-12 text-center'>
                SALICARIA TOSCANA IGT<br/>
                千禧花超級托斯卡尼紅酒
        </div>
         -->

        <!-- 本為酒瓶,現在改為葡萄圖 -->

        <img  id='wwine_pic' src="{{ url('image/variety')}}/{{$variety[0]->pic_name}}">
        <img  id='pwine_pic' src="{{ url('image/variety')}}/{{$variety[0]->pic_name}}"
              class='col-md-12 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2'
              width="100%" style='padding-left:0px;padding-right: 0px;'>
        
        <!-- 酒滴 -->
        
        <!--
        <div id='rain' class='col-md-12 col-md-offset-0 col-sm-12 col-xs-12 text-center'>
            <img src="{{ url('image/knowledge/drop_knowledg_webside_grid-05.png')}}" width="24px" height="39px;">
        </div>
        -->
        <!-- 酒瓶 -->
        
        @if( count($wine) > 0) 
        <!--
        <div id='bottle' class='col-md-12 col-md-offset-0 col-sm-12 col-xs-12 text-center'>
            <img src="{{ url('image/wine/small')}}/{{$wine[0]->pic}}" width="98px" height="261px;">
        </div>
        
        <!-- 手機版,觀看更多按鈕
        <a href="{{url('/detail')}}/{{$wine[0]->id}}" rel="external">
        <div id='pmore' class='col-md-4 col-md-offset-0 col-sm-12 col-xs-12 text-center'>
            <div>了解更多</div>
        </div>
        </a>-->
        @endif
        
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
        {{$variety[0]->name}}
        </div>

        <div id='txt_des' class='col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-10  col-xs-offset-1'>
        {{$variety[0]->description}}
        </div>
        <!--    
        <div id='txt_ifo' class='col-sm-12 col-sm-offset-0 col-xs-12  col-xs-offset-0'>
            酒莊名稱: CANTINE PAOLO LEO S.R.L.義大利保羅.列歐酒莊<br/>
            葡萄品種: 100%Negroamaro(尼古阿馬羅)<br/>
            酒品等級: IGT<br/>
            酒精濃度: 13%<br/>
            容量: 375ml/750ml<br/>
            適飲溫度: 18℃<br/>
            建議醒酒時間: 10~20分鐘<br/>
            推薦搭配料理: 可與各式西餐主菜、烤肉搭配；而配以乳酪類製品尤佳<br/>
        </div>
            
        <div id='more'>
            獲取更多優惠訊息
        </div>
        -->

        </div>
    </div>
    
    {{-- 改版新增酒款推薦 --}}
    <div id='recommend' class='col-md-7 col-md-offset-4 col-sm-12 col-sm-offset-0 col-xs-12  col-xs-offset-0'>
        <div id='recommendTitle' class='col-md-10 col-md-offset-1 text-center'>
            推薦酒款
        </div>
        {{-- 同品種酒款 --}}
        @foreach ($sameVarietys as $sameVariety)
        <a href="{{url('')}}/detail/{{$sameVariety->id}}" rel="external">
        <div class='recommendDiv col-md-4' >
        <figure>
            <img src="{{ url('image/wine') }}/small/{{ $sameVariety->pic }}" alt="Trulli" style="width:60px">
            <figcaption>{!! nl2br($sameVariety->name) !!}</figcaption>
        </figure>
        </div>
        </a>
        @endforeach
    </div>


</div>
@endsection
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
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#pfirstLink">釀酒用葡萄品種介紹</a>
                </span>
                <ul id="pfirstLink" class="collapse">
                    @foreach($alvariety as $key=>$val)
                    <li><a href="{{url('knowledge/1')}}/{{$val->id}}"  rel="external">{{$val->name}}</a></li>
                    @endforeach
                </ul>
            </li>

            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#psecLink">義大利葡萄酒產區介紹</a>
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
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#firstLink">釀酒用葡萄品種介紹</a>
                </span>
                <ul id="firstLink" class="collapse">
                    @foreach($alvariety as $key=>$val)
                    <li><a href="{{url('knowledge/1')}}/{{$val->id}}"  rel="external">{{$val->name}}</a></li>
                    @endforeach
                </ul>
            </li>

            <li class="panel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#secLink">義大利葡萄酒產區介紹</a>
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

    <div id='detail_pic' class='col-md-3 col-md-offset-0 col-sm-12 col-xs-12' style='padding-left:0px;padding-right: 0px;background-color:white;'>
        
        <!-- 手機版酒品名稱,在知識專區不用
        <div id='pwine_title' class='col-md-0 col-md-offset-0 col-sm-12 col-xs-12 text-center'>
                SALICARIA TOSCANA IGT<br/>
                千禧花超級托斯卡尼紅酒
        </div>
         -->

        <!-- 本為酒瓶,現在改為葡萄圖 -->
        <img  id='wwine_pic' src="{{ url('image/knowledge/wine_Knowledg_webside.png')}}">
        <img  id='pwine_pic' src="{{ url('image/knowledge/wine_Knowledg_webside.png')}}"
              class='col-md-12 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2'
              width="100%" style='padding-left:0px;padding-right: 0px;background-color:white;'>
        
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
            產業簡介
        
        </div>

        <div id='txt_des' class='col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-10  col-xs-offset-1'>
義大利，這位處地中海亞平寧半島的古老國家，是西方文明的搖籃，也是世界上最早種植葡萄釀酒的地區之一，其歷史可追朔至羅馬帝國建立前，伊特魯里亞人、希臘人與迦太基人各自在托斯卡納、科西嘉島、南義Puglia地區及西西里島開始種植葡萄並釀酒，距今已超過2800年之久。2014年，義大利葡萄酒產量約44.4億公升，世界排名第二，僅次於法國。

義大利半島呈現狹長靴型，北起阿爾卑斯山脈，南至西西里島，南北緯度橫跨十度，其漫長的海岸線，與廣泛的高山和丘陵地，造成當地氣候的多樣性：北部主要是大陸型氣候、其他大部分地區為地中海型氣候；而土質的組成也反映出其複雜性：有沖積土、火山岩土壤、與石灰岩黏土混合型土壤。

多樣的地理環境與氣候，造就了葡萄繁衍的天堂，品種繁多，是大約一千種歐洲種釀酒葡萄(Vitis Vinifera)的故鄉，所釀出的葡萄酒風味殊異、性格獨特，所以古代希臘人稱義大利為“Oenotria”，意思是“葡萄酒之鄉”。根據義大利官方的調查，義大利境內總共種植440種不同的葡萄品種，若考慮同種異名及其他無性變異系(clones)，則估計數量將增加至1,500種以上。

目前義大利可依其行政區劃分成20個產酒區，超過一萬一千多家酒莊、以及二十八萬種以上的酒款，至2017年六月，共有74種D.O.C.G. (Denominazioni di Origine Controllata e Garantita，保證法定產區)酒、334種D.O.C. (Denominazioni di Origine Controllata，法定產區)酒。

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
    <!--
    <div id='detail_mid' class='col-md-12 col-md-offset-0 col-sm-12 col-xs-12'>
        <div id='mid_pic' class='col-md-3 col-md-offset-1 col-sm-12 col-xs-12'>
            <img src="{{ url('image/detail/bnallgoods.png') }}" width="100%" height="100%">
        </div>
        <div id='mid_txt' class='col-md-6 col-md-offset-1 col-sm-12 col-xs-12'>
            葡萄除梗後,加入精選的酵母,把溫度控制在22~24°C範圍內進行發酵8~10日,並每日施以瓶身轉動；酒精開始發酵後,得馬上進行蘋果酸乳酸發酵程序,把酸度降低。酒液裝入不銹鋼容器5個月,再注入瓶中封存1個月完成熟成程序。
            <br>
            <br>
            酒莊簡介
Paolo Leo家族承襲了五個世代以來對於葡萄酒事業的熱情，至今仍在義大利南部普利亞(Puglia)產區薩蘭多(Salento)半島中心、布林迪西省(Brindisi)東邊的聖．多納奇(San Donaci)小鎮從事葡萄種植與釀酒工作。目前Paolo Leo已是佔地17,000平方公尺的現代化酒莊，擁有25英畝葡萄園；酒莊內備有501桶供陳釀用的美國與法國橡木桶，以及全自動化的裝瓶生產線，葡萄酒年產量五百萬公升。
  
貼心小建議
能夠搭配各式料理 , 建議醒酒時間為10至20分鐘。
        </div>        
    </div>

    <div id='detail_btm' class='col-md-12 col-md-offset-0 col-sm-12 col-xs-12 text-center'>
        <div class='col-md-4 col-md-offset-0 col-sm-4 col-xs-4'>
            <div class='col-md-6 col-md-offset-3 col-sm-12 col-xs-12 text-right'>
                <img class='wicon' src="{{ url('image/detail/grape_allgoods.png')}}"'>
                <img class='picon' src="{{ url('image/detail/grape_goods_RWD_phone_grid.png')}}"'>

            </div>
            <div class='btmtxt col-md-3 col-md-offset-0 col-sm-4 col-xs-4 text-left'>
                <p>葡萄品種</p>
                <p>Negroamar</p>

            </div>
        </div>
        <div class='col-md-4 col-md-offset-0 col-sm-4 col-xs-4 text-center'>
            <img class='wicon' src="{{ url('image/detail/logo_allgoods.png')}}"'>
            <img class='picon' src="{{ url('image/detail/logos_goods_RWD_phone_grid.png')}}"'>
        </div>
        <div class='col-md-4 col-md-offset-0 col-sm-4 col-xs-4'>
            <div class='col-md-6 col-md-offset-0 col-sm-12 col-xs-12 text-left'>
                <img class='wicon' src="{{ url('image/detail/location_allgoods.png')}}"'>
                <img class='picon' src="{{ url('image/detail/place)goods_RWD_phone_grid.png')}}"'>
            </div>
            <div class='btmtxt col-md-3 col-md-offset-0 col-sm-4 col-xs-4 text-left'>
                <p>產品介紹</p>
                <p>Puglia</p>

            </div>
        </div>                
    </div>-->
</div>
@endsection
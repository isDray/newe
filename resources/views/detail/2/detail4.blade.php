@extends('front_default')

@section('title', '商品詳細資訊')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_detail.css')}}"/>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.js"></script>
<script type="text/javascript">
$(function(){

    $('.panel').click(function(){
        if( $(this).children("span").attr('class') == 'ptile glyphicon glyphicon-chevron-down'){
            $(this).children("span").attr('class','ptile glyphicon glyphicon-chevron-up');
        }else{
            $(this).children("span").attr('class','ptile glyphicon glyphicon-chevron-down');
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
    


})

   
</script>
@endsection

@section('main')
<div id='detail_area' class='col-md-12 col-sm-12 col-xs-12'>
    <div id='detail_top' class='col-md-12 col-sm-12 col-xs-12'>
        
    <div id='pm_main'>
        <div id='pm_label' class='pm_out'></div>
        
        <ul class="nav nav-stacked " id="accordion1">
            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#pfirstLink">紅酒</a></span>

                <ul id="pfirstLink" class="collapse">
                                <li style='color:#752761;'>
                <a href="{{url('/detail/1/1')}}" rel="external"> 
                BRICCO MAIOLICA LANGHE NEBBIOLO DOC<br/>
                "瑪若利卡山莊(藍)"朗格內比奧羅紅葡萄酒
                </a>
                </li>

                <li>
                <a href="{{url('/detail/1/2')}}" rel="external">                
                BRICCO MAIOLICA BARBERA D' ALBA DOC<br/>
                "瑪若利卡山莊(紅)"巴貝拉紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/3')}}" rel="external">
                FATTORIA DI GRIGNANO "GRIGNANO" CHIANTI RUFINA DOCG<br/>
                "格里納羅"奇安提露菲娜紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/4')}}" rel="external">
                FATTORIA DI GRIGNANO "POGGIO GUALTIERI" CHIANTI RUFINA RISERVA DOCG<br/>
                魅紫尼古阿馬羅紅酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/5')}}" rel="external">
                FATTORIA DI GRIGNANO "SALICARIA" TOSCANA IGT<br/>
                "千禧花"超級托斯卡尼紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/6')}}" rel="external">
                GALASSO VILLA GALASSO VETICA MONTEPULCIANO D’ABRUZZO DOC<br/>
                "葛拉索山莊"蒙特普爾恰諾紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/7')}}" rel="external">
                GALASSO CORNO GRANDE PREMIUM MONTEPULCIANO D’ABRUZZO DOC<br/>
                "大角山羊"蒙特普爾恰諾紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/8')}}" rel="external">
                GALASSO CORNO GRANDE RISERVA MONTEPULCIANO D’ABRUZZO DOC<br/>
                "大角山羊"陳釀蒙特普爾恰諾紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/9')}}" rel="external">
                NEGROAMARO PUGLIA IGT<br/>
                "魅紫"尼古阿馬羅紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/10')}}" rel="external">
                PRIMITIVO SALENTO IGP<br/>
                "曜黑"普里米蒂沃紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/11')}}" rel="external">
                PASSO DEL CARDINALE PRIMITIVO DI MANDURIA DOP<br/>
                "紅衣主教"普里米蒂沃紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/12')}}" rel="external">
                ORFEO NEGROAMARO PUGLIA IGT<br/>
                "奧菲歐"尼古阿馬羅紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/13')}}" rel="external">
                FIORE DI VIGNA PRIMITIVO SALENTO IGT<br/>
                "葡萄花精靈"普里米蒂沃紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/14')}}" rel="external">
                NERIMATTI RISERVA SALICE SALENTINO DOC<br/>
                "内瑞馬提"薩利切薩倫帝諾陳釀紅葡萄酒 
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/15')}}" rel="external">
                TACCOROSSO NEGROAMARO PUGLIA IGP<br/>
                "塔克羅素"尼古阿馬羅紅葡萄酒
                </a>
                </li> 
                </ul>
            </li>

            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#psecondLink">白酒</a></span>

                <ul id="psecondLink" class="collapse">
                    <li>
                    <a href="{{url('/detail/2/1')}}" rel="external">
                    BATTIGIA CHARDONNAY SALENTO IGT<br/>
                    "薩蘭多海灘"夏多內白酒
                    </a>
                    </li>
                    <li>
                    <a href="{{url('/detail/2/2')}}" rel="external">
                    STURM FRIULANO COLLIO DOC<br/>
                    "史騰一號"弗留利白葡萄酒
                    </a>
                    </li>
                    <li>
                    <a href="{{url('/detail/2/3')}}" rel="external">
                    STURM RIBOLLA GIALLA COLLIO DOC<br/>
                    "史騰二號"麗波拉姬亞拉白葡萄酒
                    </a>
                    </li>
                    <li>
                    <a href="{{url('/detail/2/4')}}" rel="external">
                    PINOT BIANCO DOC FRIULI GRAVE<br/>
                    "雷蒙帝一號"白皮諾白葡萄酒
                    </a>
                    </li>
                    <li>
                    <a href="{{url('/detail/2/5')}}" rel="external">
                    PINOT GRIGIO DOC FRIULI GRAVE<br/>
                    "雷蒙帝二號"灰皮諾白葡萄酒
                    </a>
                    </li> 
                </ul>
            </li>

            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#pthirdLink">氣泡酒</a>
                </span>
                <ul id="pthirdLink" class="collapse">
                    <li>
                    <a href="{{url('/detail/3/1')}}" rel="external">
                    FEDERICO FERRERO SORI GALA MOSCATO D’ASTI DOCG<br/>
                    "陽光慶典"莫斯卡托微氣泡甜白酒
                    </a>
                    </li>
                    <li>
                    <a href="{{url('/detail/3/2')}}" rel="external">
                    MONTEVERDI MOSCATO OLTREPO PAVESE DOC<br/>
                    "蒙特羅帝"莫斯卡托微氣泡甜白酒
                    </a>
                    </li>
                    <li>
                    <a href="{{url('/detail/3/3')}}" rel="external">
                    MILLESIMATO EXTRA DRY VINO SPUMANTE BIANCO<br/>
                    "2014年份"特甘型氣泡酒
                    </a>
                    </li>
                    <li>
                    <a href="{{url('/detail/3/4')}}" rel="external">
                    MARANELLO GOLD MOSCATO SPUMANTE DOLCE<br/>
                    "瑪拉內洛一號(金)"莫斯卡托甜氣泡酒
                    </a>
                    </li>
                    <li>
                    <a href="{{url('/detail/3/5')}}" rel="external">
                    MARANELLO GOLD PROSECCO DOC SPUMANTE EXTRADRY <br/>
                    "瑪拉內洛二號(金)"特甘型普錫科氣泡酒
                    </a>
                    </li> 
                </ul>
            </li>            
        
        </ul>        
         
    </div>

    <div id='detail_menu' class='col-md-3 col-md-offset-1 col-sm-0 col-xs-0'>
        
    
    <div id='detail_body' class="col-md-12 col-sm-12 col-xs-12" style='padding-right: 0px;padding-left: 0px;'>

        <ul class="nav nav-stacked wnav" id="accordion1">
            <!--<li class="panel" data-toggle="collapse" data-parent="#accordion1" href="#firstLink">-->
            <span class='ptile glyphicon glyphicon-chevron-down panel'  data-toggle="collapse" data-parent="#accordion1" href="#firstLink"><a>紅酒</a>
            </span>
                <ul id="firstLink" class="collapse">
                
                <li style='color:#752761;'>
                <a href="{{url('/detail/1/1')}}" rel="external"> 
                BRICCO MAIOLICA LANGHE NEBBIOLO DOC<br/>
                "瑪若利卡山莊(藍)"朗格內比奧羅紅葡萄酒
                </a>
                </li>

                <li>
                <a href="{{url('/detail/1/2')}}" rel="external">                
                BRICCO MAIOLICA BARBERA D' ALBA DOC<br/>
                "瑪若利卡山莊(紅)"巴貝拉紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/3')}}" rel="external">
                FATTORIA DI GRIGNANO "GRIGNANO" CHIANTI RUFINA DOCG<br/>
                "格里納羅"奇安提露菲娜紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/4')}}" rel="external">
                FATTORIA DI GRIGNANO "POGGIO GUALTIERI" CHIANTI RUFINA RISERVA DOCG<br/>
                魅紫尼古阿馬羅紅酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/5')}}" rel="external">
                FATTORIA DI GRIGNANO "SALICARIA" TOSCANA IGT<br/>
                "千禧花"超級托斯卡尼紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/6')}}" rel="external">
                GALASSO VILLA GALASSO VETICA MONTEPULCIANO D’ABRUZZO DOC<br/>
                "葛拉索山莊"蒙特普爾恰諾紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/7')}}" rel="external">
                GALASSO CORNO GRANDE PREMIUM MONTEPULCIANO D’ABRUZZO DOC<br/>
                "大角山羊"蒙特普爾恰諾紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/8')}}" rel="external">
                GALASSO CORNO GRANDE RISERVA MONTEPULCIANO D’ABRUZZO DOC<br/>
                "大角山羊"陳釀蒙特普爾恰諾紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/9')}}" rel="external">
                NEGROAMARO PUGLIA IGT<br/>
                "魅紫"尼古阿馬羅紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/10')}}" rel="external">
                PRIMITIVO SALENTO IGP<br/>
                "曜黑"普里米蒂沃紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/11')}}" rel="external">
                PASSO DEL CARDINALE PRIMITIVO DI MANDURIA DOP<br/>
                "紅衣主教"普里米蒂沃紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/12')}}" rel="external">
                ORFEO NEGROAMARO PUGLIA IGT<br/>
                "奧菲歐"尼古阿馬羅紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/13')}}" rel="external">
                FIORE DI VIGNA PRIMITIVO SALENTO IGT<br/>
                "葡萄花精靈"普里米蒂沃紅葡萄酒
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/14')}}" rel="external">
                NERIMATTI RISERVA SALICE SALENTINO DOC<br/>
                "内瑞馬提"薩利切薩倫帝諾陳釀紅葡萄酒 
                </a>
                </li>
                <li>
                <a href="{{url('/detail/1/15')}}" rel="external">
                TACCOROSSO NEGROAMARO PUGLIA IGP<br/>
                "塔克羅素"尼古阿馬羅紅葡萄酒
                </a>
                </li>                      
            
                </ul>
            <!--</li>
            <li class="panel"> -->
                <span class='panel ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#secondLink">白酒</a></span>

                <ul id="secondLink" class="collapse">
                    <li>
                    <a href="{{url('/detail/2/1')}}" rel="external">
                    BATTIGIA CHARDONNAY SALENTO IGT<br/>
                    "薩蘭多海灘"夏多內白酒
                    </a>
                    </li>
                    <li>
                    <a href="{{url('/detail/2/2')}}" rel="external">
                    STURM FRIULANO COLLIO DOC<br/>
                    "史騰一號"弗留利白葡萄酒
                    </a>
                    </li>
                    <li>
                    <a href="{{url('/detail/2/3')}}" rel="external">
                    STURM RIBOLLA GIALLA COLLIO DOC<br/>
                    "史騰二號"麗波拉姬亞拉白葡萄酒
                    </a>
                    </li>
                    <li>
                    <a href="{{url('/detail/2/4')}}" rel="external">
                    PINOT BIANCO DOC FRIULI GRAVE<br/>
                    "雷蒙帝一號"白皮諾白葡萄酒
                    </a>
                    </li>
                    <li>
                    <a href="{{url('/detail/2/5')}}" rel="external">
                    PINOT GRIGIO DOC FRIULI GRAVE<br/>
                    "雷蒙帝二號"灰皮諾白葡萄酒
                    </a>
                    </li>                                                
                </ul>
            <!--</li>

            <li class="panel"> -->
                <span class='panel ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#thirdLink">氣泡酒</a>
            </span>
                <ul id="thirdLink" class="collapse">
                    <li>
                    <a href="{{url('/detail/3/1')}}" rel="external">
                    FEDERICO FERRERO SORI GALA MOSCATO D’ASTI DOCG<br/>
                    "陽光慶典"莫斯卡托微氣泡甜白酒
                    </a>
                    </li>
                    <li>
                    <a href="{{url('/detail/3/2')}}" rel="external">
                    MONTEVERDI MOSCATO OLTREPO PAVESE DOC<br/>
                    "蒙特羅帝"莫斯卡托微氣泡甜白酒
                    </a>
                    </li>
                    <li>
                    <a href="{{url('/detail/3/3')}}" rel="external">
                    MILLESIMATO EXTRA DRY VINO SPUMANTE BIANCO<br/>
                    "2014年份"特甘型氣泡酒
                    </a>
                    </li>
                    <li>
                    <a href="{{url('/detail/3/4')}}" rel="external">
                    MARANELLO GOLD MOSCATO SPUMANTE DOLCE<br/>
                    "瑪拉內洛一號(金)"莫斯卡托甜氣泡酒
                    </a>
                    </li>
                    <li>
                    <a href="{{url('/detail/3/5')}}" rel="external">
                    MARANELLO GOLD PROSECCO DOC SPUMANTE EXTRADRY <br/>
                    "瑪拉內洛二號(金)"特甘型普錫科氣泡酒
                    </a>
                    </li>                           
                                                            
                </ul>
            <!--</li>-->
        
        </ul>
    </div>
    <div class="col-md-9"></div>



        </div>

        <div id='detail_pic' class='col-md-3 col-md-offset-0 col-sm-12 col-xs-12'>
            <div id='pwine_title' class='col-md-0 col-md-offset-0 col-sm-12 col-xs-12 text-center'>
PINOT BIANCO DOC FRIULI GRAVE <br>
"雷蒙帝一號"白皮諾白葡萄酒
            </div>
            <img  id='wwine_pic' src="{{ url('image/goods/white04.png')}}">
            <img  id='pwine_pic' src="{{ url('image/goods/white04.png')}}"
            class='col-md-3 col-md-offset-0 '>
            <!-- 手機版,觀看更多按鈕-->
            <div id='pmore' class='col-md-3 col-md-offset-0 col-sm-12 col-xs-12'>
                <div>獲得更多優惠資訊</div>
            </div>
        </div>


        <div id='detail_txt' class='col-md-3 col-md-offset-1 col-sm-12 col-xs-12'>
            
            <div id='txt_name'>
PINOT BIANCO DOC FRIULI GRAVE <br>
"雷蒙帝一號"白皮諾白葡萄酒
            </div>


            <div id='txt_des' class='col-md-10 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-8  col-xs-offset-2'>
 葡萄於每年九月底採收後，在低溫下浸漬36小時預先發酵； 隨後輕微擠壓葡萄, 在溫控下進行酒精發酵, 並在其酒糟中經過幾個月的熟成。酒體呈現麥稈金黃色澤，帶有成熟熱帶水果香氣、與黃桃甜香； 味道平衡且富有香氣。
            </div>
            
            <div id='txt_ifo' class='col-sm-12 col-sm-offset-0 col-xs-12  col-xs-offset-0'>

酒莊名稱: CANTINA LE MONDE
                  義大利雷蒙帝酒莊 <br>
葡萄品種: 100%Pinot Bianco(白皮諾) <br>
酒品等級: DOC <br>
酒精濃度: 13% <br>
容量: 750ml <br>
適飲溫度: 8-10°C <br>
推薦搭配料理: 搭配以海鮮開胃菜十分出色; 當與白肉或烤魚料理搭配時，其酒體也可帶出很有趣的特色來。 <br>
            </div>
            
            <div id='more'>
                獲取更多優惠訊息
            </div>
        
        </div>
    </div>

    <div id='detail_mid' class='col-md-12 col-md-offset-0 col-sm-12 col-xs-12'>
        <div id='mid_pic' class='col-md-3 col-md-offset-1 col-sm-12 col-xs-12'>
            <img src="{{ url('image/detail/bnallgoods.png') }}" width="100%" height="100%">
        </div>
        <div id='mid_txt' class='col-md-6 col-md-offset-1 col-sm-12 col-xs-12'>
 Le Monde 酒莊位於義大利東北角Friuli-Venezia Giulia大區中，阿爾卑斯山(Alps)和亞得里亞海(Adriatic)之間Pordenone省Friuli Grave DOC產區。"Le Monde"來自日耳曼-拉丁字"Mundio"，是一部古代"保護"該地區農田的日耳曼法律，Le Monde 酒莊用以自許為葡萄園守護者，以崇敬自然、維持古老土地永續發展的健康方式耕作。
    莊主Alex Maccan於2008年購入Le Monde 酒莊，Giovanni Ruzzene為酒莊首席釀酒師。酒莊葡萄園耕地面積這幾年來已成長至70公頃。其中有些葡萄樹已高達40歲；園區內土壤不同於該地區普遍的礫石類土壤，而是黏土與石灰石土壤的組合，可說是最優良的特等葡萄園"Cru"，加上東北部有阿爾卑斯山的屏障、亞得里亞海的清涼微風吹拂和長時間的日照，讓此地產出的葡萄有更複雜更豐富的風味。葡萄採用單枝雙臂向下倒轉法 (Doppio Capovolto)與居由式剪枝法(Guyot)種植，每公頃可持續產出葡萄7~8公噸。
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
    </div>
</div>
@endsection
@extends('front_default')

@section('title', '商品')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_goods.css')}}"/>
<link rel="stylesheet" href="{{ url('css/front_knowledget.css')}}"/>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.js"></script>


@endsection

@section('main')

<ul id="goods_menu" class="nav nav-tabs">
    @foreach ($types as $key=>$type)
    @if ($key === 0)
	<div id='goods_item1' class='active allitem col-md-1 col-md-offset-1 col-sm-3 col-sm-offset-0  col-xs-3 col-xs-offset-0 text-center'>
		<a href="#tab{{$key}}" data-toggle="tab" >{{$type->name}}</a>
	</div>
	@else
	<div id='goods_item1' class='active allitem col-md-1 col-md-offset-1 col-sm-3 col-sm-offset-0  col-xs-3 col-xs-offset-0 text-center'>
		<a href="#tab{{$key}}" data-toggle="tab" >{{$type->name}}</a>
	</div>
    @endif
	@endforeach
	<div id='goods_item1' class='allitem col-md-1 col-md-offset-1 col-sm-3 col-sm-offset-0  col-xs-3 col-xs-offset-0 text-center pwl'>
		<a href="#noone" data-toggle="tab">口感</a>
	</div>

	<div id='goods_item1' class='allitem col-md-2 col-md-offset-1 col-sm-3 col-sm-offset-0  col-xs-3 col-xs-offset-0 text-center wwl'>
		<a href="#taste" data-toggle="tab">義大利葡萄酒風味</a>
	</div>

</ul>
<div id="myTabContent" class="tab-content">

<div id='tab0'  class='col-md-12 col-sm-12 col-xs-12 tab-pane fade in  @if($nowType ==1)active @endif'>
    <div id='glhead'>
    	
    </div>
    @foreach ($wines as $key=>$wine)

    @if ($key%2 == 0)
    <div class='goods_list_item col-md-12 col-sm-12 col-xs-12'>
    @else
    <div class='goods_list_item2 col-md-12 col-sm-12 col-xs-12'>
    @endif
    
	
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='wpic' src="{{ url('/image/wine/large/')}}/{{$wine->pic}}">
		        <img class='ppic' src="{{ url('/image/wine/large/')}}/{{$wine->pic}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4 col-md-offset-1 col-sm-7 col-sm-offset-0 col-xs-7 col-xs-offset-0'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
	            {!!$wine->name!!}
				<p class='goods_subtxt'>{!!$wine->sortdes!!}</p>
			</div>
		</div>
		<div class='goods_btn_area col-md-1 col-sm-1 col-xs-1'>
		    <div class='goods_btn col-md-12 col-sm-1 col-xs-1'>
		    	<a  data-ajax="false" class='wmore' href="{{url('/detail/')}}/{{$wine->id}}">
		    		看更多
		    	</a>
		        <a  data-ajax="false" class='pmore glyphicon glyphicon-chevron-right' href="{{url('/detail/')}}/{{$wine->id}}">
		    		
		    	</a>
		    </div>
		</div>
	</div>
	@endforeach
</div>

<!--白酒 -->
<div id='tab1'  class='col-md-12 col-sm-12 col-xs-12 tab-pane @if($nowType ==2)active @endif'>
    <div id='glhead'>
    	
    </div>
    @foreach ($wines2 as $key=>$wine)

    @if ($key%2 == 0)
    <div class='goods_list_item col-md-12 col-sm-12 col-xs-12'>
    @else
    <div class='goods_list_item2 col-md-12 col-sm-12 col-xs-12'>
    @endif
    
	
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='wpic' src="{{ url('/image/wine/large/')}}/{{$wine->pic}}">
		        <img class='ppic' src="{{ url('/image/wine/large/')}}/{{$wine->pic}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4 col-md-offset-1 col-sm-7 col-sm-offset-0 col-xs-7 col-xs-offset-0'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
	            {!!$wine->name!!}
				<p class='goods_subtxt'>{!!$wine->sortdes!!}</p>
			</div>
		</div>
		<div class='goods_btn_area col-md-1 col-sm-1 col-xs-1'>
		    <div class='goods_btn col-md-12 col-sm-1 col-xs-1'>
		    	<a data-ajax="false" class='wmore' href="{{url('/detail/')}}/{{$wine->id}}">
		    		看更多
		    	</a>
		        <a data-ajax="false" class='pmore glyphicon glyphicon-chevron-right' href="{{url('/detail/')}}/{{$wine->id}}">
		    		
		    	</a>
		    </div>
		</div>
	</div>
	@endforeach
</div>
<!-- 氣泡酒 -->
<div id='tab2'  class='col-md-12 col-sm-12 col-xs-12 tab-pane @if($nowType ==3)active @endif'>
    <div id='glhead'>
    	
    </div>
    @foreach ($wines5 as $key=>$wine)

    @if ($key%2 == 0)
    <div class='goods_list_item col-md-12 col-sm-12 col-xs-12'>
    @else
    <div class='goods_list_item2 col-md-12 col-sm-12 col-xs-12'>
    @endif
    
	
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='wpic' src="{{ url('/image/wine/large/')}}/{{$wine->pic}}">
		        <img class='ppic' src="{{ url('/image/wine/large/')}}/{{$wine->pic}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4 col-md-offset-1 col-sm-7 col-sm-offset-0 col-xs-7 col-xs-offset-0'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
	            {!!$wine->name!!}
				<p class='goods_subtxt'>{!!$wine->sortdes!!}</p>
			</div>
		</div>
		<div class='goods_btn_area col-md-1 col-sm-1 col-xs-1'>
		    <div class='goods_btn col-md-12 col-sm-1 col-xs-1'>
		    	<a data-ajax="false" class='wmore' href="{{url('/detail/')}}/{{$wine->id}}">
		    		看更多
		    	</a>
		        <a data-ajax="false" class='pmore glyphicon glyphicon-chevron-right' href="{{url('/detail/')}}/{{$wine->id}}">
		    		
		    	</a>
		    </div>
		</div>
	</div>
	@endforeach
</div>

<!-- 依口感 -->
<div id='taste'  class='col-md-12 col-sm-12 col-xs-12 tab-pane @if($nowType ==4)active @endif'>
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
                    <li><a data-ajax="false" href="{{url('knowledge/1')}}/{{$val->id}}"  rel="external">{{$val->name}}</a></li>
                    @endforeach
                </ul>
            </li>

            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#psecLink">義大利葡萄酒產地介紹</a>
                </span>
                <ul id="psecLink" class="collapse">
                    @foreach($alorigin as $key=>$val)
                    <li><a data-ajax="false" href="{{url('knowledge/2')}}/{{$val->id}}"  rel="external">{{$val->name}}</a></li>
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
                    <li><a data-ajax="false" href="{{url('knowledge/4/1')}}"  rel="external">產業簡介</a></li>
                </ul>
            </li>

            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#psixLink">義大利葡萄酒分級制</a>
                </span>
                <ul id="psixLink" class="collapse">
                    <li><a data-ajax="false" href="{{url('knowledge/5/1')}}"  rel="external">DOC(Denominazione di OrigineControllata)法定產區</a></li>
                     <li><a data-ajax="false" href="{{url('knowledge/5/2')}}"  rel="external">DOCG (Denominazione di Origine Controllata e Garantita)保證法定產區</a></li>
                     <li><a data-ajax="false" href="{{url('knowledge/5/3')}}"  rel="external">IGT(Indicazione geografica tipica)地區標誌酒</a></li>
                     <li><a data-ajax="false" href="{{url('knowledge/5/4')}}"  rel="external">VDT(Vino da Tavola)日常餐酒</a></li>
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
                    <li><a data-ajax="false" href="{{url('knowledge/1')}}/{{$val->id}}"  rel="external">{{$val->name}}</a></li>
                    @endforeach
                </ul>
            </li>

            <li class="panel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#secLink">義大利葡萄酒產區介紹</a>
                </span>
                <ul id="secLink" class="collapse">
                    @foreach($alorigin as $key=>$val)
                    <li><a data-ajax="false" href="{{url('knowledge/2')}}/{{$val->id}}"  rel="external">{{$val->name}}</a></li>
                    @endforeach
                    
                </ul>
            </li>

            <li class="panel"> 
                
                <span class='nptile glyphicon glyphicon-minus'><a data-ajax="false" data-parent="#accordion1" href="{{url('knowledge/3')}}" rel="external">義大利葡萄酒風味</a>
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
                    <li><a data-ajax="false" href="{{url('knowledge/4/1')}}"  rel="external">產業簡介</a></li>
                </ul>
            </li>

            <li class="panel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#sixLink">義大利葡萄酒分級制</a>
                </span>
                <ul id="sixLink" class="collapse">
                     <li><a data-ajax="false" href="{{url('knowledge/5/1')}}"  rel="external">DOC(Denominazione di OrigineControllata)法定產區</a></li>
                     <li><a data-ajax="false" href="{{url('knowledge/5/2')}}"  rel="external">DOCG (Denominazione di Origine Controllata e Garantita)保證法定產區</a></li>
                     <li><a data-ajax="false" href="{{url('knowledge/5/3')}}"  rel="external">IGT(Indicazione geografica tipica)地區標誌酒</a></li>
                     <li><a data-ajax="false" href="{{url('knowledge/5/4')}}"  rel="external">VDT(Vino da Tavola)日常餐酒</a></li>
                </ul>
            </li>             

        </ul>
    </div>
    <div class="col-md-9"></div>
    </div>

    <div id='detail_pic' class='col-md-7 col-md-offset-0 col-sm-12 col-xs-12' style='padding-left:0px;padding-right: 0px;'>

    <div class='wine_type col-md-12 col-sm-12 col-xs-12'>
    紅酒
    </div>
    <div class='wine_bx col-md-12 col-sm-12 col-xs-12'>

        <div class='taste_tle col-md-12 col-sm-12 col-xs-12'>
            清新果香
        </div>
        <div class='taste_bx col-md-12 col-sm-12 col-xs-12'>
            @foreach($kwine1 as $val)
            <a data-ajax="false" href="{{url('detail/')}}/{{$val->id}}" rel="external">
            <div class='taste_w col-md-6 col-sm-6 col-xs-6'>
            {!! $val->name !!}
            </div>
            </a>
            @endforeach
        </div>

        <div class='taste_tle col-md-12 col-sm-12 col-xs-12'>
            濃郁層次
        </div>
        <div class='taste_bx col-md-12 col-sm-12 col-xs-12'>
            @foreach($kwine2 as $val)
            <a data-ajax="false" href="{{url('detail/')}}/{{$val->id}}" rel="external">
            <div class='taste_w col-md-6 col-sm-6 col-xs-6'>
            {!! $val->name !!}
            </div>
            </a>
            @endforeach
        </div>        
        <div class='taste_tle col-md-12 col-sm-12 col-xs-12'>
            木質辛香
        </div>
        <div class='taste_bx col-md-12 col-sm-12 col-xs-12'>
            
            @foreach($kwine3 as $val)
            <a data-ajax="false" href="{{url('detail/')}}/{{$val->id}}" rel="external">
            <div class='taste_w col-md-6 col-sm-6 col-xs-6'>
            {!! $val->name !!}
            </div>
            </a>
            @endforeach
        </div>                
        <div class='taste_tle col-md-12 col-sm-12 col-xs-12'>
            口感醇厚
        </div>
        <div class='taste_bx col-md-12 col-sm-12 col-xs-12'>
            @foreach($kwine4 as $val)
            <a data-ajax="false" href="{{url('detail/')}}/{{$val->id}}" rel="external">
            <div class='taste_w col-md-6 col-sm-6 col-xs-6'>
            {!! $val->name !!}
            </div>
            </a>
            @endforeach
        </div>                

    </div>

    <div class='wine_type col-md-12 col-sm-12 col-xs-12'>
    白酒
    </div>
    <div class='wine_bx col-md-12 col-sm-12 col-xs-12'>
        <div class='taste_tle col-md-12 col-sm-12 col-xs-12'>
            礦石微酸
        </div>
        <div class='taste_bx col-md-12 col-sm-12 col-xs-12'>
            @foreach($kwine5 as $val)
            <a data-ajax="false" href="{{url('detail/')}}/{{$val->id}}" rel="external">
            <div class='taste_w col-md-6 col-sm-6 col-xs-6'>
            {!! $val->name !!}
            </div>
            </a>
            @endforeach
        </div>                   
        <div class='taste_tle col-md-12 col-sm-12 col-xs-12'>
            清新果香
        </div>
        <div class='taste_bx col-md-12 col-sm-12 col-xs-12'>
            @foreach($kwine6 as $val)
            <a data-ajax="false" href="{{url('detail/')}}/{{$val->id}}" rel="external">
            <div class='taste_w col-md-6 col-sm-6 col-xs-6'>
            {!! $val->name !!}
            </div>
            </a>
            @endforeach
        </div>              
    </div>
    <div class='wine_type col-md-12 col-sm-12 col-xs-12'>
    氣泡酒
    </div>
    <div class='wine_bx col-md-12 col-sm-12 col-xs-12'>
        <div class='taste_tle col-md-12 col-sm-12 col-xs-12'>
            甜蜜奔放
        </div>
        <div class='taste_bx col-md-12 col-sm-12 col-xs-12'>
            @foreach($kwine7 as $val)
            <a data-ajax="false" href="{{url('detail/')}}/{{$val->id}}" rel="external">
            <div class='taste_w col-md-6 col-sm-6 col-xs-6'>
            {!! $val->name !!}
            </div>
            </a>
            @endforeach
        </div>                   
        <div class='taste_tle col-md-12 col-sm-12 col-xs-12'>
            清爽回甘
        </div>
        <div class='taste_bx col-md-12 col-sm-12 col-xs-12'>
            @foreach($kwine8 as $val)
            <a data-ajax="false" href="{{url('detail/')}}/{{$val->id}}" rel="external">
            <div class='taste_w col-md-6 col-sm-6 col-xs-6'>
            {!! $val->name !!}
            </div>
            </a>
            @endforeach
        </div>              
    </div>
    </div>


    </div>
 
</div>	
</div>
</div>
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
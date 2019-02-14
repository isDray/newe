@extends('front_default')

@section('title', '商品')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_goods.css')}}"/>
<link rel="stylesheet" href="{{ url('css/front_knowledget.css')}}"/>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.js"></script>


@endsection

@section('main')

<ul id="goods_menu" class="nav nav-tabs col-md-10 col-md-offset-1">
    @foreach ($types as $key=>$type)
    @if ($key === 0)
	<div id='goods_item1' class='active allitem col-md-2 col-md-offset-2 col-sm-3 col-sm-offset-0  col-xs-3 col-xs-offset-0 text-center'>
		<a href="#tab{{$key}}" data-toggle="tab" >{{$type->name}}</a>
	</div>
	@else
	<div id='goods_item1' class='allitem col-md-2 col-md-offset-0 col-sm-3 col-sm-offset-0  col-xs-3 col-xs-offset-0 text-center'>
		<a href="#tab{{$key}}" data-toggle="tab" >{{$type->name}}</a>
	</div>
    @endif
	@endforeach
    <!--
	<div id='goods_item1' class='allitem col-md-2 col-md-offset-0 col-sm-3 col-sm-offset-0  col-xs-3 col-xs-offset-0 text-center pwl'>
		<a href="#noone" data-toggle="tab">口感</a>
	</div>
    -->
	<div id='goods_item1' class='allitem col-md-2 col-md-offset-0 col-sm-3 col-sm-offset-0  col-xs-3 col-xs-offset-0 text-center'>
		<a href="#taste" data-toggle="tab" class='wwl'>酒品總覽</a>
        <a href="#taste" data-toggle="tab" class='pwl'>總覽</a>
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

            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#pfirstLink">紅酒</a>
                </span>
                <ul id="pfirstLink" class="collapse">
                    @foreach($wines as $key=>$val)
                    <li><a data-ajax="false" href="{{url('detail/')}}/{{$val->id}}"  rel="external">{!!$val->name!!}</a></li>
                    @endforeach
                </ul>
            </li>

            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#psecLink">白酒</a>
                </span>
                <ul id="psecLink" class="collapse">
                    @foreach($wines2 as $key=>$val)
                    <li><a data-ajax="false" href="{{url('detail/')}}/{{$val->id}}"  rel="external">{!!$val->name!!}</a></li>
                    @endforeach
                    
                </ul>
            </li>

           

            <li class="ppanel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#pfiveLink">氣泡酒</a>
                </span>
                <ul id="pfiveLink" class="collapse">
                    @foreach($wines5 as $key=>$val)
                    <li><a data-ajax="false" href="{{url('detail/')}}/{{$val->id}}"  rel="external">{!!$val->name!!}</a></li>
                    @endforeach
                </ul>
            </li>

        </ul>        
         
    </div>

    <div id='detail_menu' class='col-md-3 col-md-offset-1 col-sm-0 col-xs-0'>
        
    
    <div id='detail_body' class="col-md-12 col-sm-12 col-xs-12" style='padding-right: 0px;padding-left: 0px;'>

        <ul class="nav nav-stacked wnav" id="accordion1">
                
            <li class="panel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#firstLink">紅酒</a>
                </span>
                <ul id="firstLink" class="collapse">
                    @foreach($wines as $key=>$wine)
                    <li><a data-ajax="false" href="{{url('detail/')}}/{{$wine->id}}"  rel="external">{!!$wine->name!!}</a></li>
                    @endforeach
                </ul>
            </li>

            <li class="panel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#secLink">白酒</a>
                </span>
                <ul id="secLink" class="collapse">
                    @foreach($wines2 as $key=>$wine)
                    <li><a data-ajax="false" href="{{url('detail/')}}/{{$wine->id}}"  rel="external">{!!$wine->name!!}</a></li>
                    @endforeach
                    
                </ul>
            </li>



            <li class="panel"> 
                <span class='ptile glyphicon glyphicon-chevron-down'><a data-toggle="collapse" data-parent="#accordion1" href="#fiveLink">氣泡酒</a>
                </span>
                <ul id="fiveLink" class="collapse">
                    @foreach($wines5 as $key=>$wine)
                    <li><a data-ajax="false" href="{{url('detail/')}}/{{$wine->id}}"  rel="external">{!!$wine->name!!}</a></li>
                    @endforeach
                </ul>
            </li>
             

        </ul>
    </div>
    <div class="col-md-9"></div>
    </div>

    <div id='detail_pic' class='col-md-7 col-md-offset-0 col-sm-12 col-xs-12' style='padding-left:0px;padding-right: 0px;'>
        @foreach ($overviews as $key => $overview)
        <div class='col-md-12 col-sm-12 col-xs-12 winerybanner'>
          <!--{{$key}}-->
          <img src="/image/winery3/{{$overview['img']}}" height='60px' >
        </div>
        <div class='col-md-12'>
            @foreach ($overview['wine'] as $key => $wine)
            <a href="{{url('detail/')}}/{{$wine->id}}" data-ajax="false">
            <div class='col-md-4 col-sm-6 col-xs-6 text-center'>
            <img src="/image/wine/small/{{$wine->pic}}" height='150px' >
            <div class='col-md-12 text-center newGoodTxt'>
                {!!$wine->name!!}
            </div>
            </div>

            </a>
            @endforeach
        </div>
        @endforeach
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

    $("#goods_item1>a").click(function(){
        
        $("#goods_item1>a").removeClass("myselected");
        $(this).addClass('myselected');
    });
    
});
</script>
@endsection
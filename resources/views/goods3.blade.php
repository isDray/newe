@extends('front_default')

@section('title', '商品')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_goods.css')}}"/>
@endsection

@section('main')
<div id='goods_menu' class='col-md-12 col-sm-12 col-xs-12'>
	<div id='goods_item1' class='allitem col-md-1 col-md-offset-1 col-sm-4 col-sm-offset-0  col-xs-4 col-xs-offset-0'>
		<a href="{{url('/goods/1')}}"  rel="external">紅酒</a>
	</div>
    <div id='goods_item2' class='allitem col-md-1 col-sm-4 col-sm-offset-0 col-xs-4 col-xs-offset-0'>
		<a href="{{url('/goods/2')}}"  rel="external">白酒</a>
	</div>
	<div id='goods_item3'  class='allitem col-md-1 col-sm-4 col-sm-offset-0 col-xs-4 col-xs-offset-0'>
		<a href="{{url('/goods/3')}}"  rel="external">氣泡酒</a>
	</div>	
</div>

<div id='goods_list'  class='col-md-12 col-sm-12 col-xs-12'>
    <div id='glhead'>
    	
    </div>
	<div class='goods_list_item col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='wpic' src="{{ url('/image/goods/sp05.png')}}">
		        <img class='ppic' src="{{ url('/image/goods/sp05.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-0 col-xs-8 col-xs-offset-0'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
FEDERICO FERRERO SORI GALA 
MOSCATO D’ASTI DOCG <br>
"陽光慶典"莫斯卡托微氣泡甜白酒
				<p class='goods_subtxt'>酒體醇厚、結構極佳且後韻悠長</p>
			</div>
		</div>
		<div class='goods_btn_area col-md-1 col-sm-1 col-xs-1'>
		    <div class='goods_btn col-md-12 col-sm-1 col-xs-1'>
		    	<a class='wmore' href="{{url('/detail/3/1')}}" rel="external">
		    		看更多
		    	</a>
		        <a class='pmore glyphicon glyphicon-chevron-right' href="">
		    		
		    	</a>
		    </div>
		</div>
	</div>

	<div class='goods_list_item2 col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='ppic' src="{{ url('/image/goods/sp01.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/sp01.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4 col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
MONTEVERDI
MOSCATO OLTREPO PAVESE DOC <br>
"蒙特羅帝"莫斯卡托微氣泡甜白酒
				<p class='goods_subtxt'>味道濃郁 、 口感滑順且清新</p>
			</div>
		</div>
		<div class='goods_btn_area col-md-1 col-sm-1 col-xs-1'>
		    <div class='goods_btn col-md-12 col-sm-12 col-xs-12'>
		    	<!--<a class='wmore' href="">-->
		    	<a href="{{url('/detail/3/2')}}" rel="external">
		    		看更多
		    	</a>
		        <a class='pmore glyphicon glyphicon-chevron-right' href="">
		    		
		    	</a>
		    </div>
		</div>
	</div>

	<div class='goods_list_item col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='ppic' src="{{ url('/image/goods/sp02.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/sp02.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
MILLESIMATO EXTRA DRY
VINO SPUMANTE BIANCO <br>
"2014年份"特甘型氣泡酒
				<p class='goods_subtxt'>酒體濃郁 、 單寧圓潤且後韻持久</p>
			</div>
		</div>
		<div class='goods_btn_area col-md-1 col-sm-1 col-xs-1'>
		    <div class='goods_btn col-md-12 col-sm-12 col-xs-12'>
		    	<!--<a class='wmore' href="">
		    		看更多
		    	</a>-->
		    	<a href="{{url('/detail/3/3')}}" rel="external">
		    		看更多
		    	</a>
		        <a class='pmore glyphicon glyphicon-chevron-right' href="">
		    		
		    	</a>
		    </div>
		</div>
	</div>

<!-- -->
	<div class='goods_list_item2 col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='ppic' src="{{ url('/image/goods/sp03.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/sp03.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
MARANELLO GOLD
MOSCATO SPUMANTE DOLCE <br>
"瑪拉內洛一號(金)"莫斯卡托甜氣泡酒
				<p class='goods_subtxt'>酒體濃郁 、 單寧圓潤且後韻持久</p>
			</div>
		</div>
		<div class='goods_btn_area col-md-1 col-sm-1 col-xs-1'>
		    <div class='goods_btn col-md-12 col-sm-12 col-xs-12'>
		    	<!--<a class='wmore' href="">
		    		看更多
		    	</a>-->
		    	<a href="{{url('/detail/3/4')}}" rel="external">
		    		看更多
		    	</a>
		        <a class='pmore glyphicon glyphicon-chevron-right' href="">
		    		
		    	</a>
		    </div>
		</div>
	</div>	
<!-- -->
	<div class='goods_list_item col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='ppic' src="{{ url('/image/goods/sp04.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/sp04.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
MARANELLO GOLD
PROSECCO DOC SPUMANTE EXTRADRY <br>
"瑪拉內洛二號(金)"特甘型普錫科氣泡酒
				<p class='goods_subtxt'>酒體濃郁 、 單寧圓潤且後韻持久</p>
			</div>
		</div>
		<div class='goods_btn_area col-md-1 col-sm-1 col-xs-1'>
		    <div class='goods_btn col-md-12 col-sm-12 col-xs-12'>
		    	<!--<a class='wmore' href="">
		    		看更多
		    	</a>-->
		    	<a href="{{url('/detail/3/5')}}" rel="external">
		    		看更多
		    	</a>
		        <a class='pmore glyphicon glyphicon-chevron-right' href="">
		    		
		    	</a>
		    </div>
		</div>
	</div>

</div>
@endsection
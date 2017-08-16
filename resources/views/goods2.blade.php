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
		        <img class='wpic' src="{{ url('/image/goods/white01.png')}}">
		        <img class='ppic' src="{{ url('/image/goods/white01.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-0 col-xs-8 col-xs-offset-0'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
BATTIGIA
CHARDONNAY SALENTO IGT <br>
"薩蘭多海灘"夏多內白酒
				<p class='goods_subtxt'>濃烈的水果芳香，酒體飽滿熱情</p>
			</div>
		</div>
		<div class='goods_btn_area col-md-1 col-sm-1 col-xs-1'>
		    <div class='goods_btn col-md-12 col-sm-1 col-xs-1'>
		    	<a class='wmore' href="{{url('/detail/2/1')}}" rel="external">
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
		        <img class='ppic' src="{{ url('/image/goods/white02.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/white02.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4 col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
STURM
FRIULANO COLLIO DOC <br>
"史騰一號"弗留利白葡萄酒
				<p class='goods_subtxt'>含有些許洋槐、梨子、百里香及杏仁味；口感優雅嫻淑</p>
			</div>
		</div>
		<div class='goods_btn_area col-md-1 col-sm-1 col-xs-1'>
		    <div class='goods_btn col-md-12 col-sm-12 col-xs-12'>
		    	<!--<a class='wmore' href="">-->
		    	<a href="{{url('/detail/2/2')}}" rel="external">
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
		        <img class='ppic' src="{{ url('/image/goods/white03.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/white03.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
STURM
RIBOLLA GIALLA COLLIO DOC <br>
"史騰二號"麗波拉姬亞拉白葡萄酒
				<p class='goods_subtxt'>有野花、青蘋果及檸檬葉等令人舒適的香味；口感年輕、清新且優雅</p>
			</div>
		</div>
		<div class='goods_btn_area col-md-1 col-sm-1 col-xs-1'>
		    <div class='goods_btn col-md-12 col-sm-12 col-xs-12'>
		    	<!--<a class='wmore' href="">
		    		看更多
		    	</a>-->
		    	<a href="{{url('/detail/2/3')}}" rel="external">
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
		        <img class='ppic' src="{{ url('/image/goods/white04.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/white04.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
PINOT BIANCO DOC FRIULI GRAVE <br>
"雷蒙帝一號"白皮諾白葡萄酒
				<p class='goods_subtxt'>成熟熱帶水果香氣、與黃桃甜香； 味道平衡且富有香氣</p>
			</div>
		</div>
		<div class='goods_btn_area col-md-1 col-sm-1 col-xs-1'>
		    <div class='goods_btn col-md-12 col-sm-12 col-xs-12'>
		    	<!--<a class='wmore' href="">
		    		看更多
		    	</a>-->
		    	<a href="{{url('/detail/2/4')}}" rel="external">
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
		        <img class='ppic' src="{{ url('/image/goods/white05.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/white05.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
PINOT GRIGIO DOC FRIULI GRAVE <br>
"雷蒙帝二號"灰皮諾白葡萄酒
				<p class='goods_subtxt'>精緻典雅的花香與白色水果香氣，帶來明顯的清爽口感</p>
			</div>
		</div>
		<div class='goods_btn_area col-md-1 col-sm-1 col-xs-1'>
		    <div class='goods_btn col-md-12 col-sm-12 col-xs-12'>
		    	<!--<a class='wmore' href="">
		    		看更多
		    	</a>-->
		    	<a href="{{url('/detail/2/5')}}" rel="external">
		    		看更多
		    	</a>
		        <a class='pmore glyphicon glyphicon-chevron-right' href="">
		    		
		    	</a>
		    </div>
		</div>
	</div>


</div>
@endsection
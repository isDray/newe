@extends('front_default')

@section('title', '商品')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_goods.css')}}"/>
@endsection

@section('main')
<div id='goods_menu' class='col-md-12 col-sm-12 col-xs-12'>
	<div id='goods_item1' class='allitem col-md-1 col-md-offset-1 col-sm-4 col-sm-offset-0  col-xs-4 col-xs-offset-0'>
		<a href="">紅酒</a>
	</div>
    <div id='goods_item2' class='allitem col-md-1 col-sm-4 col-sm-offset-0 col-xs-4 col-xs-offset-0'>
		<a href="">白酒</a>
	</div>
	<div id='goods_item3'  class='allitem col-md-1 col-sm-4 col-sm-offset-0 col-xs-4 col-xs-offset-0'>
		<a href="">氣泡酒</a>
	</div>	
</div>

<div id='goods_list'  class='col-md-12 col-sm-12 col-xs-12'>
    <div id='glhead'>
    	
    </div>
	<div class='goods_list_item col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='wpic' src="{{ url('/image/goods/wine1_allgoods_webside_grid.png')}}">
		        <img class='ppic' src="{{ url('/image/goods/wine_goods_RWD_phone_grid.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-0 col-xs-8 col-xs-offset-0'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
				FATTORIA DI GRIGNAND POGGIO GUALTERI CHIANIT RUFINA RISERVA DOCG 
                <br/>
				露菲娜山丘 奇安提露菲娜陳釀紅葡萄酒 
				<p class='goods_subtxt'>酒體醇厚、結構極佳且後韻悠長</p>
			</div>
		</div>
		<div class='goods_btn_area col-md-1 col-sm-1 col-xs-1'>
		    <div class='goods_btn col-md-12 col-sm-1 col-xs-1'>
		    	<!--<a class='wmore' href="">
		    		看更多
		    	</a>-->
		    	<a href="{{ url('image/home/comingsoon-01.png') }}" data-lightbox="image-1" data-title="hau_jiou_chen_wong_di" class='wmore'>
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
		        <img class='ppic' src="{{ url('/image/goods/wine2_goods_RWD_phone_grid.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/wine2_allgoods_webside_grid.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4 col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
				SALICARIA TOSCANA IGT 
                <br/>
				千禧花 超級托斯卡尼紅酒
				<p class='goods_subtxt'>味道濃郁 、 口感滑順且清新</p>
			</div>
		</div>
		<div class='goods_btn_area col-md-1 col-sm-1 col-xs-1'>
		    <div class='goods_btn col-md-12 col-sm-12 col-xs-12'>
		    	<!--<a class='wmore' href="">-->
		    	<a href="{{ url('image/home/comingsoon-01.png') }}" data-lightbox="image-1" data-title="hau_jiou_chen_wong_di" class='wmore'>
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
		        <img class='ppic' src="{{ url('/image/goods/wine3_goods_RWD_phone_grid.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/wine3_allgoods_webside_grid.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
				ORFEO NEGROAMARO PUGLIA IGT
                <br/>
				奧菲歐 尼古阿馬羅紅葡萄酒
				<p class='goods_subtxt'>酒體濃郁 、 單寧圓潤且後韻持久</p>
			</div>
		</div>
		<div class='goods_btn_area col-md-1 col-sm-1 col-xs-1'>
		    <div class='goods_btn col-md-12 col-sm-12 col-xs-12'>
		    	<!--<a class='wmore' href="">
		    		看更多
		    	</a>-->
		    	<a href="{{ url('image/home/comingsoon-01.png') }}" data-lightbox="image-1" data-title="hau_jiou_chen_wong_di" class='wmore'>
		    		看更多
		    	</a>
		        <a class='pmore glyphicon glyphicon-chevron-right' href="">
		    		
		    	</a>
		    </div>
		</div>
	</div>
			
</div>
@endsection
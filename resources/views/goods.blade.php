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
		        <img class='wpic' src="{{ url('/image/goods/red01.png')}}">
		        <img class='ppic' src="{{ url('/image/goods/wine_goods_RWD_phone_grid.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-0 col-xs-8 col-xs-offset-0'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
				BRICCO MAIOLICA LANGHE NEBBIOLO DOC
                <br/>
				"瑪若利卡山莊(藍)"朗格內比奧羅紅葡萄酒
				<p class='goods_subtxt'>酒體醇厚、結構極佳且後韻悠長</p>
			</div>
		</div>
		<div class='goods_btn_area col-md-1 col-sm-1 col-xs-1'>
		    <div class='goods_btn col-md-12 col-sm-1 col-xs-1'>
		    	<a class='wmore' href="{{url('/detail/1/1')}}">
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
		        <img class='wpic' src="{{ url('/image/goods/red02.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4 col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
				BRICCO MAIOLICA BARBERA D' ALBA DOC  
                <br/>
				"瑪若利卡山莊(紅)"巴貝拉紅葡萄酒
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
		        <img class='wpic' src="{{ url('/image/goods/red03.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
				FATTORIA DI GRIGNANO "GRIGNANO" CHIANTI RUFINA DOCG
                <br/>
		        "格里納羅"奇安提露菲娜紅葡萄酒
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

<!-- -->
	<div class='goods_list_item2 col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='ppic' src="{{ url('/image/goods/wine3_goods_RWD_phone_grid.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/red04.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
				FATTORIA DI GRIGNANO "POGGIO GUALTIERI" CHIANTI RUFINA RISERVA DOCG
                <br/>
		        "露菲娜山丘"奇安提露菲娜陳釀紅葡萄酒
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
<!-- -->
	<div class='goods_list_item col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='ppic' src="{{ url('/image/goods/wine_goods_RWD_phone_grid.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/red05.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
				FATTORIA DI GRIGNANO "SALICARIA" TOSCANA IGT
                <br/>
		        "千禧花"超級托斯卡尼紅葡萄酒
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
<!-- -->
	<div class='goods_list_item2 col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='ppic' src="{{ url('/image/goods/wine_goods_RWD_phone_grid.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/red06.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
				GALASSO VILLA GALASSO VETICA MONTEPULCIANO D’ABRUZZO DOC
                <br/>
		        "葛拉索山莊"蒙特普爾恰諾紅葡萄酒
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
<!-- -->
	<div class='goods_list_item col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='ppic' src="{{ url('/image/goods/wine_goods_RWD_phone_grid.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/red07.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
				GALASSO CORNO GRANDE PREMIUM MONTEPULCIANO D’ABRUZZO DOC
                <br/>
		        "大角山羊"蒙特普爾恰諾紅葡萄酒
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
<!-- -->
	<div class='goods_list_item2 col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='ppic' src="{{ url('/image/goods/wine_goods_RWD_phone_grid.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/red08.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
				GALASSO CORNO GRANDE RISERVA MONTEPULCIANO D’ABRUZZO DOC
                <br/>
		        "大角山羊"陳釀蒙特普爾恰諾紅葡萄酒
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
<!-- -->
	<div class='goods_list_item col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='ppic' src="{{ url('/image/goods/wine_goods_RWD_phone_grid.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/red09.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
				NEGROAMARO PUGLIA IGT
                <br/>
		        "魅紫"尼古阿馬羅紅葡萄酒
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
<!-- -->
	<div class='goods_list_item2 col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='ppic' src="{{ url('/image/goods/wine_goods_RWD_phone_grid.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/red10.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
				!!!PRIMITIVO SALENTO IGP
                <br/>
		        "曜黑"普里米蒂沃紅葡萄酒
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
<!-- -->
	<div class='goods_list_item col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='ppic' src="{{ url('/image/goods/wine_goods_RWD_phone_grid.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/red11.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
				PASSO DEL CARDINALE PRIMITIVO DI MANDURIA DOP
                <br/>
		        "紅衣主教"普里米蒂沃紅葡萄酒
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
<!-- -->
	<div class='goods_list_item2 col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='ppic' src="{{ url('/image/goods/wine_goods_RWD_phone_grid.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/red12.png')}}">
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
		        "奧菲歐"尼古阿馬羅紅葡萄酒
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
<!-- -->
	<div class='goods_list_item col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='ppic' src="{{ url('/image/goods/wine_goods_RWD_phone_grid.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/red13.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
				FIORE DI VIGNA PRIMITIVO SALENTO IGT
                <br/>
		        "葡萄花精靈"普里米蒂沃紅葡萄酒
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
<!-- -->
	<div class='goods_list_item2 col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='ppic' src="{{ url('/image/goods/wine_goods_RWD_phone_grid.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/red14.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
				NERIMATTI RISERVA SALICE SALENTINO DOC
                <br/>
		        "内瑞馬提"薩利切薩倫帝諾陳釀紅葡萄酒
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
<!-- -->
	<div class='goods_list_item col-md-12 col-sm-12 col-xs-12'>
		<div class='winpic col-md-3 col-sm-3 col-xs-3 test'>
		    <div id='gdp1' class='goodspic'>
		        <img class='ppic' src="{{ url('/image/goods/wine_goods_RWD_phone_grid.png')}}">
		        <img class='wpic' src="{{ url('/image/goods/red15.png')}}">
		    </div>
		</div>
		<div class='goods_mdline_area col-md-2 col-sm-0 col-xs-0'>
			<div class='goods_mdline col-md-12 col-sm-0 col-xs-0'>
				
			</div>
		</div>
		<div class='goods_txt_area col-md-4  col-md-offset-1 col-sm-8 col-xs-8'>
			<div class='goods_txt col-md-12 col-sm-12 col-xs-12'>
				TACCOROSSO NEGROAMARO PUGLIA IGP 
                <br/>
		        "塔克羅素"尼古阿馬羅紅葡萄酒
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
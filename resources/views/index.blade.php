@extends('front_default')

@section('title', '首頁')

@section('home_banner')
<div id='home_banner' class='hbslider col-md-12 col-md-offset-0 col-sm-12 col-xs-12' >
  <div></div>
</div>
@endsection

@section('home_ifo')
<div id='home_ifo_area' class='col-md-12 col-sm-12 col-xs-12' >
    <div id='minfo' class='col-md-0 col-sm-12 col-xs-12'>
        
    </div>
    <div id='minfotxt' class='col-md-0 col-sm-12 col-xs-12'>
        <div class='col-md-0 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1'>
          放眼未來，我們將持續引薦當地高品質佳釀予國人，藉以推廣葡萄酒品飲文化與提升飲食品質 為消費者提供更美好的生活體驗！
        </div>
    </div>

    <div id='home_slider' class='col-md-5 col-sm-12 col-xs-12'>

        <div class="slider_class col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
           <div>
               <div class='slider_pic'>
               	
               </div>
               <div class='slider_txt'>
               <p>蒙特羅地1</p>
               <p>莫斯卡托微氣泡甜白酒</p>
               <div>
               了解更多	
               </div>
               </div>
           </div>
           <div>
               <div class='slider_pic2'>
               	
               </div>
               <div class='slider_txt'>
               <p>蒙特羅地2</p>
               <p>莫斯卡托微氣泡甜白酒</p>
               <div>
               了解更多	
               </div>
               </div>
           </div>
            <div>
               <div class='slider_pic3'>
              
               </div>
               <div class='slider_txt'>
               <p>蒙特羅地3</p>
               <p>莫斯卡托微氣泡甜白酒</p>
               <div>
               了解更多	
               </div>
               </div>
           </div>
        </div>


    </div>

    <div id='mnews' class='col-md-0 col-sm-12 col-xs-12'>
    <img src="{{ url('image/home/newpicwe_hp_RWD_phone_grid.jpg') }}" width='100%'>
    </div>

    <!-- 手機版使用 -->
    <div id='mnewstxt' class='col-md-0 col-sm-12 col-xs-12'>
        <div>
          Wine & Gourmet Taipei (WGT)
          國內唯一整合產業供應鏈的專業級酒品交易會。展會中匯集眾多國內外知名酒品代理商、國內外酒莊、專業酒櫃和各國頂級飲酒器皿，更有多項特色佐酒美食共同展出，同時結合專業產業論壇、重量級大師講座課程與豐富活動等，是台灣所有酒品相關廠商、大量採購買主、及酒品專業人士薈萃一堂的大型採購平台。
        </div>
    </div>

	  <div id='ifo_pic_area' class='col-md-7 col-md-offset-0 col-sm-12 col-xs-12'>
		    <div id='ifo_pic' class='text-center'>
			  <p  class='text-center'>
				2017 台北精緻酒展
			  </p>
        <p  class='text-center'>
        8/25 - 8/28 台北世貿一館 
        </p>

        <a href="{{url('/newsd/1')}}">
          <div id='hnmore'>
            看更多 >
          </div>
        </a> 
		    </div>
	  </div>

	<div id='partner' class='col-md-10 col-md-offset-1 col-sm-12 col-xs-12'>
		<!--
		<div class='col-md-1 col-md-offset-0 col-sm-12 col-xs-12 partner_pic'>
			
		</div>

		<div class='col-md-1 col-md-offset-1 col-sm-12 col-xs-12 partner_pic'>
			
		</div>
		<div class='col-md-1 col-md-offset-1 col-sm-12 col-xs-12 partner_pic'>
			
		</div>-->

		<div  class='partner_slide col-md-12'>
            <div class='partner_item'><img src="{{ url('image/home/partner-01.png')}}"></div>
            <div class='partner_item'><img src="{{ url('image/home/partner-01.png')}}"></div>
            <div class='partner_item'><img src="{{ url('image/home/partner-01.png')}}"></div>
            <div class='partner_item'><img src="{{ url('image/home/partner-01.png')}}"></div>
            <div class='partner_item'><img src="{{ url('image/home/partner-01.png')}}"></div>
            <div class='partner_item'><img src="{{ url('image/home/partner-01.png')}}"></div>
        </div>		
	</div>
</div>
@endsection
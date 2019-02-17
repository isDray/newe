@extends('front_default')

@section('title', '首頁')

@section('home_banner')
<div id='home_banner' class='hbslider col-md-12 col-md-offset-0 col-sm-12 col-xs-12' >
<div></div>
</div>
@endsection

@section('home_ifo')
<style type="text/css">
.topmenu a{
  color: white!important;
}
#logo{
  background-image: url('../image/home/header_logo.png')!important;
}
#menufb{
    background-image: url('../image/home/fb_icon.png')!important;
}
.topmenu a:hover:after{
    content: '';
    display: block;
    width:100%;
    height: 2px;
    border-bottom: 4px solid white!important;
}
</style>
<div id='home_ifo_area' class='col-md-12 col-sm-12 col-xs-12' >
    <div id='minfo' class='col-md-0 col-sm-12 col-xs-12'></div>
    
    <div id='minfotxt' class='col-md-0 col-sm-12 col-xs-12'>
        <div class='col-md-0 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1'>
          放眼未來，我們將持續引薦當地高品質佳釀予國人，藉以推廣葡萄酒品飲文化與提升飲食品質 為消費者提供更美好的生活體驗！
        </div>
    </div>

    <div id='home_slider' class='col-md-5 col-sm-12 col-xs-12'>

        <div class="slider_class col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">

           @foreach ($wines as $wine)
           <div>
               <div class='slider_pic text-center'>
                  <img src="{{ url('image/wine') }}/mid/{{$wine->pic}}">
               </div>
               <div class='slider_txt'>
                   
                   <p>{!! $wine->name !!}</p>
                   
                   <a href="{{url('/detail/')}}/{{$wine->id}}">
                   <div>
                   了解更多 
                   </div>
                   </a>
               </div>
           </div>           
           @endforeach

        </div>


    </div>

    <div id='mnews' class='col-md-0 col-sm-12 col-xs-12'>
    <img src="{{ url('image/home/newpicwe_hp_RWD_phone_grid.jpg') }}" width='100%'>
    </div>

    <!-- 手機版使用 -->
    <div id='mnewstxt' class='col-md-0 col-sm-12 col-xs-12'>
        <div>
          {{$news[0]->des}}
        </div>
    </div>

	  <div id='ifo_pic_area' class='col-md-7 col-md-offset-0 col-sm-12 col-xs-12'>
		    <div id='ifo_pic' class='text-center'>
			      <p  class='text-center'>
				    {{$news[0]->name}}
			      </p>
            <p  class='text-center'>
            {{$news[0]->address}}
            </p>

        <a href="{{url('/newsd/')}}/{{$news[0]->id}}">
          <div id='hnmore' style='color:rgb(117, 39, 97);'>
            看更多 >
          </div>
        </a> 
		    </div>
	  </div>
    

    

</div>
@endsection

@section('main')
    <div id='partner' class='col-md-10 col-md-offset-1 col-sm-12 col-xs-12'>
    <!--
    <div class='col-md-1 col-md-offset-0 col-sm-12 col-xs-12 partner_pic'>
    </div>
    <div class='col-md-1 col-md-offset-1 col-sm-12 col-xs-12 partner_pic'>
    </div>
    <div class='col-md-1 col-md-offset-1 col-sm-12 col-xs-12 partner_pic'>
    </div>-->
        <div  class='partner_slide col-md-12'>
            <div class='partner_item'><a  target="_blank" href="https://www.facebook.com/kanpaiclassic/?fref=ts" rel="external"><img src="{{ url('image/home/logo1.jpg')}}"></a></div>
            <div class='partner_item'><a target="_blank" href="https://www.facebook.com/FACILE.kitchen/" rel="external"><img src="{{ url('image/home/logo2.jpg')}}"></a></div>
            <div class='partner_item'><a  target="_blank" href="http://www.lovefresh.com.tw/" rel="external"><img src="{{ url('image/home/logo3.jpg')}}"></a></div>
            <div class='partner_item'><a  target="_blank" href="https://www.facebook.com/yuan.cafe.17/?fref=ts" rel="external"><img src="{{ url('image/home/logo04.jpg')}}"></a></div>
            <div class='partner_item'><a  target="_blank" href="https://www.facebook.com/au-petit-cochon-哈古小館-200397289984548/" rel="external"><img src="{{ url('image/home/logo05.jpg')}}"></a></div>
            <div class='partner_item'><a target="_blank" href="https://www.isgoodtime.com.tw" rel="external"><img src="{{ url('image/home/partner-01.png')}}"></a></div>
            <div class='partner_item'><a target="_blank" href="https://www.facebook.com/congratscafe.tw/" rel="external"><img src="{{ url('image/home/congratslogo.png')}}"></a></div>
          
          
        </div>
        
    </div>
@endsection
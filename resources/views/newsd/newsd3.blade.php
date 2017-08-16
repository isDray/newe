@extends('front_default')

@section('title', '最新消息')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_newsd.css')}}"/>

@endsection

@section('main')
<div id='newsd_area' class='col-md-12 col-sm-12 col-xs-12'>  
    <div id='topimage' class='col-md-12 col-sm-12 col-xs-12' >
        <img src="{{url('image/news/bn7.jpg')}}" width="100%">
    </div>

    <div id='smpic' class='col-md-3 col-md-offset-2 col-sm-5 col-sm-offset-0 col-xs-5 col-xs-offset-0 '>
        <img src="{{url('image/news/sbn07.jpg')}}" width="100%">
    </div>
    
    <div id='dtopifo' class='col-md-4 col-md-offset-1 col-sm-7 col-sm-offset-0 col-xs-7 col-xs-offset-0 text-center'>
        
        <div id='dtitle' class='col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center'>
        2017 台中品酒嘉年華
        </div>
        
        <div id='difo' class='col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center'>
        時間：7/7(五)-10(一) 10:00-18:00 <br>
地點：大台中國際會展中心(台中市烏日區高鐵五路) <br>
攤位號碼：216-1

        </div>

    </div>

    <div id='ddes' class='col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left'>
      【台中國際酒展】為「台北國際酒展」中部區域性巡迴展，歷經五屆的耕耘，逐漸建立台中品酒生活化的觀念，引領大量終端、新興客群加入，提升中部市場用酒需求。2016年全展區共吸引35,396人次參觀，為台中全年度唯一專業酒展。台中國際酒展期望整合產業力量，提供有價值的展覽內容、舉辦免費品酒教室，使中部市場獲得更多酒類資源，以擴大品酒生活化的觀念。

緯昶國貿特地將在台北酒展中相當受歡迎的Moscato葡萄酒霜淇淋原封不動搬到台中酒展來，讓中部的來賓們可以享用到這美味的夏季冰品！同時，也期待台中愛酒人士與相關餐廳通路業者可以藉此認識我們，分享我們精選來自義大利的美酒佳釀〜


    </div>


</div>
@endsection
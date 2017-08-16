@extends('front_default')

@section('title', '最新消息')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_newsd.css')}}"/>

@endsection

@section('main')
<div id='newsd_area' class='col-md-12 col-sm-12 col-xs-12'>  
    <div id='topimage' class='col-md-12 col-sm-12 col-xs-12' >
        <img src="{{url('image/news/bn11.jpg')}}" width="100%">
    </div>

    <div id='smpic' class='col-md-3 col-md-offset-2 col-sm-5 col-sm-offset-0 col-xs-5 col-xs-offset-0 '>
        <img src="{{url('image/news/sbn11.jpg')}}" width="100%">
    </div>
    
    <div id='dtopifo' class='col-md-4 col-md-offset-1 col-sm-7 col-sm-offset-0 col-xs-7 col-xs-offset-0 text-center'>
        
        <div id='dtitle' class='col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center'>
        2017台北國際酒展
        </div>
        
        <div id='difo' class='col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center'>
        時間：11/17(五)-11/20(一) 10:00-18:00 <br>
地點：台北南港展覽館 (台北市南港區經貿二路1號)

        </div>

    </div>

    <div id='ddes' class='col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left'>
      【台北國際酒展】身為台灣每年年底最大綜合酒類酒展，其間經歷了14屆的成長與轉型，深入經營B2B和B2C商業模式，對國內酒類產業發展、與市場規模擴大有相當的貢獻。2016年參展廠商共有142家，進場參觀人數高達47,605人，官方網站流量達203,584人次，主辦單位以業界最大量的大眾化宣傳和密集的社群網路分享平台，吸引民眾入場參觀，刺激需求。本展囊括葡萄酒、威士忌、精釀啤酒、清酒、水果酒、氣泡酒、特色酒莊、飲酒器具等多種酒款與酒器，引進國外最新資訊，多元且深入展示，同時滿足飲初學者與資深品酒迷，打造飲酒夢幻新國度。

    </div>


</div>
@endsection
@extends('front_default')

@section('title', '最新消息')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_newsd.css')}}"/>

@endsection

@section('main')
<div id='newsd_area' class='col-md-12 col-sm-12 col-xs-12'>  
    <div id='topimage' class='col-md-12 col-sm-12 col-xs-12' >
        <img src="{{url('image/news/bn08.jpg')}}" width="100%">
    </div>

    <div id='smpic' class='col-md-3 col-md-offset-2 col-sm-5 col-sm-offset-0 col-xs-5 col-xs-offset-0 '>
        <img src="{{url('image/news/sbn08.jpg')}}" width="100%">
    </div>
    
    <div id='dtopifo' class='col-md-4 col-md-offset-1 col-sm-7 col-sm-offset-0 col-xs-7 col-xs-offset-0 text-center'>
        
        <div id='dtitle' class='col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center'>
        2017 台北精緻酒展
        </div>
        
        <div id='difo' class='col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center'>
        時間：08/25(五) ~ 08/28(一) 10:00~18:00 <br>
        地點：台北世貿一館（台北市信義路五段5號） <br>
        攤位號碼：224、226
        </div>

    </div>

    <div id='ddes' class='col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left'>
      【台北國際精緻酒展】於2016年首次舉辦，成功的展覽造成台灣酒業界廣大的迴響，因此，今年主辦單位與「中華民國酒類商業同業公會全國聯合會」與「新北市酒類商業同業公會」再次攜手合作，舉辦今年度酒展。本展匯集了國內外知名酒類代理商、國內外酒莊、酒廠、收藏酒、酒業相關服務、品飲器具及保存設備相關業者，展出的酒類橫跨威士忌、紅酒、清酒、啤酒、基酒、利口酒…等，同時滿足各種酒精飲料消費需求。
  身為暑假期間內最大的酒展，四天展期活動相當豐富，有各式品酒及葡萄酒知識推廣演講、大師系列講座、邀請國際認證的專業講師、侍酒師、業界資深人士，針對相關主題進行講座分享及研討，另外也安排國內外酒莊於展覽期間，以品飲試飲活動發表新品、推薦人氣及經典酒款，提供業界人士交流並舉辦講座帶領一般消費者對酒文化一窺究竟，不僅是一場盛大的採購平台更是一場文化饗宴。

  緯昶國貿為即將到來的中秋節，於展場中準備了三款精緻葡萄酒禮盒「金典閃曜葡萄酒禮盒」、「金典雙鑽葡萄酒禮盒」及「精選典藏葡萄酒禮盒」推薦予客戶們；此外，我們也為本展來賓準備了精彩豐富的抽獎活動：只要在現場購買葡萄酒一箱(六瓶)，就可參加「美酒任你配，滿箱抽回饋」活動！本活動共有高達22種的獎品品項：從現金折價、到各式葡萄酒與酒器禮品相送外，現場更有機會抽到最高五折的折扣優惠！

    </div>


</div>
@endsection
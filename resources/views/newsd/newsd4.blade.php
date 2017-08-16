@extends('front_default')

@section('title', '最新消息')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_newsd.css')}}"/>

@endsection

@section('main')
<div id='newsd_area' class='col-md-12 col-sm-12 col-xs-12'>  
    <div id='topimage' class='col-md-12 col-sm-12 col-xs-12' >
        <img src="{{url('image/news/bn06.jpg')}}" width="100%">
    </div>

    <div id='smpic' class='col-md-3 col-md-offset-2 col-sm-5 col-sm-offset-0 col-xs-5 col-xs-offset-0 '>
        <img src="{{url('image/news/sbn06.jpg')}}" width="100%">
    </div>
    
    <div id='dtopifo' class='col-md-4 col-md-offset-1 col-sm-7 col-sm-offset-0 col-xs-7 col-xs-offset-0 text-center'>
        
        <div id='dtitle' class='col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center'>
        2017台北葡萄酒展
        </div>
        
        <div id='difo' class='col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center'>
        時間：7/20(四)-7/22(六) 11:00-19:00 <br>
        地點：台北世貿三館 (台北市松壽路6號) <br>
        攤位號碼：C10、C12

        </div>

    </div>

    <div id='ddes' class='col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left'>
      【台北葡萄酒展】身為國內最悠久的葡萄酒酒展覽，也是最早強調整合產業供應鏈的專業級酒品交易會。展會中匯集眾多國內外知名酒品代理商、國內外酒莊、專業酒櫃和各國頂級飲酒器皿，更有多項特色佐酒美食共同展出，同時結合專業產業論壇、重量級大師講座課程與豐富活動等，是台灣所有酒品相關廠商、大量採購買主、及酒品專業人士薈萃一堂的大型採購平台。

  緯昶國貿為促進展內美食美酒廠商互動交流，提升來賓感官享受，特別推出「你吃肉我請酒」活動！我們與勞瑞斯牛肋排餐廳(Lawry’s Taipei)、玫瑰廚房(Rightrose Kitchen)及萬寶客(Wine Pork)等美食攤位合作，凡是展覽期間於美食區指定攤位消費，就可憑發票至緯昶國貿攤位：
1. 指定義大利餐酒(紅酒、白酒&氣泡酒)無限制享用；
2. 購買任何酒款，一份餐點即可享有單瓶一百元之折扣(每瓶最高限抵一百元)；
3. 上述折扣還可搭配其他優惠活動。
----------------------------------------------------------------------------------------------------------------
指定餐酒單：
1. 紅酒
GALASSO VILLA GALASSO VETICA MONTEPULCIANO D’ABRUZZO DOC
義大利葛拉索酒莊/"葛拉索山莊"蒙特普爾恰諾紅葡萄酒
2. 白酒
STURM FRIULANO COLLIO DOC"
義大利史騰酒莊/"史騰一號"弗留利白葡萄酒
3. 氣泡酒
MILLESIMATO EXTRA DRY VINO SPUMANTE BIANCO
義大利列魯格酒莊/"2014年份"特甘型氣泡酒


    </div>


</div>
@endsection
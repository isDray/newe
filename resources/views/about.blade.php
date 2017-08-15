@extends('front_default')

@section('title', '關於我們')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_about.css')}}"/>
@endsection

@section('main')
<div id='about_banner' class='col-md-12 col-sm-12 col-xs-12'>
    <div id='banner_txt' class='col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1'>
        放眼未來，我們將持續引薦當地高品質佳釀予國人，藉以推廣葡萄酒品飲文化與提升飲食品質
        為消費者提供更美好的生活體驗！
    </div>
</div>

<div id='about_txt_area' class='col-md-12 col-sm-12 col-xs-12' >
	<div id='about_txt' class='col-md-7 col-md-offset-4 col-sm-12 col-xs-12'>
緯昶國際貿易有限公司為一專業義大利葡萄酒進口商，目前引進該國Piemonte(皮埃蒙特)、Veneto(威尼托)、Friuli-Venezia Giulia(弗留利-威尼斯朱利亞)、Toscana(托斯卡納)、Abruzzo(阿布魯佐)及Puglia(普利亞)……等產酒區多種代表性葡萄酒款以供台灣消費者饗宴。義大利身為舊世界最古老的葡萄釀酒國家之一，多樣複雜的葡萄原生品種與氣候地質條件所醞釀出的百種酒款，讓全世界萄萄酒愛好者擁有更多的口味選擇與味覺新享受。


	</div>
</div>

<div id='about_four_area' class='col-md-12 col-sm-12 col-xs-12' >
    <div id='four_1' class='col-md-6 col-sm-12 col-xs-12'>
    	<div id='four_1title' class='col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1'>
            我們的堅持
        </div>
        <div id='four_1txt' class='col-md-11 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-6 col-xs-offset-1'>
            義大利，這位處地中海亞平寧半島的古老國家，是西方文明的搖籃，也是世界上最早種植葡萄並進行釀酒的地區之一，其歷史可追朔至羅馬帝國建立前，伊特魯里亞人、希臘人與迦太基人各自在中義托斯卡納、南義普利亞及西西里島開始釀酒，距今已超過2800年之久。直至2016年底，義大利葡萄酒產量以50.9億公升持續超越法國，世界排名第一。
        </div>        
    </div>
    <!--
    <div id='four_2' class='col-md-6 col-sm-0 col-xs-0'>
    	<div class='col-md-6'>
    		
    	</div>
    	<div class='col-md-6'>
    		
    	</div>
    	<div class='col-md-6'>
    		
    	</div>
        <div class='col-md-6'>
    		
    	</div>
    </div>-->
    <div id='four_3' class='col-md-6 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0'>
    	<div class='col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1'>
            義大利半島呈現狹長靴型，北起阿爾卑斯山脈，南至西西里島，南北緯度橫跨十度，其漫長的海岸線，與廣泛的高山和丘陵地，造成當地氣候的多樣性：北部主要是大陸型氣候、其他大部分地區為地中海型氣候；而土質的組成也反映出其複雜性：有沖積土、火山岩土壤、與石灰岩黏土混合型土壤。如此多樣的地理環境與氣候，讓義大利成為葡萄繁衍的天堂，其品種繁多，是約一千種歐洲釀酒葡萄(Vitis Vinifera)的故鄉，所釀出的葡萄酒風味殊異、性格獨特，所以古代希臘人稱義大利為“Oenotria”，意思是“葡萄酒之鄉”。根據義大利官方的調查，義大利境內總共種植440種不同的葡萄品種，若考慮同種異名及其他無性變異系(Clones)，則估計數量約有1,500種以上。

            目前義大利可依其行政區劃分成20個產酒區，擁有超過一萬家以上的酒莊、以及二十八萬種以上的酒款。就義大利分級制度分類來說，至2016年底，共有74種DOCG (Denominazioni di Origine Controllata e Garantita)保證法定產區酒款、334種DOC (Denominazioni di Origine Controllata，法定產區酒款，與118種IGT(Indicazione geografica tipica)地區標誌酒款。
    	</div>
    </div>
    <div id='four_4' class='col-md-12 col-sm-12 col-xs-12'>
        <div id='four_4title' class='col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1'>
            未來展望
        </div>
        <div id='four_txt' class='col-md-9 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1'>
            我們在全球尋找具有市場潛力之商品，透過縝密的行銷企劃
與業務執行，開發新興市場、深耕現有市場，讓產品透過實
體與虛擬通路進行全球行銷，促進買賣各方之雙邊與多邊貿
易，達成貨暢其流、互通有無之目的。

換句話說，在這貿易新時代中，我們以媒合市場之需求、開拓
全球市場通路及執行品牌專業行銷為職志，開創事業新局面!
        </div>
    </div>        
</div>
@endsection
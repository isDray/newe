@extends('front_default')

@section('title', '聯絡我們')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_news.css')}}"/>
<script type="text/javascript">
$('.carousel').carousel({
  interval: 3000
})
</script>
@endsection

@section('main')
  <div id='news_area' class='col-md-12 col-sm-12 col-xs-12'>
    
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="{{ url('image/news/bn06.jpg') }}" width="100%">

    </div>
    <div class="item">
      <img src="{{ url('image/news/bn7.jpg') }}" width="100%">
    </div>
    <div class="item">
      <img src="{{ url('image/news/bn08.jpg') }}" width="100%">
    </div>
    <div class="item">
      <img src="{{ url('image/news/bn11.jpg') }}" width="100%">
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    
    <div class='news_box' class='col-md-12 col-sm-12 col-xs-12'>


      
      <div class='time_line col-md-1 col-sm-0 col-xs-0'>
        
      </div>
      <div class='time_txt col-md-1 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0'>
      <p>2017.8</p>
      </div>
      <div class='news_img col-md-3 col-md-offset-0 col-sm-4  col-xs-4'>
          <img class='nimgw' src="{{url('image/news/sbn11.jpg')}}" width="100%" height="100%">
          <img class='nimgp' src="{{url('image/news/sbn11.jpg')}}" width="100%" height="100%">
      </div>
      <div class='news_text col-md-5 col-md-offset-0 col-sm-8 col-xs-8'>
          <div class='text_box'>
            時間：11/17(五)-11/20(一) 10:00-18:00
            <br/>   
            地點：台北南港展覽館 (台北市南港區經貿二路1號)

          </div>

          <a href="{{url('newsd/1')}}">
          <p class='more'>more</p>
          </a>
      </div>
    </div>

    <div class='news_box' class='col-md-12 col-sm-12 col-xs-12'>
      <div class='time_line col-md-1 col-sm-0 col-xs-0'>
        
      </div>
      <div class='time_txt col-md-1 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0'>
      <p>2017.8</p>
      </div>
      <div class='news_img col-md-3 col-md-offset-0 col-sm-4  col-xs-4'>
          <img class='nimgw' src="{{url('image/news/sbn08.jpg')}}" width="100%" height="100%">
          <img class='nimgp' src="{{url('image/news/sbn08.jpg')}}" width="100%" height="100%">

      </div>
      <div class='news_text col-md-5 col-md-offset-0 col-sm-8 col-xs-8'>
          <div class='text_box'>
            時間：08/25(五) ~ 08/28(一) 10:00~18:00 <br>
            地點：台北世貿一館（台北市信義路五段5號） <br>  
            攤位號碼：224、226 
          </div>
          <a href="{{url('newsd/2')}}">
          <p class='more'>more</p>
          </a>
      </div>
    </div>    

    <div class='news_box' class='col-md-12 col-sm-12 col-xs-12'>
      <div class='time_line col-md-1 col-sm-0 col-xs-0'>
        
      </div>
      <div class='time_txt col-md-1 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0'>
      <p>2017.8</p>
      </div>
      <div class='news_img col-md-3 col-md-offset-0 col-sm-4  col-xs-4'>
          <img class='nimgw' src="{{url('image/news/sbn07.jpg')}}" width="100%" height="100%">
          <img class='nimgp' src="{{url('image/news/sbn07.jpg')}}" width="100%" height="100%">
      </div>
      <div class='news_text col-md-5 col-md-offset-0 col-sm-8 col-xs-8'>
          <div class='text_box'>
            時間：7/7(五)-10(一) 10:00-18:00 <br>
            地點：大台中國際會展中心(台中市烏日區高鐵五路) <br>
            攤位號碼：216-1

          </div>
          <a href="{{url('newsd/3')}}">
          <p class='more'>more</p>
          </a>
      </div>
    </div>

    <div class='news_box' class='col-md-12 col-sm-12 col-xs-12'>
      <div class='time_line col-md-1 col-sm-0 col-xs-0'>
        
      </div>
      <div class='time_txt col-md-1 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0'>
      <p>2017.8</p>
      </div>
      <div class='news_img col-md-3 col-md-offset-0 col-sm-4  col-xs-4'>
          <img class='nimgw' src="{{url('image/news/sbn06.jpg')}}" width="100%" height="100%">
          <img class='nimgp' src="{{url('image/news/sbn06.jpg')}}" width="100%" height="100%">
      </div>
      <div class='news_text col-md-5 col-md-offset-0 col-sm-8 col-xs-8'>
          <div class='text_box'>
            時間：7/20(四)-7/22(六) 11:00-19:00  <br>
            地點：台北世貿三館 (台北市松壽路6號) <br>
            攤位號碼：C10、C12

          </div>
          <a href="{{url('newsd/4')}}">
          <p class='more'>more</p>
          </a>
      </div>
    </div>      
    



</div>
@endsection
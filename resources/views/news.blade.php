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

<div class='row'>
<div id="carousel-example-generic" class="carousel slide col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" data-ride="carousel" >
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    @foreach($news as $key=>$val)
        @if($key == 0)
        <div class="item active">
        @else
        <div class="item">
        @endif
         <img src="{{ url('image/news/banner/')}}/{{$val->banner}}" width="100%">
        </div>
    @endforeach

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
<div class='col-md-1 col-sm-1 col-xs-1'>
  
</div>
</div>
    @foreach($news as $key=>$val)
    <div class='news_box' class='col-md-12 col-sm-12 col-xs-12'>
      <div class='time_line col-md-1 col-sm-0 col-xs-0'>
        
      </div>
      <div class='time_txt col-md-1 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0'>
      <p>{{date('Y.m', strtotime($val->created_at))}}
      </p>
      </div>
      <div class='news_img col-md-3 col-md-offset-0 col-sm-4  col-xs-4'>
          <img class='nimgw' src="{{url('image/news/pic/')}}/{{$val->pic}}" width="100%" height="100%">
          <img class='nimgp' src="{{url('image/news/pic/')}}/{{$val->pic}}" width="100%" height="100%">
      </div>
      <div class='news_text col-md-5 col-md-offset-0 col-sm-8 col-xs-8'>
          <div class='text_box'>
            {{$val->name}}
            <br>
            時間：{{$val->actime}}
            <br/>   
            地點：{{$val->address}}
            <br/>
            @if($val->stalls !='')
            攤位 : {{$val->stalls}}
            @endif
          </div>

          <a href="{{url('newsd/')}}/{{$val->id}}">
          <p class='more'>more</p>
          </a>
      </div>
    </div>
     @endforeach
    <!--
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
            2017 台北精緻酒展 <br>
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
            2017 台中品酒嘉年華 <br>
            時間：7/7(五) ~ 10(一) 10:00~18:00 <br>
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
            2017台北葡萄酒展 <br>
            時間：7/20(四) ~ 7/22(六) 11:00~19:00  <br>
            地點：台北世貿三館 (台北市松壽路6號) <br>
            攤位號碼：C10、C12

          </div>
          <a href="{{url('newsd/4')}}">
          <p class='more'>more</p>
          </a>
      </div>
    </div>     --> 
    



</div>
@endsection
@extends('front_default')

@section('title', '最新消息')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_newsd.css')}}"/>

@endsection

@section('main')
<div id='newsd_area' class='col-md-12 col-sm-12 col-xs-12'>  
    <div id='topimage' class='col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1' >
        <img src="{{url('image/news/banner')}}/{{$news[0]->banner}}" width="100%">
    </div>

    <div id='smpic' class='col-md-3 col-md-offset-2 col-sm-5 col-sm-offset-0 col-xs-5 col-xs-offset-0 '>
        <img src="{{url('image/news/pic')}}/{{$news[0]->pic}}" width="100%">
    </div>
    
    <div id='dtopifo' class='col-md-4 col-md-offset-1 col-sm-7 col-sm-offset-0 col-xs-7 col-xs-offset-0 text-center'>
        
        <div id='dtitle' class='col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center'>
        2017 台北精緻酒展
        {{$news[0]->name}}
        </div>
        
        <div id='difo' class='col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center'>
        時間：{{$news[0]->actime}}<br>
        地點：{{$news[0]->address}} <br>
        @if($news[0]->stalls != '')
        攤位號碼：{{$news[0]->stalls}}
        @endif
        
        </div>

    </div>

    <div id='ddes' class='col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left'>
    {{$news[0]->des}}
    </div>


</div>
@endsection
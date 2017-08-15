@extends('front_default')

@section('title', '註冊會員')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_signupsuccess.css')}}"/>
@endsection

@section('main')
<div id='signup_success' class='col-md-12 col-sm-12 col-xs-12'>
    <div id='success_box' class='col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1'>
        <div id='login_area'  class='col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4  col-xs-4 col-xs-offset-4 text-center'>
            <div id='login_pic'>
                
            </div>
            <div id='login_txt'>
                <a href="">立即登入</a>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('front_default')

@section('title', '註冊會員')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_signup.css')}}"/>
@endsection

@section('main')

<div id='signup_area' class='col-md-12 col-sm-12 col-xs-12' >
    <div id='signup_form_area' class='col-md-10 col-md-offset-1 ccol-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1'>
        <div id='signup_form' class='col-md-6 col-md-offset-5 ccol-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1'>
        
        <form>
            <div class="form-group">
            <label for="exampleInputaccount">會員帳號</label>
            <input type="text" class="form-control" id="exampleInputaccount" placeholder="">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">密碼</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">確認密碼</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
            </div>

            <div class="form-group">
            <label class="radio control-label">性別</label>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 男
            </label>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 女
            </label>
            </div>

            <div class="form-group">
            <label for="exampleInputBirth">生日</label>
            <input type="date" class="form-control" id="exampleInputBirth" placeholder="">
            </div>

            <div class="form-group">
            <label for="exampleInputName">姓名</label>
            <input type="text" class="form-control" id="exampleInputName" placeholder="">
            </div>

            <div class="form-group">
            <label for="exampleInputemail">Email</label>
            <input type="email" class="form-control" id="exampleInputemail" placeholder="">
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" value="">
                我已詳細閱讀並且同意會員條款同意書
              </label>
            </div>

            <div class="form-group">
            <div class="col-md-4 col-md-offset-4 ccol-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4">  
                <button  type="submit" class="btn btn-default"></button>

            </div>      
            
            </div>
        </form>

              
        </div> 
    </div>
</div>
@endsection

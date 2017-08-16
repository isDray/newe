@extends('front.app')

@section('title', '加入會員表單')

@section('selfjs')
<script src="{{url('sweetalert-master/dist/sweetalert.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

<script type="text/javascript">

	function recaptcha_callback(){
        console.log(grecaptcha.getResponse());
        /*$.ajax({
          method: "POST",
          url: "{{url('/join_account_do')}}",
          data: { rep: grecaptcha.getResponse(), }
        })
        .done(function( msg ) {
          alert( "Data Saved: " + msg );
        });*/

        $('.btn').removeAttr('disabled');
    }
	$(function(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        jQuery.extend(jQuery.validator.messages, {
            required: "此欄位為必填",
            remote: "Please fix this field.",
            email: "請填寫正確信箱格式",
            url: "Please enter a valid URL.",
            date: "Please enter a valid date.",
            dateISO: "Please enter a valid date (ISO).",
            number: "此欄位只可為數字",
            digits: "此欄位只可為數字",
            creditcard: "Please enter a valid credit card number.",
            equalTo: "Please enter the same value again.",
            accept: "Please enter a value with a valid extension.",
            maxlength: jQuery.validator.format("此欄位最多  {0} 個字元."),
            minlength: jQuery.validator.format("此欄位最少  {0} 個字元"),
            rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
            range: jQuery.validator.format("Please enter a value between {0} and {1}."),
            max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
            min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
        });

		$('button[type=submit]').click(function(){
           return
			$("#accform").validate({

                rules: {    name:{ 
                	                required: true,
                                 },
                            telephone:{
                                    required: true,
                                    minlength: 9,
                                    digits:true
                            },
                            cellphone:{
                                    required: true,
                                    minlength: 10,
                                    maxlength: 10,
                                    digits:true
                            },
                            mail:{
                                    required: true,
                                    email:true
                            },
                            age:{
                                    required: true,
                                    digits:true
                            },
                            address:{
                                    required: true,
                            },
                            password:{
                            	    required: true,
                            	    minlength: 6,
                            	    maxlength: 12,
                            }


                        }

			});

			if( $("#accform").valid() ){
				alert('恭喜過關');
			}
		});

	})
</script>    
@endsection

@section('selfcss')
<link rel="stylesheet" type="text/css" href="{{url('sweetalert-master/dist/sweetalert.css')}}"/>
<link href="{{url('/css/front/join_account.css')}}" rel="stylesheet" type="text/css"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div class='container-fluid'>
    <div class='row'>
        <div class='col-md-8 col-md-offset-2 col-sm-12 col-xs-12' id='form_box'>
        
            <form class="form-horizontal" id='accform' method="post" onsubmit='return trues' action="{{ url('/join_account_do') }}">
            
            {{ csrf_field() }}

            <div class="form-group">
                <label for="inputname" class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="name" name='name' placeholder="姓名">
                </div>
            </div>

            <div class="form-group">
                <label for="inputphone" class="col-sm-2 control-label">電話</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="telephone"  name='telephone' placeholder="電話">
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputphone" class="col-sm-2 control-label">手機</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="cellphone"  name='cellphone' placeholder="手機">
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputmail" class="col-sm-2 control-label">信箱</label>
                <div class="col-sm-8">
                <input type="email" class="form-control " id="mail" name='mail' placeholder="信箱">
                </div>
            </div>   

            <div class="form-group">
                <label for="inputphone" class="col-sm-2 control-label">性別</label>
                <div class="col-sm-8">
                    <label class="radio-inline ">
                        <input type="radio" name="borg" id="inlineRadio1" value='1' checked="checked"> 男
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="borg"  id="inlineRadio2" value='0'> 女
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="inputphone" class="col-sm-2 control-label">年齡</label>
                <div class="col-sm-8">
                <input type="number" class="form-control" id="age" min="0" name='age' placeholder="年齡">
                </div>
            </div>

            <div class="form-group">
                <label for="inputaddress" class="col-sm-2 control-label">地址</label>
                <div class="col-sm-8">
                <input type="text" class="form-control required" id="address" name='address' placeholder="地址">
                </div>
            </div>

            <div class="form-group">
                <label for="inputpassword" class="col-sm-2 control-label">密碼</label>
                <div class="col-sm-8">
                <input type="password" class="form-control required" id="password" name='password' placeholder="密碼">
                </div>
            </div>

            

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-5">
                    <div class="g-recaptcha" data-sitekey="6LcVdCkUAAAAAKUzyVclSdbBBpJHJaWA96dRCn7l" data-callback="recaptcha_callback"></div>
                </div>
                <div class="col-sm-offset-0 col-sm-5">
                    <button type="submit" class="btn btn-default" disabled="disabled">註冊</button>
                </div>
            </div>

            </form>     
        </div>
    </div>
</div>
@endsection


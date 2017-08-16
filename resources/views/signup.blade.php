@extends('front_default')

@section('title', '註冊會員')

@section('selfcss') 
<link rel="stylesheet" href="{{ url('css/front_signup.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{url('sweetalert-master/dist/sweetalert.css')}}"/>

<script src="{{url('sweetalert-master/dist/sweetalert.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

<script type="text/javascript">
$(function(){

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
        
        $("#joinform").validate({
            
            rules: {    
                        account:{ 
                            required: true,
                            maxlength:12,
                            minlength:6
                        },
                        password:{
                            required: true,
                            maxlength:12,
                            minlength:6
                        },
                        password2:{
                            required: true,
                            maxlength:12,
                            minlength:6
                        },
                        sex:{
                            required: true,
                        },
                        birthday:{
                            required: true,
                        },                       
                        name:{ 
                            required: true,
                            maxlength:20,
                        },
                        phone:{
                            required: true,
                            maxlength:10,
                            minlength:10,
                            digits:true
                        },
                        address:{
                            required: true,
                        },
                        email:{
                            required: true,
                            email:true
                        }
            }
        });

        if( $("#joinform").valid() ){
            if( $('#fchk').is(":checked") ){
                $.ajax({
                  method: "POST",
                  dataType: "json",
                  url: "{{url('/joindo')}}",
                  data: { 
                          "_token": "{{ csrf_token() }}",
                          "account": $("#account").val(),
                          "password": $("#password").val(),
                          "password2": $("#password2").val(),
                          "sex":  $(".sexg:checked").val(),
                          "birthday":$("#birthday").val(),
                          "name":$("#name").val(),
                          "phone":$("#phone").val(),
                          "address":$("#address").val(),
                          "email":$("#email").val()

                 }

                })
                .done(function( msg ) {
                    if(msg=='輸入密碼不一致'){
                    swal({
                        title: '請確認表單!',
                        text: msg,
                        type: 'error',
                       confirmButtonText: '再次確認'
                    });
                    }else if(msg=='會員新增成功'){
                    swal({
                        title: '會員新增成功!',
                        text: '會員新增成功',
                        type: 'success',
                        confirmButtonText: 'OK'
                    });
                    }else if(msg=='此帳號已經存在'){
                    swal({
                        title: '此帳號已經存在!',
                        text: '此帳號已經存在',
                        type: 'error',
                        confirmButtonText: 'OK'
                    });
                    }
                })
                .fail(function( jqXHR,textStatus) {
                    swal({
                    title: '請確認表單!',
                    text: '請確定表單欄位確實填寫',
                    type: 'error',
                    confirmButtonText: '再次確認'
                    })
                });



            }else{
                swal({
                    title: '尚未完成!',
                    text: '請先勾選同意會員條款',
                    type: 'error',
                    confirmButtonText: '我了解了'
                })
            }
        }

    });
});    
</script>
@endsection

@section('main')

<div id='signup_area' class='col-md-12 col-sm-12 col-xs-12' onsubmit="return false">
    <div id='signup_form_area' class='col-md-10 col-md-offset-1 ccol-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1'>
        <div id='signup_form' class='col-md-6 col-md-offset-5 ccol-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1'>
        
        <form action="{{url('/joindo')}}" method="post" id='joinform'>
            
            {{ csrf_field() }}
            
            <div class="form-group">
            <label for="exampleInputaccount">會員帳號</label>
            <input type="text" class="form-control" placeholder="" name='account' id='account'>
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">密碼</label>
            <input type="password" class="form-control" placeholder="" name='password' id='password'>
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">確認密碼</label>
            <input type="password" class="form-control" placeholder=""
            name='password2' id='password2'>
            </div>

            <div class="form-group">
            <label class="radio control-label">性別</label>
            <label class="radio-inline">
              <input type="radio" class='sexg' id="sex" value="b" name='sex' checked="checked"> 男
            </label>
            <label class="radio-inline">
              <input type="radio" class='sexg' id="sex" value="g" name='sex'> 女
            </label>
            </div>

            <div class="form-group">
            <label for="exampleInputBirth">生日</label>
            <input type="date" class="form-control" placeholder="" name='birthday' id='birthday'>
            </div>

            <div class="form-group">
            <label for="exampleInputName">姓名</label>
            <input type="text" class="form-control" placeholder="" name='name' id='name'>
            </div>
            
            <div class="form-group">
            <label for="exampleInputName">電話</label>
            <input type="text" class="form-control" placeholder="" name='phone' id='phone'>
            </div>

            <div class="form-group">
            <label for="exampleInputName">地址</label>
            <input type="text" class="form-control" placeholder="" name='address' id='address'>
            </div>            

            <div class="form-group">
            <label for="exampleInputemail">Email</label>
            <input type="email" class="form-control" placeholder="" name='email' id='email'>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" value="" name='fchk' id='fchk'>
                我已詳細閱讀並且同意會員條款同意書
              </label>
            </div>

            <div class="form-group">
            <div class="col-md-4 col-md-offset-4 ccol-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4">  
                <button  type="submit" class="btn btn-default" id='signbtn' ></button>

            </div>      
            
            </div>
        </form>

              
        </div> 
    </div>
</div>
@endsection

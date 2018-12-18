@extends('layouts.home')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-lg-2 col-lg-offset-9 text-right slf_topac">

</div>
<div class="col-lg-10 col-lg-offset-1">
    <div class="panel panel-default">
        
        <div class="panel-heading">
            修改酒莊
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <form  id='accform' onsubmit='return false' role="form" method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <div class="form-group" >
                            <label>酒莊名稱</label>
                            <input class="form-control required" placeholder="酒莊名稱" name='typename' id='typename' type="text" 
                            value="{{$winery_manager[0]->name}}" 
                            >
                        </div>


                        <div class="form-group" >
                            <label>酒莊描述</label>
                            <textarea class="form-control" rows="3" name='des' id='des'>{{$winery_manager[0]->description}}</textarea>
                        </div>

                        <div class="form-group" >
                            <label>南北排序(北小南大)</label>
                            <input class="form-control required" placeholder="南北排序" name='sort' id='sort' type="number" min="0" value="{{$winery_manager[0]->sort}}">
                        </div>

                        <div class="form-group" >
                            <label>上傳圖片(icon)</label>
                            <input type="file" name="import_file" id="import_file">
                            @if( file_exists($img1))
                            <img src="/image/winery/{{$winery_manager[0]->pic_name}}">
                            @endif
                        </div>

                        <div class="form-group" >
                            <label>上傳圖片</label>
                            <input type="file" name="import_file2" id="import_file2">
                            @if( file_exists($img2))
                            <img src="/image/winery2/{{$winery_manager[0]->pic_name2}}">
                            @endif                            
                        </div>
                        
                        <div class="form-group" >
                            <label>上傳圖片</label>
                            <input type="file" name="import_file3" id="import_file3">
                            @if( file_exists($img3))
                            <img src="/image/winery3/{{$winery_manager[0]->pic_name3}}">
                            @endif                              
                        </div>

                        <div class="form-group">
                            <label>是否啟用</label>
                            <select class="form-control" id='status' name='status'>
                                <option value="0" @if($winery_manager[0]->status ==0) selected @endif>
                                     否
                                </option>
                                
                                <option value="1" @if($winery_manager[0]->status ==1) selected @endif>
                                     是
                                </option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-default">修改</button>

                    </form>
                </div>
            </div><!-- /.row (nested) -->
        </div><!-- /.panel-body -->
    </div>
</div>    


@endsection

@section('selfjs')
<script type="text/javascript">

// 表單驗證
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

        var files = $("#import_file").get(0).files;
        var files2 = $("#import_file2").get(0).files;    
        var files3 = $("#import_file3").get(0).files;   
        var formData = new FormData();     
        formData.append("import_file",  files[0]);
        formData.append("import_file2", files2[0]);
        formData.append("import_file3", files3[0]);  
        formData.append("id", {{$winery_manager[0]->id}});
        formData.append("typename",$('input[name=typename]').val() );
        formData.append("status",  $('select[name=status]').val());
        formData.append("des", $('textarea[name=des]').val());
        formData.append("sort", $('input[name=sort]').val());


        $("#accform").validate({
            rules: {    
                typename:{ 
                    required: true,
                },
                des:{
                    required: true,
                },
                sort:{
                    required: true,
                    digits:true
                }
            }
        });

        if( $("#accform").valid() ){
            
            $.ajax({
                method: "POST",
                url: "{{ url('edit/winery_manager_edit_do')}}",
                data:formData,
                contentType: false,   
                processData: false, 
                statusCode: {
                    422: function(errmsg) {
                        //console.log(errmsg.responseJSON);
                        swal("更新錯誤!", "請檢查輸入是否正確", "error");
                    },
                    500: function(errmsg) {
                        //console.log(errmsg.responseJSON);
                        swal("更新錯誤!", "請檢查輸入是否正確", "error");
                    }
                }
            })
            .done(function( msg ) {
                if(msg =='"success"'){

                    swal({
                          title: "更新成功!",
                          text: "更新酒莊成功!",
                          type: "success",
                          //showCancelButton: true,
                          //confirmButtonColor: "#DD6B55",
                          confirmButtonText: "OK",
                          closeOnConfirm: false
                        },
                    function(){
                        document.location.href="/edit/winery_manager";
                    });
                }
                
            });

        }

    })
})

</script>
@endsection
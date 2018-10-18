@extends('layouts.home')

@section('content')

<div class="col-lg-2 col-lg-offset-9 text-right slf_topac">

</div>
<div class="col-lg-10 col-lg-offset-1">
    <div class="panel panel-default">
        
        <div class="panel-heading">
            新增酒莊
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <form  id='accform' onsubmit='return false' role="form" method="POST" action="{{ url('/edit/winery_manager_new_do')}}" enctype="multipart/form-data">
                        <div class="form-group" >
                            <label>酒莊名稱</label>
                            <input class="form-control required" placeholder="酒莊名稱" name='typename' id='typename' type="text" >
                        </div>

                        <div class="form-group" >
                            <label>酒莊描述</label>
                            <textarea class="form-control" rows="3" name='des' id='des'></textarea>
                        </div>

                        <div class="form-group" >
                            <label>南北排序(北小南大)</label>
                            <input class="form-control required" placeholder="南北排序" name='sort' id='sort' type="number"  min="0">
                        </div>

                        <div class="form-group" >
                            <label>上傳圖片(icon)</label>
                            <input type="file" name="import_file" id="import_file">
                        </div>

                        <div class="form-group" >
                            <label>上傳圖片</label>
                            <input type="file" name="import_file2" id="import_file2">
                        </div>

                        <div class="form-group">
                            <label>是否啟用</label>
                            <select class="form-control" id='status' name='status'>
                                <option value="0">
                                     否
                                </option>
                                
                                <option value="1">
                                     是
                                </option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-default">新增</button>

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
        min: jQuery.validator.format("最小值為 {0}.")
    });

    $('button[type=submit]').click(function(){
        
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
                },
                import_file:{
                    required: true
                },
                import_file2:{
                    required: true
                }

            }
        });

        if( $("#accform").valid() ){
       
            var files = $("#import_file").get(0).files;
            var files2 = $("#import_file2").get(0).files;      
            var formData = new FormData();     
            formData.append("import_file",  files[0]);
            formData.append("import_file2", files2[0]);  
            formData.append("typename",$('input[name=typename]').val() );
            formData.append("status",  $('select[name=status]').val());
            formData.append("des", $('textarea[name=des]').val());
            formData.append("sort", $('input[name=sort]').val());
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                method: "POST",
                url: "{{ url('edit/winery_manager_new_do')}}",
                data:formData,
                contentType: false,   
                processData: false, 
                statusCode: {
                    422: function(errmsg) {
                        //console.log(errmsg.responseJSON);
                        swal("新增錯誤!", "請檢查輸入是否正確", "error");
                    },
                    500: function(errmsg) {
                        //console.log(errmsg.responseJSON);
                        swal("新增錯誤!", "請檢查輸入是否正確", "error");
                    }
                }
            })
            .done(function( msg ) {
                if(msg =='"success"'){

                    swal({
                          title: "新增成功!",
                          text: "成功新增酒莊!",
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
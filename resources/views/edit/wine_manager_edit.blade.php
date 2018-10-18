@extends('layouts.home')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-lg-2 col-lg-offset-9 text-right slf_topac">

</div>
<div class="col-lg-10 col-lg-offset-1">
    <div class="panel panel-default">
        
        <div class="panel-heading">
            修改酒品
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <form  id='accform' onsubmit='return false' role="form" method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <div class="form-group" >
                            <label>酒品名稱</label>
                            <input class="form-control required" placeholder="酒品名稱" name='typename' id='typename' type="text" 
                            value="{{$wine_manager[0]->name}}" 
                            >
                        </div>

                        <div class="form-group">
                            <label>酒品種類</label>
                            <select class="form-control" id='wine_type' name='wine_type'>
                                <option value="">請選擇</option>
                                @foreach ($wine_type as $key=>$val)
                                
                                <option value="{{$val->id}}"
                                @if($wine_manager[0]->type ==$val->id) selected @endif
                                >{{$val->name}}
                                </option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>葡萄品種</label>
                            <select class="form-control" id='grape_type' name='grape_type'>
                                <option value="">請選擇</option>
                                @foreach ($grape_type as $key=>$val)
                                <option value="{{$val->id}}"
                                @if($wine_manager[0]->variety ==$val->id) selected @endif
                                > {{$val->name}}</option>
                                @endforeach                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>口感</label>
                            <select class="form-control" id='taste_type' name='taste_type'>
                                <option value="">請選擇</option>
                                @foreach ($taste_type as $key=>$val)
                                <option value="{{$val->id}}"
                                @if($wine_manager[0]->taste ==$val->id) selected @endif
                                > {{$val->name}}</option>
                                @endforeach                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>產地</label>
                            <select class="form-control" id='ori_type' name='ori_type'>
                                <option value="">請選擇</option>
                                @foreach ($origin_type as $key=>$val)
                                <option value="{{$val->id}}"
                                @if($wine_manager[0]->origin ==$val->id) selected @endif
                                > {{$val->name}}</option>
                                @endforeach                                 
                            </select>
                        </div>

                        <div class="form-group">
                            <label>酒莊</label>
                            <select class="form-control" id='winery_type' name='winery_type'>
                                <option value=''>請選擇</option>
                                @foreach ($winery_type as $key=>$val)
                                <option value="{{$val->id}}"
                                @if($wine_manager[0]->winery ==$val->id) selected @endif
                                > {{$val->name}}</option>
                                @endforeach                                    
                            </select>
                        </div>

                        <div class="form-group" >
                            <label>特色描述</label>
                            <input class="form-control required" placeholder="特色描述" name='sortdes' id='sortdes' type="text" value='{{$wine_manager[0]->sortdes}}'>
                        </div>

                        <div class="form-group" >
                            <label>酒品簡介</label>
                            <textarea class="form-control" rows="3" name='des' id='des'>{{$wine_manager[0]->des}}
                            </textarea>
                        </div>                                                                          
                        <div class="form-group" >
                            <label>酒品資訊</label>
                            <textarea class="form-control" rows="3" name='detail' id='detail'>{{$wine_manager[0]->detail}}</textarea>
                        </div>

                        <div class="form-group" >
                            <label>上傳圖片(icon)</label>
                            <input type="file" name="import_file" id="import_file">
                        </div>

                        <div class="form-group" >
                            <label>排序</label>
                            <input class="form-control required" placeholder="排序" name='sort' id='sort' type="number" min=0 value="{{$wine_manager[0]->sort}}">
                        </div>                                                  

                        <div class="form-group">
                            <label>是否啟用</label>
                            <select class="form-control" id='status' name='status'>
                                <option value="0" @if($wine_manager[0]->status ==0) selected @endif>
                                     否
                                </option>
                                
                                <option value="1" @if($wine_manager[0]->status ==1) selected @endif>
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
        var formData = new FormData();     
        formData.append("import_file",  files[0]);
        formData.append("id", {{$wine_manager[0]->id}});
        formData.append("typename",   $('input[name=typename]').val());
        formData.append("wine_type",  $('select[name=wine_type]').val());
        formData.append("grape_type", $('select[name=grape_type]').val());
        formData.append("taste_type", $('select[name=taste_type]').val());
        formData.append("ori_type",   $('select[name=ori_type]').val());
        formData.append("winery_type",$('select[name=winery_type]').val());
        formData.append("detail",     $('textarea[name=detail]').val());
        formData.append("status",     $('select[name=status]').val());
        formData.append("sortdes",    $('input[name=sortdes]').val());
        formData.append("des",        $('textarea[name=des]').val());
        formData.append("sort",       $('input[name=sort]').val());
        formData.append("_token", "{{ csrf_token() }}");


        $("#accform").validate({
            rules: {    
                typename:{ 
                    required: true,
                },
                wine_type:{
                    required: true,
                },
                grape_type:{
                    required: true,
                },
                ori_type:{
                    required: true,
                },
                winery_type:{
                    required: true,
                },
                sortdes:{
                    required: true,
                },
                des:{
                    required: true,
                },
                detail:{
                    required:true,
                },
                sort:{
                    required:true,
                    digits: true
                }

            }
        });

        if( $("#accform").valid() ){
            
            $.ajax({
                method: "POST",
                url: "{{ url('edit/wine_manager_edit_do')}}",
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
                          text: "更新酒品成功!",
                          type: "success",
                          //showCancelButton: true,
                          //confirmButtonColor: "#DD6B55",
                          confirmButtonText: "OK",
                          closeOnConfirm: false
                        },
                    function(){
                        document.location.href="/edit/wine_manager";
                    });
                }
                
            });

        }

    })
})

</script>
@endsection
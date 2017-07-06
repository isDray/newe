@extends('layouts.home')

@section('content')

<div class="col-lg-2 col-lg-offset-9 text-right slf_topac">

</div>
<div class="col-lg-10 col-lg-offset-1">
    <div class="panel panel-default">
        
        <div class="panel-heading">
            新增功能
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <form id='featuresform' onsubmit='return false' role="form" method="POST" action="{{ url('/features/features_new_do')}}">
                        <div class="form-group" >
                            <label>對應控制器</label>
                            <input class="form-control required" placeholder="對應控制器" name='f_controller'>
                        </div>
                        <div class="form-group">
                            <label>功能名稱</label>
                            <input class="form-control required" placeholder="功能名稱" name='f_name'>
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
    $('button[type=submit]').click(function(){
        $("#featuresform").validate();

        if( $("#featuresform").valid() ){
            $.ajax({
                method: "POST",
                url: "{{ url('/features/features_new_do')}}",
                data: { 
                    
                    _token: "{{ csrf_token() }}",
                    f_controller:   $('input[name=f_controller').val(),
                    f_name:  $('input[name=f_name]').val(),

                      
                },
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
                          text: "成功新增功能!",
                          type: "success",
                          //showCancelButton: true,
                          //confirmButtonColor: "#DD6B55",
                          confirmButtonText: "OK",
                          closeOnConfirm: false
                        },
                    function(){
                        document.location.href="/arole/public/features";
                    });
                }
                
            });

        }

    })
})

</script>
@endsection
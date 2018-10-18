@extends('layouts.home')

@section('content')

<div class="col-lg-2 col-lg-offset-9 text-right slf_topac">

</div>
<div class="col-lg-10 col-lg-offset-1">
    <div class="panel panel-default">
        
        <div class="panel-heading">
            新增群組權限
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <form id='grpform' onsubmit='return false' role="form" method="POST" action="{{ url('/grppower/grppower_new_do')}}">
                        <div class="form-group" >
                            <label>群組名稱</label>
                            <input class="form-control required" placeholder="群組名稱" name='grp_name'>
                        </div>
                        
                        <div class="form-group" >
                            <label>群組描述</label>
                            <input class="form-control required" placeholder="群組描述" name='grp_des'>
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
        $("#grpform").validate();

        if( $("#grpform").valid() ){

            $.ajax({
                method: "POST",
                url: "{{ url('/grppower/grppower_new_do')}}",
                data: { 
                    
                    _token: "{{ csrf_token() }}",
                    grp_name:   $('input[name=grp_name]').val(),
                    grp_des:  $('input[name=grp_des]').val(),

                      
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
                          text: "成功新增權限群組!",
                          type: "success",
                          //showCancelButton: true,
                          //confirmButtonColor: "#DD6B55",
                          confirmButtonText: "OK",
                          closeOnConfirm: false
                        },
                    function(){
                        document.location.href="/grppower";
                    });
                }
                
            });

        }

    })
})

</script>
@endsection
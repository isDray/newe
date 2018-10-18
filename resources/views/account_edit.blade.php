@extends('layouts.home')

@section('content')

<div class="col-lg-2 col-lg-offset-9 text-right slf_topac">

</div>
<div class="col-lg-10 col-lg-offset-1">
    <div class="panel panel-default">
        
        <div class="panel-heading">
            修改會員表單
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <form id='accform' onsubmit='return false' role="form" method="POST" action="{{url('/account/account_edit_do')}}">

                        <input type="hidden" name="acc_id" value="{{$id}}">
                        <div class="form-group" >
                            <label>姓名</label>
                            <input class="form-control required" placeholder="姓名" name='acc_name' value="{{$data[0]->name}}">
                        </div>
                        <div class="form-group">
                            <label>信箱</label>
                            <input class="form-control email required" placeholder="email" name='acc_email' value="{{$data[0]->email}}">
                        </div>

                        <div class="form-group">
                            <label>密碼</label>
                            <input class="form-control required" type="password" name='acc_passwd' value="{{$data[0]->password}}">
                        </div>

                        <div class="form-group">
                            <label>群組</label>
                            <select class="form-control" name='acc_role'>
                                <option value="admin" @if ( $which_role === 'admin')selected @endif>admin</option>
                                <option value="advanced" @if ( $which_role === 'advanced')selected @endif>advanced</option>
                                <option value="general" @if ( $which_role === 'general')selected @endif>general</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-default">修改</button>

                    </form>
                </div>
            </div><!-- /.row (nested) -->
        </div><!-- /.panel-bod1y -->
    </div>
</div>    
@endsection

@section('selfjs')
<script type="text/javascript">

// 表單驗證
$(function(){
    $('button[type=submit]').click(function(){
        $("#accform").validate();

        if( $("#accform").valid() ){

            $.ajax({
                method: "POST",
                url: "{{ url('/account/account_edit_do')}}",
                data: { 
                    
                    _token: "{{ csrf_token() }}",
                    acc_id:     $('input[name=acc_id]').val(),
                    acc_name:   $('input[name=acc_name]').val(),
                    acc_email:  $('input[name=acc_email]').val(),
                    acc_passwd: $('input[name=acc_passwd]').val(),
                    acc_role:   $('select option:selected').val(), 
                      
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
                          title: "修改成功!",
                          text: "修改會員資料成功!",
                          type: "success",
                          //showCancelButton: true,
                          //confirmButtonColor: "#DD6B55",
                          confirmButtonText: "OK",
                          closeOnConfirm: false
                        },
                    function(){
                        document.location.href="/account";
                    });
                }
                
            });

        }
        
    })
})

</script>
@endsection

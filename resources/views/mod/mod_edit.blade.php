@extends('layouts.home')

@section('content')

<div class="col-lg-2 col-lg-offset-9 text-right slf_topac">

</div>
<div class="col-lg-10 col-lg-offset-1">
    <div class="panel panel-default">
        
        <div class="panel-heading">
            修改群組權限
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <form  id='modform' onsubmit='return false' role="form" method="POST" action="{{ url('/mod/mod_edit_do')}}/{{$nid}}">

                        <div class="form-group">
                            <label>模組權限</label>
                            
                            @foreach($data as $key => $value)
                                <label class="checkbox-inline">
                                    <input name='{{$value ->features}}' type="checkbox"
                                    @if ( explode(',',$value->power)[3] == 1)
                                        checked
                                    @endif
                                    >
                                    {{ $value ->name }}
                                </label>
                            @endforeach
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

    $('button[type=submit]').click(function(){
        var f_arr = Array();
        $("input[type=checkbox]:checked").each(function(){
            f_arr.push( $(this).prop('name') );
        })  
        var nid = {{$nid}};
        $.ajax({
            method: "POST",
            url: "{{ url('/mod/mod_edit_do/')}}/"+nid,
            data: { 
                _token: "{{ csrf_token() }}",
                f_arr:f_arr    
            },
            
            statusCode: {
                422: function(errmsg) {
                    swal("新增錯誤!", "請檢查輸入是否正確", "error");
                },
                500: function(errmsg) {
                    swal("新增錯誤!", "請檢查輸入是否正確", "error");
                }
            }
        })
        .done(function( msg ) {
            
            if(msg =='"success"'){

                swal({
                    title: "修改成功!",
                    text: "修改模組權限成功!",
                    type: "success",
                          //showCancelButton: true,
                          //confirmButtonColor: "#DD6B55",
                    confirmButtonText: "OK",
                    closeOnConfirm: false
                },
                function(){
                    document.location.href="/arole/public/mod";
                });
            }
                
        });
        
    })
})
</script>
@endsection
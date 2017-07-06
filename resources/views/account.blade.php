@extends('layouts.home')

@section('content')
<script type="text/javascript">

</script>
<div class="col-lg-2 col-lg-offset-9 text-right slf_topac">
	<a href="{{url('/account/account_new')}}">
	    <button type="button" class="btn btn-success glyphicon-plus">新增會員</button>
	</a>
</div>
<div class="col-lg-10 col-lg-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
            會員列表
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>id編號</th>
                            <th>姓名</th>
                            <th>信箱</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- 列表內容 -->
                        @foreach ($data as $account)
                        <tr>
                            <td>{{ $account -> id }}</td>
                            <td>{{ $account -> name }}</td>
                            <td>{{ $account -> email }}</td>
                            <td>
                                <a href="{{url('/account/account_edit/'.$account -> id)}}">
	                            <button type="button" class="btn btn-primary fa fa-edit"></button>
	                            </a>
	                            <!--<a href="{{url('/account/account_del/'.$account -> id)}}" 
                                onclick="return confirm('確定刪除該會員?')"
	                            >-->
	                            <button  value='{{$account -> id}}' type="button" class="btn btn-danger fa fa-times del"></button>
	                            <!--</a>-->
	                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>    


@endsection

@section('selfjs')

<script type="text/javascript">
$(function(){

    $(".del").click(function(){
        var nid = $(this).val();
        swal({
          title: "確定刪除會員?",
          text: "注意!一經刪除後資料無法回復",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "確定",
          cancelButtonText: "否",
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function(isConfirm){
          if (isConfirm) {
            $.ajax({
                method: "GET",
                url: "{{ url('/account/account_del/')}}/"+nid,
                statusCode: {
                    422: function(errmsg) {
                        //console.log(errmsg.responseJSON);
                        swal("錯誤!", "過程錯誤", "error");
                    },
                    500: function(errmsg) {
                        //console.log(errmsg.responseJSON);
                        swal("錯誤!", "過程錯誤", "error");
                    }
                }
            })
            .done(function( msg ) {
                if(msg =='"success"'){

                    swal({
                          title: "刪除成功!",
                          text: "成功刪除會員!",
                          type: "success",
                          //showCancelButton: true,
                          //confirmButtonColor: "#DD6B55",
                          confirmButtonText: "OK",
                          closeOnConfirm: false
                        },
                    function(){
                        document.location.href="/arole/public/account";
                    });
                }
                
            });           
          } else {
           
          }
        });

    })

});
</script>
@endsection
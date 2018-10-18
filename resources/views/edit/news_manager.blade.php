@extends('layouts.home')

@section('content')
<div class="col-lg-2 col-lg-offset-9 text-right slf_topac">
    <a href="{{url('/edit/news_manager_new')}}">
        <button type="button" class="btn btn-success glyphicon-plus">新增最新消息</button>
    </a>
</div>
<div class="col-lg-10 col-lg-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
            最新消息列表
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>id編號</th>
                            <th>消息名稱</th>
                            <th>啟用</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- 列表內容 -->
                        
                        @foreach ($news_manager as $account)
                        <tr>
                            <td>{{ $account -> id }}</td>
                            <td>{!! $account->name !!}</td>
                            <td>
                            @if ($account->status == 1)
                                啟用
                            @else
                                停用
                            @endif
                            </td>
                            <td>
                                <a href="{{url('/edit/news_manager_edit/'.$account -> id)}}">
                                <button  value='{{$account -> id}}' type="button" class="btn btn-primary fa fa-edit tedit"></button>
                                </a>

                                <button  value='{{$account -> id}}' type="button" class="btn btn-danger fa fa-times tdel"></button>
                                
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

@section('selfcss')

@endsection

@section('selfjs')

<script type="text/javascript">

$(function(){
    
    //當編輯按鈕被點擊時
    $(".tdel").click(function() {

        var nid = $(this).val();
        swal({
          title: "確定刪除該消息",
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
                url: "news_manager_del/"+nid,
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
                          text: "成功刪除該消息!",
                          type: "success",
                          //showCancelButton: true,
                          //confirmButtonColor: "#DD6B55",
                          confirmButtonText: "OK",
                          closeOnConfirm: false
                        },
                    function(){
                        document.location.href="/edit/news_manager";
                    });
                }else{
                    swal({
                          title: "刪除錯誤!",
                          text: "刪除過程錯誤請稍後再試!",
                          type: "error",
                          //showCancelButton: true,
                          //confirmButtonColor: "#DD6B55",
                          confirmButtonText: "OK",
                          closeOnConfirm: false
                        },
                    function(){
                        document.location.href="/edit/news_manager";
                    });                    
                }
                
            });          
          } else {
           
          }
        });


    });
    
});

</script>
@endsection

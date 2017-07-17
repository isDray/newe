@extends('layouts.home')

@section('content')
<!--
<div class="col-lg-2 col-lg-offset-9 text-right slf_topac">
	<a href="{{url('/features/features_new')}}">
	    <button type="button" class="btn btn-success glyphicon-plus">新增功能</button>
	</a>
</div>
<div class="col-lg-10 col-lg-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
            功能列表
        </div>
    </div> 
</div>    
-->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">紀錄列表</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            管理者操作紀錄
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>使用者編號</th>
                                        <th>IP位置</th>
                                        <th>操作紀錄</th>
                                        <th>操作時間</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <!--
                                @foreach ($act_logs as $act_log)
                                    <tr>
                                        <th>{{ $act_log->user_id}}</th>
                                        <th>{{ $act_log->ip}}</th>
                                        <th>{{ $act_log->log}}</th>
                                        <th>{{ $act_log->created_at }}</th>
                                    </tr>
                                @endforeach
                                -->
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

@endsection
@section('selfcss')
<link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('selfjs')
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
    $('#dataTables-example').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":"act_log/forajax",
            "language": {
                "search": "搜尋條件:",
                "zeroRecords": "找不到對映資料",
                "paginate": {
                    "previous": "上一頁",
                    "next": "下一頁",

                }
  }

    });   
});
</script>
@endsection

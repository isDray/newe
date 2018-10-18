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
                    <h1 class="page-header">會員列表</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            會員列表
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>姓名</th>
                                        <th>性別</th>
                                        <th>信箱</th>
                                        <th>電話</th>
                                        <th>生日</th>
                                        <th>地址</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                
                                @foreach ($msg as $act_log)
                                    <tr>
                                        <th>{{ $act_log->name}}</th>
                                        <th>@if($act_log->sex ==0)男 @else 女 @endif</th>
                                        <th>{{ $act_log->email}}</th>
                                        <th>{{ $act_log->phone}}</th>
                                        <th>{{ $act_log->birthday}}</th>
                                        <th>{{ $act_log->address}}</th>
                                    </tr>
                                @endforeach
                                
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
            "ajax":"jmbrforajax",
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

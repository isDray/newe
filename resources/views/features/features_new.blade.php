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
                    <form role="form" method="POST" action="{{ url('/features/features_new_do')}}">
                    {{ csrf_field() }}
                        <div class="form-group" >
                            <label>對應控制器</label>
                            <input class="form-control" placeholder="對應控制器" name='f_controller'>
                        </div>
                        <div class="form-group">
                            <label>功能名稱</label>
                            <input class="form-control" placeholder="功能名稱" name='f_name'>
                        </div>
                        <button type="submit" class="btn btn-default">新增</button>

                    </form>
                </div>
            </div><!-- /.row (nested) -->
        </div><!-- /.panel-body -->
    </div>
</div>    


@endsection

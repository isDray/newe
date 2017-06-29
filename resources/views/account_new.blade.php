@extends('layouts.home')

@section('content')

<div class="col-lg-2 col-lg-offset-9 text-right slf_topac">

</div>
<div class="col-lg-10 col-lg-offset-1">
    <div class="panel panel-default">
        
        <div class="panel-heading">
            新增會員表單
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" method="POST" action="{{ url('/account/account_new_do')}}">
                    {{ csrf_field() }}
                        <div class="form-group" >
                            <label>姓名</label>
                            <input class="form-control" placeholder="姓名" name='acc_name'>
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input class="form-control" placeholder="email" name='acc_email'>
                        </div>

                        <div class="form-group">
                            <label>密碼</label>
                            <input class="form-control" type="password" name='acc_passwd'>
                        </div>

                        <div class="form-group">
                            <label>群組</label>
                            <select class="form-control" name='acc_role'>
                                <option value="admin" >admin</option>
                                <option value="advanced" >advanced</option>
                                <option value="general" >general</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-default">新增</button>

                    </form>
                </div>
            </div><!-- /.row (nested) -->
        </div><!-- /.panel-body -->
    </div>
</div>    


@endsection

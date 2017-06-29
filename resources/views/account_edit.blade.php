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
                    <form role="form" method="POST" action="{{ url('/account/account_edit_do')}}">
                    {{ csrf_field() }}
                        <div class="form-group" >
                            <label>姓名</label>
                            <input class="form-control" placeholder="姓名" name='acc_name' value="{{$data[0]->name}}">
                        </div>
                        <div class="form-group">
                            <label>信箱</label>
                            <input class="form-control" placeholder="email" name='acc_email' value="{{$data[0]->email}}">
                        </div>

                        <div class="form-group">
                            <label>密碼</label>
                            <input class="form-control" type="password" name='acc_passwd' value="{{$data[0]->password}}">
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

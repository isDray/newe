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
                    <form  role="form" method="POST" action="{{ url('/mod/mod_edit_do')}}/{{$nid}}">
                    {{ csrf_field() }}
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
</script>
@endsection
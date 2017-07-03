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
                    <form  onsubmit="return tfchk();" role="form" method="POST" action="{{ url('/grppower/grppower_edit_do')}}/{{$fcid}}">
                    {{ csrf_field() }}
                    
                    @foreach($data as $key => $value)
                    <div class="form-group">
                        <label>{{$value->name}}</label>
                        

                        <label class="checkbox-inline">
                            <input  name="{{$value->features}}[]" class="{{$value->features}} all" type="checkbox" @if (explode(',',$value->power)[0] == 1) checked @endif>全部
                        </label>

                        <label class="checkbox-inline">
                            <input name="{{$value->features}}[]" class="{{$value->features}}" type="checkbox" @if (explode(',',$value->power)[1] == 1) checked @endif>新增
                        </label>

                        <label class="checkbox-inline">
                            <input name="{{$value->features}}[]" class="{{$value->features}}" type="checkbox" @if (explode(',',$value->power)[2] == 1) checked @endif>修改
                        </label>
                        
                        <label class="checkbox-inline">
                            <input  name="{{$value->features}}[]" class="{{$value->features}}" type="checkbox" @if (explode(',',$value->power)[3] == 1) checked @endif>列表
                        </label>
                        
                        <label class="checkbox-inline">
                            <input name="{{$value->features}}[]" class="{{$value->features}}" type="checkbox" @if (explode(',',$value->power)[4] == 1) checked @endif>刪除
                        </label>
                        <input type="hidden" name="{{$value->features}}" value=''>
                    </div>
                    @endforeach
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
    function tfchk(){
        $("input[type=checkbox]").each(function(index){
            if( !$(this).is(":checked") ){
                $(this).val('0');
            }else{
                $(this).val('1');
            }
        });
        
        $("input[type=hidden]").each(function(){
            var nowname = $(this).attr('name');
            var powstr = new Array;
            if( nowname != '_token'){

                $("."+nowname).each(function(index){
                    powstr.push( $(this).val() );
                   
                })
                $(this).val( powstr.toString() );
            }

        })
        return true;
    }

    $(function(){
        $(".all").change(function(){
            var grpcls = $(this).attr('class').split(' ')[0];

                if( $(this).is(':checked') ){
                    $("input[class='"+grpcls+"']").prop("checked", true);
                }else{
                    $("input[class='"+grpcls+"']").prop("checked", false);
                }
        })

        $('input[type="checkbox"]').change(function(){
            var ckclass = $(this).attr('name');
            var cknum = 0;
            $("input[name='"+ckclass+"']").each(function(index){
                if(index > 0){
                    if($(this).is(':checked')){
                        cknum ++;
                    }
                }
            });
            if(cknum == 4){
                $("input[name='"+ckclass+"']:first").prop('checked',true);
            }else{
                $("input[name='"+ckclass+"']:first").prop('checked',false);
            }
        })
    })
</script>
@endsection
@extends('layouts.home')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="panel panel-primary">
            
            <div class="panel-heading">
                修改首頁-關於我們
            </div>
                        
            <div class="panel-body">
                <form>
                    <div class="form-group">
                        <label>請輸入想要呈現的文字</label>
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                    <button type="reset" class="btn btn-primary">確認送出</button>
                </form>
            </div>  

            </div>
        </div>
    </div>
</div>


@endsection

@section('selfcss')

@endsection

@section('selfjs')
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
@endsection

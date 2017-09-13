@extends('layouts.master')

@section('title','編輯開銷項目')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    編輯開銷項目
                </div>
                <div class="panel-body">
                    <div class="container-fluid" style="padding:0;">
                        <form style="margin-top: 20px" class="form-horizontal" method="POST" action="{{ route('item.update',['id'=>$item->id]) }}">
                        	{!! method_field('patch') !!}
                        	 {{ csrf_field() }}
                            
                            <div class="form-group">
                                <label for="content" class="col-sm-2 control-label">開銷金額</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="name" value="{{$item->name}}" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-m btn-success" name="submitButton" value="once">保存修改</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
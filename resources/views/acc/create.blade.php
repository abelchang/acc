@extends('layouts.master')

@section('title','新開銷')

@section('content')

<?php
use Carbon\Carbon;
$today = Carbon::today();
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    新開銷
                </div>
                <div class="panel-body">
                    <div class="container-fluid" style="padding:0;">
                        <form style="margin-top: 20px" class="form-horizontal" method="POST" action="{{ route('acc.store') }}">
                        	 {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">開銷日期</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control " id="create" name="create" value="{{$today->toDateString()}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="room" class="col-sm-2 control-label">開銷項目</label>
                                <div class="col-sm-2">
                                    <select class="form-control" name="item">
                                        @foreach($items as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content" class="col-sm-2 control-label">開銷金額</label>
                                <div class="col-sm-4">
                                    <input type="text" pattern="\d*" class="form-control" name="price" value="0" >
                                </div>
                            </div>
                            <div class="form-group">
                            	<div class="btn-group col-sm-offset-2 col-sm-10" role="group" aria-label="...">
                      				<button type="submit" class="btn btn-m btn-info" name="submitButton" value="continue">連續新增</button>
                      				<button type="submit" class="btn btn-m btn-success" name="submitButton" value="once">新增一筆</button>
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
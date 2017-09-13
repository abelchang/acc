@extends('layouts.master')
@section('title','items')
@section('content')

<div class="container">

    <div class="jumbotron col-md-6 col-md-offset-3 col-xs-12">
        
        <!-- Single button -->
        <div class="panel panel-success" id="orderRooms">
            <!-- Default panel contents -->
            <div class="panel-heading">開銷項目</div>
            <ul class="list-group">
                @foreach ($items as $key=>$item)
                <li class="list-group-item">
                	<form method="POST" action="{{ route('item.destroy',['item'=>$item->id]) }}" onsubmit="confirm("Are you sure?")">
	                    {{ csrf_field() }}
	                    	 <a class="btn btn-xs btn-primary pull-right" href="{{ route('item.edit',['item'=>$item->id]) }}" style="margin-left: 5px;">
		                        <i class="glyphicon glyphicon-pencil"></i>                  
		                    </a>
	                        <input type="hidden" name="_method" value="DELETE" />
	                        <button type="submit" class="btn btn-xs btn-danger pull-right" data-submit-confirm-text="Are you sure?" style="margin-left: 5px;">
	                        <i class="glyphicon glyphicon-trash"></i>
	                        </button>
	                    </span>
	                </form>
                    {{ $item->name }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
        
@endsection
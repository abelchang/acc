@extends('layouts.master')
@section('title','開銷列表')
@section('content')
<?php
use Carbon\Carbon;
$indexDay = Carbon::create($indexYear,$indexMonth,1,0,0,0);
$searchDate = Carbon::create($indexYear,$indexMonth,1,0,0,0);
$olderDate = Carbon::create($indexYear,$indexMonth,1,0,0,0)->subMonth();
$nextDate = Carbon::create($indexYear,$indexMonth,1,0,0,0)->addMonth();
?>
<div class="container">
	<div class="">
		<nav aria-label="...">
			<ul class="pager">
				<li class="previous"><a href="{{ route('acc.showByMonth',['indexYear'=>$olderDate->year, 'indexMonth'=>$olderDate->month]) }}"><span aria-hidden="true">&larr;</span> Older</a></li>
				<li class="next"><a href="{{ route('acc.showByMonth',['indexYear'=>$nextDate->year, 'indexMonth'=>$nextDate->month]) }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
			</ul>
			<div class="pull-right">
            <a class="btn btn-xs btn-danger" href="{{ route('acc.create') }}" style="margin-left: 20px;">
                <i class="glyphicon glyphicon-plus"></i>
                <!-- <span style="padding-left: 5px;">新訂單</span> -->
            </a>
            <div class="btn-group">
              <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="glyphicon glyphicon-search"></i>
                月份 <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                @for($i = 0; $i <= 12; $i++)
                <li><a href=" {{ route('acc.showByMonth',['thisYear'=>$searchDate->subMonth()->year, '$thisMonth'=>$searchDate->month]) }} "> {{$searchDate->year}}/{{$searchDate->month}} </a></li>
                @endfor
              </ul>
            </div>  
        </div>
		</nav>
		<h1>{{ $indexDay->year }} / {{ $indexDay->month }}</h1>
		<p>
			單月開銷：{{$priceTotal}}
		</p>
		<!-- Single button -->
		<div class="panel panel-success">
			<!-- Default panel contents -->
			<div class="panel-heading">開銷列表</div>
			<!-- Table -->
			<table class="table table-hover table-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>日期</th>
						<th>項目</th>
						<th>金額</th>
						<th>選項</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($accs as $key=>$acc)
					<tr>
						<th scope="row">{{$key}}</th>
						<td>{{ Carbon::parse($acc->create)->format('m-d')}}</td>
						<td>{{$acc->items->name}}</td>
						<td>{{$acc->price}}</td>
						<td>
							<form method="POST" action="{{ route('acc.destroy',['acc'=>$acc->id]) }}" onsubmit="confirm("Are you sure?")">
								{{ csrf_field() }}
								<span>
									<a class="btn btn-xs btn-primary" href="{{ route('acc.edit',['acc'=>$acc->id]) }}">
			                            <i class="glyphicon glyphicon-pencil"></i>
			                        </a>
									<input type="hidden" name="_method" value="DELETE" />
									<button type="submit" class="btn btn-xs btn-danger" data-submit-confirm-text="確定要刪除?" >
									<i class="glyphicon glyphicon-trash"></i>
									<!-- <span style="padding-left: 5px;"></span> -->
									</button>
								</span>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
</div>
<script>
    $(function () {
        $("[data-submit-confirm-text]").click(function(e){
            var $el = $(this);
            e.preventDefault();
            var confirmText = $el.attr('data-submit-confirm-text');
            bootbox.confirm(confirmText, function(result) {
            if (result) {
                $el.closest('form').submit();
            }
            });
        });
    });
</script>
@endsection
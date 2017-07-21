@extends('layouts.master')
@section('title','開銷列表')
@section('content')
<?php
use Carbon\Carbon;
$staDate = Carbon::now()->addMonth(4);
// $olderDate = Carbon::createFromDate($thisYear,$thisMonth,'1')->subMonth();
// $nextDate = Carbon::createFromDate($thisYear,$thisMonth,'1')->addMonth();
?>
<div class="container">
	<div class="">
		<nav aria-label="...">
			<ul class="pager">
				<li class="previous"><a href=""><span aria-hidden="true">&larr;</span> Older</a></li>
				<li class="next"><a href="">Newer <span aria-hidden="true">&rarr;</span></a></li>
			</ul>
		</nav>
		<!-- <div class="btn-group">
				<button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="glyphicon glyphicon-calendar"></i>
				其他月份 <span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
						@for($i = 0; $i <= 7; $i++)
						<li><a href=" "> {{$staDate->year}}/{{$staDate->month}} </a></li>
						@endfor
						<li role="separator" class="divider"></li>
						<li><a href=" "> {{Carbon::now()->year}} </a></li>
						<li><a href=" "> {{Carbon::now()->subYear()->year}} </a></li>
				</ul>
		</div> -->
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
						<td>{{$acc->create}}</td>
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
@extends('layouts.master')
@section('title','年度開銷列表')
@section('content')
<?php
use Carbon\Carbon;
$indexDay = Carbon::create($indexYear,1,1,0,0,0);
$searchDate = Carbon::create($indexYear,1,1,0,0,0);
$olderDate = Carbon::create($indexYear,1,1,0,0,0)->subYear();
$nextDate = Carbon::create($indexYear,1,1,0,0,0)->addYear();
?>
<div class="container">
	<div class="">
		<nav aria-label="...">
			<ul class="pager">
				<li class="previous"><a href="{{ route('acc.showByYear',['indexYear'=>$olderDate->year]) }}"><span aria-hidden="true">&larr;</span> Older</a></li>
				<li class="next"><a href="{{ route('acc.showByYear',['indexYear'=>$nextDate->year]) }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
			</ul>
		</nav>
		<h1>{{ $indexDay->year }}</h1>
		<p>
			年度開銷：{{$priceTotal}}
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
						<th>項目</th>
						<th>金額</th>
					</tr>
				</thead>
				<tbody>
					<?php $count=1 ?>
					@foreach($itemSta as $item => $price)
						@if($price !=0)
			             <tr>
							<th scope="row">{{$count}}</th>
							<td>{{$item}}</td>
							<td>{{$price}}</td>
						</tr>
						<?php $count+=1; ?>
						@endif
	                @endforeach
				</tbody>
			</table>
			
		</div>
	</div>
</div>
@endsection
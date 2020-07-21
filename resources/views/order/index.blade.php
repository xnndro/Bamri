@extends('layouts.app')

@section('content')
<div class="container">
	@if(session('sukses'))
	<div class="alert alert-success" role="alert">
		{{session('sukses')}}
	</div>
	@endif
	<div class="row">
		<div class="col-5">
			<h1>Orders</h1>
		</div>
		<div class="col-3 mt-2">
			<a href="/order/export" class="btn btn-success">Export</a>
			<a href="/order/createlink" class="btn btn-primary">Tambah Order</a>
		</div>
		<div class="col-4">
			<form class="form-inline mt-2" method="GET" action="/order">
		      <input name="cari" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		    </form>
		</div>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th>Name</th>
					<th>Bus</th>
					<th>Driver</th>
					<th>Phone</th>
					<th>Order Start</th>
					<th>Total Rent</th>
					<th>Action</th>
				</tr>
			</thead>
			@foreach($data_order as $order)
			<tr>
				<td>{{$order->order_cn}}</td>
				<td>{{$order->bus_pn}}</td>
				<td>{{$order->driver_name}}</td>
				<td>{{$order->order_cp}}</td>
				<td>{{$order->order_start}}</td>
				<td>{{$order->order_total}}</td>
				<td>
					<a class="btn btn-warning btn-sm" href="/order/{{$order->id}}/edit">Edit</a>
					<a class="btn btn-danger btn-sm" href="/order/{{$order->id}}/delete">Delete</a>
				</td>
			</tr>
			@endforeach
		</table>
</div>

@endsection
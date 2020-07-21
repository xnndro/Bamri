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
			<h1>Data Bus</h1>
		</div>
		<div class="col-3  mt-2">
			<a href="/bus/export" class="btn btn-success ">Export</a>
			<a href="/bus/createlink" class="btn btn-primary ">Tambah Bus</a>
			
		</div>
		<div class="col-4">
			
			<form class="form-inline mt-2" method="GET" action="/bus">
		      <input name="cari" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		    </form>
		</div>
		<table class="table table-hover">
			<thead class="thead-dark">
			<tr>
				<th>Plate Number</th>
				<th>Brand</th>
				<th>Seat</th>
				<th>Price</th>
				<th>Action</th>
			</tr>
			</thead>
				@foreach($data_bus as $bus)
			<tr>
				<td>{{$bus->bus_pn}}</td>
				<td>{{$bus->bus_brand}}</td>
				<td>{{$bus->bus_seat}}</td>
				<td>{{$bus->bus_price}}</td>
				<td>
					<a class="btn btn-warning btn-sm" href="/bus/{{$bus->id}}/edit">Edit</a>
					<a class="btn btn-danger btn-sm" href="/bus/{{$bus->id}}/delete">Delete</a>
				</td>
			</tr>
				@endforeach
		</table>
	</div>
</div>



@endsection
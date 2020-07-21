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
			<h1>Data Driver</h1>
		</div>
		<div class="col-3 mt-2">
			<a href="/driver/export" class="btn btn-success">Export</a>
			<a href="/driver/createlink" class="btn btn-primary">Tambah Driver</a>
		</div>
		<div class="col-4">
			<form class="form-inline mt-2" method="GET" action="/driver">
		      <input name="cari" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		    </form>
		</div>
		<table class="table">
			<thead class="thead-dark">
			<tr>
				<th>Driver Name</th>
				<th>Driver Age</th>
				<th>Driver ID</th>
				<th>Action</th>
			</tr>
			</thead>
			@foreach($data_driver as $driver)
			<tr>
				<td>{{$driver->driver_name}}</td>
				<td>{{$driver->driver_age}}</td>
				<td>{{$driver->driver_idn}}</td>
				<td>
					<a class="btn btn-warning btn-sm" href="/driver/{{$driver->id}}/edit">Edit</a>
					<a class="btn btn-danger btn-sm" href="/driver/{{$driver->id}}/delete">Delete</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>

@endsection
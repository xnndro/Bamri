@extends('layouts.app')

@section('content')

<div class="container">
	<h1>Data Driver</h1>
	@if(session('sukses'))
	<div class="alert alert-success" role="alert">
		{{session('sukses')}}
	</div>
	@endif
	<div class="row">
		<div class="col-lg-12">
		 <!-- form -->
        <form action="/driver/{{$driver->id}}/update" method="POST">
        	{{csrf_field()}}
		  <div class="form-group">
		    <label>Driver Name</label>
		    <input name="driver_name" type="text" class="form-control" value="{{$driver->driver_name}}">
		  </div>
		  <div class="form-group">
		    <label>Driver Age</label>
		    <input name="driver_age" type="text" class="form-control" value="{{$driver->driver_age}}">
		  </div>
		  <div class="form-group">
		    <label>Driver ID</label>
		    <input name="driver_idn" type="text" class="form-control" value="{{$driver->driver_idn}}">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
        <!-- form end -->
        </div>
	</div>
</div>


@endsection
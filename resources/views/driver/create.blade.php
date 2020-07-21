@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Tambah Driver</h1>
	@if(session('sukses'))
	<div class="alert alert-success" role="alert">
		{{session('sukses')}}
	</div>
	@endif
	<div class="row">
		<div class="col-lg-12">
			 <!-- form -->
        <form action="/driver/create" method="POST">
        	{{csrf_field()}}
		  <div class="form-group{{$errors->has('driver_name')}}">
		    <label>Driver Name</label>
		    <input name="driver_name" type="text" class="form-control" value="{{old('driver_name')}}">
		    @if($errors->has('driver_name'))
		    	<span class="text-danger">{{$errors->first('driver_name')}}</span>
		    @endif
		  </div>
		  <div class="form-group{{$errors->has('driver_age')? 'has-errors' : ''}}">
		    <label>Driver Age</label>
		    <input name="driver_age" type="text" class="form-control" value="{{old('driver_age')}}">
		    @if($errors->has('driver_age'))
		    	<span class="text-danger">{{$errors->first('driver_age')}}</span>
		    @endif
		  </div>
		  <div class="form-group{{$errors->has('driver_idn')}}">
		    <label>Driver ID</label>
		    <input name="driver_idn" type="text" class="form-control" value="{{old('driver_idn')}}">
		    @if($errors->has('driver_idn'))
		    	<span class="text-danger">{{$errors->first('driver_idn')}}</span>
		    @endif
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
        <!-- form end -->
		</div>
	</div>
</div>
@endsection
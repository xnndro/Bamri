@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Tambah Bus</h1>
	@if(session('sukses'))
	<div class="alert alert-success" role="alert">
		{{session('sukses')}}
	</div>
	@endif
	<div class="row">
		<div class="col-lg-12">
	<form action="/bus/create" method="POST">
        	{{csrf_field()}}
		  <!-- <div class="form-row"> -->
		    <div class="row{{$errors->has('bus_pn')}}">
		      <label>Plate Number</label>
		      <input value="{{old('bus_pn')}}" name="bus_pn" type="text" class="form-control" placeholder="Plate Number" id="bus_pn">
		      @if($errors->has('bus_pn'))
		      	<span class="text-danger">{{$errors->first('bus_pn')}}</span>
		      @endif
		    </div>
		    <div class="row">
		      <label>Bus Brand</label>
		      <select name="bus_brand" class="form-control" value="{{old('bus_brand')}}">
		        <option value="Mercedes" selected>Mercedes</option>
		        <option value="Fuso">Fuso</option>
		        <option value="Scania">Scania</option>
		      </select>
		    </div>
		  <!-- </div> -->
		  <!-- <div class="form-row"> -->
		    <div class="row{{$errors->has('bus_seat')? 'has-error' : ''}}">
		      <label>Seat</label>
		      <input name="bus_seat" type="text" class="form-control" placeholder="Seat" value="{{old('bus_seat')}}" >
		      @if($errors->has('bus_seat'))
		      	<span class="text-danger">{{$errors->first('bus_seat')}}</span>
		      @endif
		    </div>
		    <div class="row{{$errors->has('bus_price')? 'has-error' : ''}}">
		      <label>Price</label>
		      <input name="bus_price" type="text" class="form-control" placeholder="Price per day" value="{{old('bus_price')}}" >
		      @if($errors->has('bus_price'))
		      	<span class="text-danger">{{$errors->first('bus_price')}}</span>
		      @endif
		    </div>
		  <!-- </div> -->
        <!-- form end -->
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
		</form>
		</div>
	</div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Edit Data Bus</h1>
	@if(session('sukses'))
	<div class="alert alert-success" role="alert">
		{{session('sukses')}}
	</div>
	@endif
	<div class="row">
		<div class="col-lg-12">
		 <!-- form -->
        <form action="/bus/{{$bus->id}}/update" method="POST">
        	{{csrf_field()}}
		  <div class="form-row">
		    <div class="col">
		      <label>Plate Number</label>
		      <input name="bus_pn" type="text" class="form-control" placeholder="Plate Number" value="{{$bus->bus_pn}}">
		    </div>
		    <div class="col">
		      <label>Bus Brand</label>
		      <select name="bus_brand" class="form-control">
		        <option value="Mercedes" @if($bus->bus_brand == 'Mercedes')selected @endif>Mercedes</option>
		        <option value="Fuso" @if($bus->bus_brand == 'Fuso')selected @endif >Fuso</option>
		        <option value="Scania" @if($bus->bus_brand == 'Scania')selected @endif >Scania</option>
		      </select>
		    </div>
		  </div>
		  <div class="form-row mt-3">
		    <div class="col">
		      <label>Seat</label>
		      <input value="{{$bus->bus_seat}}" name="bus_seat" type="text" class="form-control" placeholder="Seat">
		    </div>
		    <div class="col">
		      <label>Price</label>
		      <input value="{{$bus->bus_price}}" name="bus_price" type="text" class="form-control" placeholder="Price per day">
		    </div>
		  </div>
		  <button type="submit" class="btn btn-warning mt-2">Update</button>
		</form>
        <!-- form end -->
        </div>
	</div>
</div>
@endsection
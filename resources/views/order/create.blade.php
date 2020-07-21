@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Tambah Order</h1>
	@if(session('sukses'))
		<div class="alert alert-success" role="alert">
			{{session('sukses')}}
		</div>
	@endif
	<div class="row">
		<div class="col-lg-12">
			<form action="/order/create" method="POST">
        	{{csrf_field()}}
		  <div class="form-group{{$errors->has('order_cn')}}">
		    <label>Contact Name</label>
		    <input name="order_cn" type="text" class="form-control" value="{{old('order_cn')}}">
		    @if($errors->has('order_cn'))
		    	<span class="text-danger">{{$errors->first('order_cn')}}</span>
		    @endif
		  </div>
		  <div class="form-group{{$errors->has('order_cp')}}">
		    <label>Contact Person</label>
		    <input name="order_cp" type="number" class="form-control" value="{{old('order_cp')}}">
		    @if($errors->has('order_cp'))
		    	<span class="text-danger">{{$errors->first('order_cp')}}</span>
		    @endif
		  </div>
		  <div class="form-group{{$errors->has('order_start')}}">
		    <label>Order Start</label>
		    <input name="order_start" type="date" class="form-control" value="{{old('order_start')}}">
		    @if($errors->has('order_start'))
		    	<span class="text-danger">{{$errors->first('order_start')}}</span>
		    @endif
		  </div>
		  <div class="form-group{{$errors->has('order_total')}}">
		    <label>Total Rent</label>
		    <input name="order_total" type="number" class="form-control" value="{{old('order_total')}}">
		    @if($errors->has('order_total'))
		    	<span class="text-danger">{{$errors->first('order_total')}}</span>
		    @endif
		  </div>
		  <div class="form-group">
		    <label>Bus Plate Number</label>
		    <select name="bus_id" class="form-control">
		    	@foreach($bus as $buss)
		    	<option value="{{$buss->id}}">{{$buss->bus_pn}}</option>
		    	@endforeach
		    </select>
		  </div> 
		  <div class="form-group">
		    <label>Driver Name</label>
		    <select name="driver_id" class="form-control">
		   		@foreach($driver as $driverr)
		    		<option value="{{$driverr->id}}">{{$driverr->driver_name}}</option>
		    	@endforeach
		    </select>
		  </div>  
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
		</div>
	</div>
</div>
@endsection
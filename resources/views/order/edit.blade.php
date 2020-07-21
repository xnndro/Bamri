@extends('layouts.app')

@section('content')
<div class="container">
	@if(session('sukses'))
	<div class="alert alert-success" role="alert">
		{{session('sukses')}}
	</div>
	@endif

	<div class="row">
		<div class="col-lg-12">
		 <!-- form -->
        <form action="/order/{{$order->id}}/update" method="POST">
        	{{csrf_field()}}
		  <div class="form-group">
		    <label>Contact Name</label>
		    <input name="order_cn" type="text" class="form-control" value="{{$order->order_cn}}">
		  </div>
		  <div class="form-group">
		    <label>Contact Person</label>
		    <input name="order_cp" type="text" class="form-control" value="{{$order->order_cp}}">
		  </div>
		  <div class="form-group">
		    <label>Order Start</label>
		    <input name="order_start" type="date" class="form-control" value="<?php echo date($order->order_start)?>">
		  </div>
		  <div class="form-group">
		    <label>Total Rent</label>
		    <input name="order_total" type="text" class="form-control" value="{{$order->order_total}}">
		  </div>
		  <div class="form-group">
		    <label>Bus Plate Number</label>
		    <select name="bus_id" class="form-control">
		    	@foreach($bus as $buss)
		    	<option value="{{$buss->id}}" @if($buss->id === $order->bus_id) selected @endif>{{$buss->bus_pn}}</option>
		    	@endforeach
		    </select>
		  </div> 
		  <div class="form-group">
		    <label>Driver Name</label>
		    <select name="driver_id" class="form-control">
		   		@foreach($driver as $driverr)
		    		<option value="{{$driverr->id}}" @if($driverr->id === $order->driver_id) selected @endif>{{$driverr->driver_name}}</option>
		    	@endforeach
		    </select>
		  </div> 
		  
		  <button type="submit" class="btn btn-primary">Update</button>
		</form>
        <!-- form end -->
	</div>
	</div>
</div>
@endsection
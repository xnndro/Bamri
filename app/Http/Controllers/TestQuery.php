<?php

namespace App\Http\Controllers;
// use DB;

use Illuminate\Http\Request;

class TestQuery extends Controller
{
    // public function testq()
    // {
    // 	$data=DB::table('bus')
    // 		->join('orders','orders.bus_id','=','bus.id')
    // 		->join('driver','orders.driver_id','=','driver.id')
    // 		->select('orders.*','bus_pn','driver_name')
    // 		->get();

    // 		echo "<pre>";
    // 		print_r($data);
    // }

    public function testq()
    {
    	$bus= bus::pluck('bus_pn');
    	return view('testq',compact('bus'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Driver;
use App\Bus;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
    	if ($request->has('cari')) {
    		$data_order = \App\Orders::where('order_cn','LIKE' , '%'.$request->cari.'%')->get();
    	}else
    	{
            $data_order = DB::table('bus')
                ->join('orders','orders.bus_id','=','bus.id')
                ->join('driver','orders.driver_id','=','driver.id')
                ->select('orders.*','bus_pn','driver_name')
                ->get();
    		// $data = \App\Orders::all();
    	}
    	return view('order.index',['data_order' => $data_order]);
    }
    public function createlink()
    {
        $bus = DB::table('bus')->get();
        $driver = DB::table('driver')->get();
        $order = DB::table('orders')->get();
        foreach ($order as $key => $value) {
            $start = $value->order_start;
            $total = $value->order_total;
            $back = date('Y-m-d',strtotime($start.'+'.$total.' '.'days'));
            // echo $back;
            foreach ($driver as $k => $v) {
                if ($value->driver_id==$v->id && $back>=date('Y-m-d')) {
                    unset($driver[$k]);
                }
            }
            foreach ($bus as $k => $v) {
                if ($value->bus_id==$v->id && $back>=date('Y-m-d')) {
                    unset($bus[$k]);
                }
            }
        }
        return view('order.create',['bus'=> $bus ,'driver'=> $driver]);
    }
    public function create(Request $request)
    {
        $this->validate($request,[
            'order_cn'      => 'string',
            'order_cp'      => 'string|digits:14',
            'order_start'   => 'date|after:today',
            'order_total'   => 'numeric|min:1',
        ]);
       	\App\Orders::create($request->all());
    	return redirect('/order')->with('sukses' , ' Order Telah Di Tambahkan');
        // $create= $request->all();
        // dd($create);
    }
    public function edit($id)
    {
        $bus = DB::table('bus')->get();
        $driver = DB::table('driver')->get();
        $order = DB::table('orders')->get();
        foreach ($order as $key => $value) {
            $start = $value->order_start;
            $total = $value->order_total;
            $back = date('Y-m-d',strtotime($start.'+'.$total.' '.'days'));
            // echo $back;
            foreach ($driver as $k => $v) {
                if ($value->driver_id==$v->id && $back>=date('Y-m-d')) {
                    unset($driver[$k]);
                }
            }
            foreach ($bus as $k => $v) {
                if ($value->bus_id==$v->id && $back>=date('Y-m-d')) {
                    unset($bus[$k]);
                }
            }
        $selected = [];
        $keys = $key;
        }
        $order_selected=DB::table('orders')
        ->where('id','=',$id)
        ->first();
        // driver
        $driver_selected=DB::table('driver')
        ->where('id','=',$order_selected->driver_id)
        ->first();
        $driver['selected']=$driver_selected;
        // bus
        $bus_selected = DB::table('bus')
        ->where('id','=',$order_selected->bus_id)
        ->first();
        $bus['selected']= $bus_selected;
        // echo "<pre>";
        // print_r($driver);
        // echo "<pre>";
        // die();

    	$order = \App\Orders::find($id);
    	return view('order/edit',['order' => $order,'bus'=> $bus ,'driver'=> $driver]);
    }
    public function update(Request $request,$id)
    {
    	$order = \App\Orders::find($id);
    	$order->update($request->all());
    	return redirect('/order')->with('sukses' , 'Data Telah Di Update');
    }
    public function delete($id)
    {
    	$order = \App\Orders::find($id);
    	$order->delete($order);
    	return redirect('/order')->with('sukses','Data Telah Di Hapus');
    }
    public function export()
    {
    	return Excel::download(new OrdersExport,'Orders.xlsx');
    }
   

}

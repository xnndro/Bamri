<?php

namespace App\Exports;

use App\Orders;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Orders::all();
    }
    public function map($order):array
    {
    	return [
    		$order->id,
    		$order->bus_id,
    		$order->driver_id,
    		$order->order_cn,
    		$order->order_cp,
    		$order->order_start,
    		$order->order_total,
    	];
    }
    public function headings():array
    {
    	return [
    		'No',
    		'Bus ID',
    		'Driver ID',
    		'Order Name',
    		'Order Phone',
    		'Order Start',
    		'Order Total Rent',
    	];
    }
}

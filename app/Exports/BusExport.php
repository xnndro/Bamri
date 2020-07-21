<?php

namespace App\Exports;

use App\Bus;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BusExport implements FromCollection,WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bus::all();
    }
    public function map($bus):array
    {
    	return [
    		$bus->id,
    		$bus->bus_pn,
    		$bus->bus_brand,
    		$bus->bus_seat,
    		$bus->bus_price,
    	];
    }
    public function headings():array
    {
    	return [
    		'No',
    		'Plate Number',
    		'Bus Brand',
    		'Bus Seat',
    		'Bus Price',
    	];
    }
}

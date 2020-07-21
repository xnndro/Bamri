<?php

namespace App\Exports;

use App\Driver;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DriverExport implements FromCollection, WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Driver::all();
    }
    public function map($driver):array 
    {
    	return [
    		$driver->id,
    		$driver->driver_name,
    		$driver->driver_age,
    		$driver->driver_idn,
    	];
    }
    public function headings():array 
    {
    	return [
    		'No',
    		'Driver Name',
    		'Driver Age',
    		'Driver ID Number',
    	];
    }
}

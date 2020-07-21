<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\DriverExport;
use Maatwebsite\Excel\Facades\Excel;

class DriverController extends Controller
{
    public function index(Request $request)
    {
       if ($request->has('cari')) {
           $data_driver= \App\Driver::where('driver_name','LIKE','%'.$request->cari.'%')->get();
       }else
       {
    	$data_driver = \App\Driver::all();
       }
    	return view('driver.index' , ['data_driver' => $data_driver]);
    }
    public function create(Request $request)
    {
        $this->validate($request,[
            'driver_name' => 'string',
            'driver_age' => 'numeric|min:18',
            'driver_idn' => 'string|min:16|max:16',
        ]);
    	\App\Driver::create($request->all());
    	return redirect('/driver')->with('sukses','Data Driver Telah Diinput');
    }

    public function createlink()
    {
        return view('driver.create');   
    }
    public function edit($id)
    {
        $driver = \App\Driver::find($id);
        return view('driver/edit' , ['driver' => $driver]);
    }
    public function update(Request $request,$id)
    {
        $driver = \App\Driver::find($id);
        $driver->update($request->all());
        return redirect('/driver')->with('sukses','Data Telah diubah');
    }
    public function delete($id)
    {
        $driver = \App\Driver::find($id);
        $driver->delete();
        return redirect('/driver')->with('sukses','Data Telah terhapus');
    }
    public function export()
    {
        return Excel::download(new DriverExport,'Driver.xlsx');
    }
}

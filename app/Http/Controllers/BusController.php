<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\BusExport;
use Maatwebsite\Excel\Facades\Excel;

class BusController extends Controller
{
    public function index(Request $request)
    {
        if ($request->all()) {
            $data_bus = \App\Bus::where('bus_brand','LIKE','%'.$request->cari.'%')->get();
        }else
        {
    	   $data_bus = \App\Bus::all();
        }
    	return view('bus.index',['data_bus' => $data_bus]);
    }
    public function create(Request $request)
    {
        $this->validate($request,[
            'bus_pn'    => 'string',
            'bus_seat'  => 'numeric|min:1',
            'bus_price' => 'numeric|min:100000',
        ]);
    	\App\Bus::create($request->all());
    	return redirect('/bus')->with('sukses' , 'Data telah berhasil diinput');
    }

    public function createlink()
    {
        return view('bus.create');
    }

    public function edit($id)
    {
    	$bus = \App\Bus::find($id);
    	return view('bus/edit', ['bus' => $bus]);
    }
    public function update(Request $request,$id)
    {
    	$bus = \App\Bus::find($id);
    	$bus->update($request->all());
    	return redirect('/bus')->with('sukses','Data Berhasil Di Update');
    }
    public function delete($id)
    {
    	$bus = \App\Bus::find($id);
    	$bus->delete($bus);
    	return redirect('/bus')->with('sukses', 'Data Telah Dihapus');
    }
    public function Export()
    {
        return Excel::download(new BusExport,'Bus.xlsx');
    }
}

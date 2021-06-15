<?php

namespace App\Http\Controllers\Dashboard;

use App\Driver;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class DriverController extends Controller
{

    public function __construct()
    { 
        $this->middleware(['permission:drivers-create' ] , ['only' =>'store']);
        $this->middleware(['permission:drivers-update' ] , ['only' =>'update']);
        $this->middleware(['permission:drivers-delete' ] , ['only' =>'delete']);
        $this->middleware(['permission:drivers-show' ] , ['only' =>'index']);
        
    }
    public function index()
    {
        $drivers = Driver::paginate(100);
        
        return view('dashboard.drivers.index' , [
            'drivers' => $drivers
        ]);
    }

  
    public function store(Request $request)
    {
        $driver = Driver::create($request->all());

        \Session::flash('success' , 'تمت اضافة سائق جديد');
        return \back();
    }

    public function show($id)
    {
        //
    }

   
    public function edit(Driver $driver)
    {
       return view('dashboard.drivers.edit' , ['driver' => $driver]);
    }

  
    public function update(Request $request, Driver $driver)
    {
        $driver->update($request->all());


        \Session::flash('success' , 'تم تعديل السائق بنجاح');
        return redirect()->route('drivers.index');

    }

  
    public function destroy(Driver $driver)
    {
        $driver->delete();
        \Session::flash('success' , 'تم حذف السائق بنجاح');
        return redirect()->route('drivers.index');
    }
}

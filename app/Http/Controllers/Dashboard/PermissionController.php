<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    
    public function index()
    {
      $permissions = Permission::paginate(100);

      return view('dashboard.permissions.index' ,[
          'permissions' => $permissions
      ]);
    }

  
    public function store(Request $request)
    {

        foreach($request->sufix as $key => $sufix) {
            
            $permission = Permission::create([
                'name' => $request->prefix.'-'.$sufix,
                'show' => ucfirst($request->prefix.' '.$sufix),
            ]);
        }


        \Session::flash('success' , 'تمت اضافة الصلاحيه بنجاح');
        return back();
    }

    public function edit(Permission $permission)
    {
        return view('dashboard.permissions.edit' ,[
            'permission' => $permission
        ]);
    }

    
    public function update(Request $request, Permission $permission)
    {
        $permission->update([
            'show' => $request->show
        ]);

        \Session::flash('success' , 'تم تعديل  الصلاحيه بنجاح');
        return redirect()->route('permissions.index');
    }

   
    public function destroy(Permission $permission)
    {
        $permission->delete();
        
        \Session::flash('success' , 'تم حذف  الصلاحيه بنجاح');
        return \back();
    }
}

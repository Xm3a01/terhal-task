<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class GroupingController extends Controller
{
   
    public function index()
    {
        $groups = Role::where('name' ,'!=', 'super-admin')->get();
        $permissions = Permission::all();
        
        return view('dashboard.managers.groups.index' , [
            'groups' => $groups,
            'permissions' => $permissions
        ]);
    }

   
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->group]);
        $role->syncPermissions($request->permissions);

        \Session::flash('success' , 'تمت اضافة التصنيف بنجاح');
        return back();
    }

    public function show(Role $group)
    {
        $permissions = Permission::all();

        return view('dashboard.managers.groups.show' , [
            'group' => $group,
            'permissions' => $permissions
        ]);
    }

    public function update(Request $request, Role $group)
    {
        $role = $group->update(['name' => $request->group]);
        $group->syncPermissions($request->permissions);

        \Session::flash('success' , 'تمت تعديل التصنيف بنجاح');
        return back();
    }

    
    public function destroy($id)
    {
        $group = Role::findById($id);
        $group->delete();

        \Session::flash('success' , 'تم حذف التصنيف بنجاح');
        return redirect()->route('groups.index');
    }

    public function showManager(Role $group)
    {
        $admins = User::role($group)->paginate(100);
        return view('dashboard.managers.groups.manager',['admins' => $admins]);
    }
}

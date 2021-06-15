<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{


    public function index()
    {
        $routeList = \Route::getRoutes();
    
        $groups = Role::where('name' ,'!=' ,  'super-admin')->get();

        return view('dashboard.managers.index' , [
            'groups' => $groups,
            'admins' =>  $admins
        ]);
    }
    
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ]);

        $user->syncRoles($request->groups);

        \Session::flash('success' , 'تمت اضافة مشرف بنجاح');

        return \back();
    }

    
    public function edit(User $admin)
    {
        $groups = Role::where('name' ,'!=' ,  'super-admin')->get();
        return view('dashboard.managers.edit' , [
            'admin' => $admin,
            'groups' => $groups
        ]);
    }

    
    public function update(Request $request, User $admin)
    {
        $admin->name = $request->name;
        $admin->email = $request->email;
        if($request->has('password') && $request->password != '') {
          $admin->password = \Hash::make($request->password);
        }
        $admin->save();

        $admin->syncRoles($request->groups);

        \Session::flash('success' , 'تمت اضافة مشرف بنجاح');
        return redirect()->route('admins.index');
    }

    
    public function destroy(User $admin)
    {
        $admin->delete();
        \Session::flash('success' , 'تم حذف المشرف بنجاح');

        return \back();

    }
}

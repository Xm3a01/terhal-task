<?php

namespace App\Http\Controllers\Dashboard;

use App\SystemUser;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function __construct()
   {  
        $this->middleware(['permission:users-create' ] , ['only' =>'store']);
        $this->middleware(['permission:users-update' ] , ['only' =>'update']);
        $this->middleware(['permission:users-delete' ] , ['only' =>'delete']);
        
    }

  
    public function index()
    {
        $users = SystemUser::paginate(100);
        return view('dashboard.users.index' , ['users' => $users]);
    }

    public function store(Request $request)
    {
        $user = SystemUser::create($request->all());

        \Session::flash('success' ,'تمت اضافة المستخدم بنجاح');
        return redirect()->route('users.index');
    }

    public function edit(SystemUser $user)
    {
        return view('dashboard.users.edit' , ['user' => $user]);
    }

    public function update(Request $request, SystemUser $user)
    {
        $user->update($request->all());

        \Session::flash('success' ,'تم تعديل المستخدم بنجاح');
        return redirect()->route('users.index');
    }

    public function destroy(SystemUser $user)
    {
        $user->delete();
        
        \Session::flash('success' ,'تم حذف المستخدم بنجاح');
        return redirect()->route('users.index');

    }
}

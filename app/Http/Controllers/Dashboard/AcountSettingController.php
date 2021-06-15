<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcountSettingController extends Controller
{
    public function settingForm(User $admin)
    {
        return view('dashboard.accounts.edit' , ['admin' => $admin]);
    }

    public function update(Request $request , User $admin)
    {
        $admin->name = $request->name;
        $admin->email = $request->email;
        if($request->has('password') && $request->password != '') {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        \Session::flash('success' , 'تم التعديل بنجاح');
        return \back();
    }
}

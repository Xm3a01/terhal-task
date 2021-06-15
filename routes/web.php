<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::group(['middleware' => 'auth'] , function () {
    
    Route::get('/', 'Dashboard\HomeController@index')->name('home');
    Route::get('accounts/{admin}', 'Dashboard\AcountSettingController@settingForm')->name('account.form');
    Route::put('accounts/{admin}', 'Dashboard\AcountSettingController@update')->name('account.update');
    Route::resource('groups', 'Dashboard\GroupingController');
    Route::resource('admins', 'Dashboard\ManagerController');
    Route::resource('drivers', 'Dashboard\DriverController');
    Route::resource('users', 'Dashboard\UserController');
    Route::resource('permissions', 'Dashboard\PermissionController');
    Route::get('managers/group/{group}' , 'Dashboard\GroupingController@showManager')->name('managers.group');
    Route::get('groups/delete/{id}', 'Dashboard\GroupingController@destroy')->name('groups.delete');
});

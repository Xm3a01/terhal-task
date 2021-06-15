<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\User::class,1)->create();
       factory(Spatie\Permission\Models\Role::class,1)->create();
       
       $user =  User::first();
       $role =  Role::first();
       $user->assignRole($role->name);
    }
}

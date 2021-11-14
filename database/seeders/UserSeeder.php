<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //get the admin role and later attach the user to this role
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        $admin = new User();
        $admin->name = 'Anne Wright';
        $admin->email = 'anne@larafest.ie';
        $admin->password = Hash::make('password');
        $admin->save();
        // so far admin is just a user, has not role until you attach roles.
        $admin->roles()->attach($role_admin);


        $user = new User();
        $user->name = 'John Jones';
        $user->email = 'joe@larafest.ie';
        $user->password = Hash::make('password');
        $user->save();
        //attach the user role to this user.
        $user->roles()->attach($role_user);
    }
}

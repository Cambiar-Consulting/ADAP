<?php

namespace Database\Seeders\Development;

use App\Models\Lookups\UsersLookup;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DevUsersTableSeeder extends Seeder
{
    public function run()
    {
        $roles = Role::all();
        foreach ($roles as $role) {
            collect()->times(5, function ($index) use ($role) {
                $user = User::create([
                    'first_name' => $role->name,
                    'last_name' => $index,
                    'username' => preg_replace("/\s+/", '', $role->name.$index),
                    'created_by_id' => UsersLookup::SYSTEMACCOUNT,
                ]);

                $user->roles()->save($role);
            });
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //create permissions
        Permission::create(['name' => 'edit user']);

        //create roles and assign
        $role = Role::create(['name' => 'superadmin']);
        $role->givePermissionTo('edit user');

        //create user super admin
        $user = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('superadmin123'),
        ]);
        $user->assignRole($role);

        //create user admin
        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('admin123'),
        ]);
    }
}

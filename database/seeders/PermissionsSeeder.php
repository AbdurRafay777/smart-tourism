<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'add trip']);
        Permission::create(['name' => 'edit trip']);
        Permission::create(['name' => 'delete trip']);

        $role_vendor = Role::create(['name' => 'vendor']);
        $role_vendor->givePermissionTo('add trip');
        $role_vendor->givePermissionTo('edit trip');
        $role_vendor->givePermissionTo('delete trip');

        $role_admin = Role::create(['name' => 'Super-Admin']);

        $vendor = User::factory()->create([
            'first_name' => 'User',
            'last_name' => 'Vendor',
            'email' => 'vendor@gmail.com'
        ]);
        $vendor->assignRole($role_vendor);


        $admin = User::factory()->create([
            'first_name' => 'User',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com'
        ]);
        $admin->assignRole($role_admin);
    }
}

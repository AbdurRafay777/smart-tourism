<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //Vendor Permissions
        Permission::create(['name' => 'add trip']);
        Permission::create(['name' => 'edit trip']);
        Permission::create(['name' => 'delete trip']);

        //Tourist Permissions
        Permission::create(['name' => 'book trip']);
        Permission::create(['name' => 'book tour guide']);
        Permission::create(['name' => 'book rental car']);

        //Tour Guide Permissions
        Permission::create(['name' => 'choose city']);

        //Rental Service Permissions
        Permission::create(['name' => 'add vehicles']);

        $role_vendor = Role::create(['name' => 'vendor'])
        ->givePermissionTo('add trip', 'edit trip', 'delete trip');

        $vendor1 = User::create([
            'first_name' => 'Rey',
            'last_name' => 'Mysterio',
            'email' => 'rey@test.com',
            'password'=> 'pass'
        ]);
        $vendor2 = User::create([
            'first_name' => 'Steve',
            'last_name' => 'Austin',
            'email' => 'steve@test.com',
            'password'=> 'pass'
        ]);
        $vendor3 = User::create([
            'first_name' => 'Hulk',
            'last_name' => 'Hogan',
            'email' => 'hulk@test.com',
            'password'=> 'pass'
        ]);
        $vendor4 = User::create([
            'first_name' => 'AJ',
            'last_name' => 'Styles',
            'email' => 'aj@test.com',
            'password'=> 'pass'
        ]);
        $vendor1->assignRole($role_vendor);
        $vendor2->assignRole($role_vendor);
        $vendor3->assignRole($role_vendor);
        $vendor4->assignRole($role_vendor);

        $role_tourist = Role::create(['name' => 'tourist'])
        ->givePermissionTo('book trip', 'book tour guide', 'book rental car');

        $tourist1 = User::create([
            'first_name' => 'Tourist',
            'last_name' => 'User',
            'email' => 'tourist@test.com',
            'password' => 'pass'
        ]);

        $tourist2 = User::create([
            'first_name' => 'Wild',
            'last_name' => 'Fang',
            'email' => 'wild@test.com',
            'password' => 'pass',
        ]);

        $tourist3 = User::create([
            'first_name' => 'M.',
            'last_name' => 'Bison',
            'email' => 'bison@test.com',
            'password' => 'pass',
        ]);

        $tourist4 = User::create([
            'first_name' => 'Iori',
            'last_name' => 'Yagami',
            'email' => 'iori@test.com',
            'password' => 'pass',
        ]);

        $tourist1->assignRole($role_tourist);
        $tourist2->assignRole($role_tourist);
        $tourist3->assignRole($role_tourist);
        $tourist4->assignRole($role_tourist);

        $tour_guide1 = User::create([
            'first_name' => 'Matt',
            'last_name' => 'Hardy',
            'email' => 'matt@test.com',
            'password' => 'pass'
        ]);

        $tour_guide2 = User::create([
            'first_name' => 'Jeff',
            'last_name' => 'Hardy',
            'email' => 'jeff@test.com',
            'password' => 'pass'
        ]);

        $role_tour_guide = Role::create(['name' => 'tour_guide'])
        ->givePermissionTo('choose city');

        $tour_guide1->assignRole($role_tour_guide);
        $tour_guide2->assignRole($role_tour_guide);

        $rental_service1 = User::create([
            'first_name' => 'Khan',
            'last_name' => 'Motors',
            'email' => 'khan@test.com',
            'password' => 'pass'
        ]);

        $rental_service2 = User::create([
            'first_name' => 'Haji',
            'last_name' => 'Motors',
            'email' => 'haji@test.com',
            'password' => 'pass'
        ]);

        $role_rental_service = Role::create(['name' => 'rental_service'])
        ->givePermissionTo('choose city', 'add vehicles');

        $rental_service1->assignRole($role_rental_service);
        $rental_service2->assignRole($role_rental_service);

        $role_admin = Role::create(['name' => 'Super-Admin']);
        $admin = User::create([
            'first_name' => 'admin',
            'last_name' => 'user',
            'email' => 'admin@test.com',
            'password' => 'pass'
        ]);
        $admin->assignRole($role_admin);
    }
}

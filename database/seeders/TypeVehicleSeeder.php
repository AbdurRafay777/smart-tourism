<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeVehicle;

class TypeVehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeVehicle::create(['type_id' => 1, 'vehicle_id' => 1]);
        TypeVehicle::create(['type_id' => 1, 'vehicle_id' => 2]);
        TypeVehicle::create(['type_id' => 2, 'vehicle_id' => 3]);
        TypeVehicle::create(['type_id' => 2, 'vehicle_id' => 4]);
        TypeVehicle::create(['type_id' => 3, 'vehicle_id' => 8]);
        TypeVehicle::create(['type_id' => 3, 'vehicle_id' => 9]);
        TypeVehicle::create(['type_id' => 4, 'vehicle_id' => 5]);
        TypeVehicle::create(['type_id' => 5, 'vehicle_id' => 6]);
        TypeVehicle::create(['type_id' => 5, 'vehicle_id' => 7]);
    }
}

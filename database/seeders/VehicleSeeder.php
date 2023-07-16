<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::create(['name' => 'Suzuki Swift', 'price' => 2000, 'user_id' => 11]);
        Vehicle::create(['name' => 'Toyota Corolla', 'price' => 5000, 'user_id' => 12]);
        Vehicle::create(['name' => '2003 Jeep Wrangler', 'price' => 4000, 'user_id' => 11]);
        Vehicle::create(['name' => '1981 Jeep CJ8 Scrambler', 'price' => 4000, 'user_id' => 12]);
        Vehicle::create(['name' => 'Toyota Coaster', 'price' => 4000, 'user_id' => 11]);
        Vehicle::create(['name' => 'Super Cruiser', 'price' => 8000, 'user_id' => 12]);
        Vehicle::create(['name' => 'Strider', 'price' => 9000, 'user_id' => 11]);
        Vehicle::create(['name' => 'Grand Wagoneer', 'price' => 10000, 'user_id' => 11]);
        Vehicle::create(['name' => ' Cadillac Escalade', 'price' => 15000, 'user_id' => 12]);
    }
}

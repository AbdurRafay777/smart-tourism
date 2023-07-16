<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create(['name' => 'Car', 'seats' => 4]);
        Type::create(['name' => 'Jeep', 'seats' => 5]);
        Type::create(['name' => 'SUV', 'seats' => 8]);
        Type::create(['name' => 'Coaster', 'seats' => 20]);
        Type::create(['name' => 'Bus', 'seats' => 30]);
    }
}

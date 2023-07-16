<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create(['name' => 'Lahore']);
        City::create(['name' => 'Karachi']);
        City::create(['name' => 'Islamabad']);
        City::create(['name' => 'Hunza Valley']);
        City::create(['name' => 'Swat Valley']);
        City::create(['name' => 'Naran Kaghan']);
        City::create(['name' => 'Shogran']);
        City::create(['name' => 'Skardu']);
        City::create(['name' => 'Chitral Kalash']);
        City::create(['name' => 'Malam Jabba']);
        City::create(['name' => 'Gilgit']);
        City::create(['name' => 'Naltar Valley']);
        City::create(['name' => 'Neelum Valley']);
    }
}

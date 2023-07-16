<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trip::create([
            'departure' => 1,
            'destination' => 5,
            'price' => 1500,
            'no_of_seats' => 2,
            'start_date' => '2023-06-01',
            'end_date' => '2023-06-02'
        ]);
    }
}

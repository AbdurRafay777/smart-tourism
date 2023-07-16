<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'departure' => 1,
            'destination' => 5,
            'price' => fake()->price(),
            'no_of_seats' => 1,
            'start_date' => fake()->date(),
            'end_date' => fake()->date()
        ];
    }
}
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['PPLG 1', 'PPLG 2', 'AERODINAMIKA 1', 'AERODINAMIKA 2', 'ENGINEERING 1']),
            'desc' => $this->faker->sentence,
        ];
    }
}

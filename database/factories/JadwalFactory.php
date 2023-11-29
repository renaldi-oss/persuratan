<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\jadwal>
 */
class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->sentence(3),
            'deskripsi' => $this->faker->sentence(10),
            'start' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'end' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Operational>
 */
class OperationalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kegiatan' => $this->faker->jobTitle(),
            'lokasi' => $this->faker->city(),
            'jumlah' => $this->faker->numberBetween(1000, 100000),
            'status' => $this->faker->randomElement(['pending', 'manager', 'finance']),
            'tanggal' => $this->faker->date(),
        ];
    }
}

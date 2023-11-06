<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyek>
 */
class ProyekFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_proyek' => $this->faker->company(),
            'pekerjaan' => $this->faker->jobTitle(),
            'lokasi' => $this->faker->address(),
            'due_date' => $this->faker->date(),
            'no_po' => $this->faker->randomNumber(),
        ];
    }
}

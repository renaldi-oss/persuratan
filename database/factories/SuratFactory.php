<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surat>
 */
class SuratFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor' => $this->faker->unique()->randomNumber() .'/PEN/KET/TKI/I/VI/2023',
            'file' => $this->faker->randomElement([null, $this->faker->url()]),
        ];
    }
}

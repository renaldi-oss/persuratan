<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),
            'brand' => $this->faker->word(),
            'qty' => $this->faker->numberBetween(1, 10),
            'estimated_price' => $this->faker->numberBetween(1000, 100000),
            'real_price' => $this->faker->numberBetween(1000, 100000),
            'tipe' => $this->faker->randomElement(['primary', 'additional']),
            'toko' => $this->faker->randomElement(['offline', 'online']),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instansi>
 */
class InstansiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->company(),
            'alamat' => $this->faker->address(),
            'kontak' => $this->faker->phoneNumber(),
            'email' => $this->faker->companyEmail(),
            'lokasi' => $this->faker->city(),
            'attn' => $this->faker->name(),
        ];
    }
}

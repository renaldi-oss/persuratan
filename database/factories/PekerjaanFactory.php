<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pekerjaan>
 */
class PekerjaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->jobTitle(),
            'lokasi' => $this->faker->address(),
            'deskripsi' => $this->faker->text(),
            'jenis' => $this->faker->randomElement(['AWLR', 'ARR', 'EWS']),
            'nominal' => $this->faker->randomElement([null, $this->faker->randomNumber()]),
            'no_surat' => $this->faker->randomElement([null, $this->faker->randomNumber()]),
            'file' => $this->faker->randomElement([null, $this->faker->url()]),
            'due_date' => $this->faker->randomElement([null, $this->faker->date()]),
            'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}

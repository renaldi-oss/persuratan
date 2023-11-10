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
            'to_email' =>$this->faker->unique()->safeEmail(),
            'to_attn' => $this->faker->name(),
            'kontak' => $this->faker->phoneNumber(),
            'nominal' => $this->faker->randomElement([null, $this->faker->randomNumber()]),
            'no_surat' => $this->faker->randomElement([null, $this->faker->randomNumber()]),
            'file' => $this->faker->randomElement([null, $this->faker->url()]),
            'due_date' => $this->faker->randomElement([null, $this->faker->dateTimeBetween('now', '+1 years')]),
            'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}

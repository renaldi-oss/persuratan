<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PurchaseOrder>
 */
class PurchaseOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pekerjaan' => $this->faker->sentence,
            'requester' => $this->faker->name,
            'division' => $this->faker->word,
            'status' => $this->faker->randomElement(['pending', 'manager', 'accepted']),
        ];
    }
}

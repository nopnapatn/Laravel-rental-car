<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->sentence($nbWords = 1, $variableNbWords = true),
            'image_path' => $this->faker->image('public/storage/', 800, 600, null, false),
            'price' => $this->faker->randomNumber(4, true)
        ];
    }
}

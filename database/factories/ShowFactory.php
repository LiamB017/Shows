<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Show>
 */
class ShowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->title(),
            'genre' => fake()->name(),
            'synopsis' => fake()->text(),
            'user_rating' => fake()->randomDigitNotNull(),
            'network' => fake()->name(),
            'creator' => fake()->name(),
            'seasons' => fake()->randomDigitNotNull(),
            'src' => fake()->text(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
  
}
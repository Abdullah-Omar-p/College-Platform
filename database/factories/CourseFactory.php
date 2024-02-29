<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'level' => fake()->randomElement(['first','second','third','fourth']),
            'semester' => fake()->randomElement(['first','second']),
            'units' => fake()->randomElement(['0','1','2','3','4']),
        ];
    }
}

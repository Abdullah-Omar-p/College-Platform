<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        $prof = User::all()->random()->id;
        return [
            'body' => fake()->text(),
            'prof_id' => $prof,
        ];
    }
}

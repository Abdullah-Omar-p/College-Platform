<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    public function definition(): array
    {
        $user = User::all()->random()->id;
        $randomPost = Post::all()->random()->id;
        return [
            'type' => fake()->randomElement(['like','dislike','love']),
            'student_id' => $user,
            'post_id' => $randomPost,
        ];
    }
}

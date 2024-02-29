<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    public function definition(): array
    {
        $user = User::all();
        $randomUser = $user->random();
        $post = Post::all();
        $randomPost = $post->random();
        return [
            'body' => fake()->text(),
            'parent_id' => null,
            'user_id' => $randomUser,
            'post_id' => $randomPost,
        ];
    }
}

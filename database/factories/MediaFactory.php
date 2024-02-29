<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    public function definition(): array
    {
        $course = Course::all()->random()->id;
        $post = Post::all()->random()->id;
        $user = User::all()->random()->id;

        $mediaAbleId = fake()->randomElement([$course,$user,$post]);
        if ($mediaAbleId == $course){
            $mediaAbleType = Course::class;
        }elseif ($mediaAbleId == $post){
            $mediaAbleType = Post::class;
        }else{
            $mediaAbleType = User::class;
        }

        return [
            'filename' => fake()->imageUrl(),
            'mediaable_id' => $mediaAbleId,
            'mediaable_type' => $mediaAbleType,
            'type' => fake()->randomElement(['video','voice','image']),
        ];
    }
}

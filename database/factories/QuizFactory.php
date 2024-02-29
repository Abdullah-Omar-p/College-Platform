<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    public function definition(): array
    {
        $course = Course::all();
        $randomCourse = $course->random();
        $prof = User::all();
        $randomProf = $prof->random();
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'course_id' => $randomCourse->id,
            'prof_id' => $randomProf->id,
        ];
    }
}

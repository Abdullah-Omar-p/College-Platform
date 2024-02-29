<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseStudent>
 */
class CourseStudentFactory extends Factory
{
    public function definition(): array
    {
        $user = User::where('role',2)->pluck('id');
        $userId = $user->random();
        $courseId = Course::all()->random()->id;

        return [
            'student_id' => $userId,
            'course_id' => $courseId,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeFactory extends Factory
{
    public function definition(): array
    {
        $user = User::where('role',2)->pluck('id');
        $userId = $user->random();
        $all = Course::all();
        $course = $all->random();
        $courseName = $course->name;
        $courseId = $course->id;
        $courseLevel = $course->level;
        $courseSemester = $course->semester;
        return [
            'student_id' => $userId,
            'course_id' => $courseId,
            'course_name' => $courseName,
            'grade' => fake()->numberBetween(0,100),
            'level' => $courseLevel,
            'semester' => $courseSemester,
        ];
    }
}

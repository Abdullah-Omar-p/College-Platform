<?php

namespace Database\Factories;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentQuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::all()->random()->id;
        $quiz = Quiz::all()->random()->id;
        return [
            'student_id' => $user,
            'quiz_id' => $quiz,
            'grade' => fake()->numberBetween(0, 99),
            'quiz_name' => fake()->name(),
        ];
    }
}

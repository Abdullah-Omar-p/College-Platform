<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quiz = Quiz::all();
        $quizId = $quiz->random();
        $choice_1 = fake()->colorName();
        $choice_2 = fake()->colorName();
        $choice_3 = fake()->colorName();
        $choice_4 = fake()->colorName();
        $array = [$choice_4, $choice_1, $choice_3, $choice_2];
        $randomIndex = array_rand($array);
        $rightAnswer = $array[$randomIndex];
        return [
            'choice_1' => $choice_1,
            'choice_2' => $choice_2,
            'choice_3' => $choice_3,
            'choice_4' => $choice_4,
            'right_answer' => $rightAnswer,
            'quiz_id' => $quizId,

        ];
    }
}

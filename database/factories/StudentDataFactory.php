<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentData>
 */
class StudentDataFactory extends Factory
{
    public function definition(): array
    {
        $user = User::all();
        $randomUser = $user->random();
        return [
            'user_id' => $randomUser->id,
            'national_id' => fake()->unique()->randomNumber(),
            'phone' => fake()->phoneNumber,
            'email' => $randomUser->email ,
            'address' => fake()->address(),
            'family_phone'=> fake()->phoneNumber,
        ];
    }
}

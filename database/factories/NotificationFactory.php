<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    public function definition(): array
    {
        $user = User::all();
        $randomUser = $user->random();
        return [
            'user_id' => $randomUser->id,
            'message' => fake()->text(),
        ];
    }
}

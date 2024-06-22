<?php

namespace App\Policies;

use App\Models\Quiz;
use App\Models\User;

class QuizControllerPolicy
{
    public function list(User $user)
    {
        return $user->hasPermissionTo('Question.list');
    }

    public function create(User $user)
    {
        switch (true){
            case $user->hasPermissionTo('Question.create'):
                return true;
            default:
                return false;
        }
    }

    public function findById(User $user)
    {
        return $user->hasPermissionTo('Quiz.find');
    }
    public function update(User $user, Quiz $quiz = null)
    {
        switch (true){
            case $user->id === $quiz->prof_id:
                return true;
            default:
                false;
        }
    }

    public function delete(User $user, Quiz $quiz = null)
    {
        switch (true){
            case $user->id === $quiz->user_id:
            case $user->hasAnyRole('super-admin'):
                return true;
            default:
                return false;
        }
    }
}

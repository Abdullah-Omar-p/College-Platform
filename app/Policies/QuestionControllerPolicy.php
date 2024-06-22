<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;

class QuestionControllerPolicy
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
        return $user->hasPermissionTo('Question.find');
    }
    public function update(User $user, Question $question = null)
    {
        switch (true){
            case $user->id === $question->user_id:
                return true;
            default:
                false;
        }
    }

    public function delete(User $user, Question $question = null)
    {
        switch (true){
            case $user->id === $question->user_id:
            case $user->hasAnyRole('super-admin'):
                return true;
            default:
                return false;
        }
    }
}

<?php

namespace App\Policies;

use App\Models\Like;
use App\Models\User;
use Termwind\Components\Li;

class LikeControllerPolicy
{
    public function create(User $user)
    {
        return $user->hasAnyRole(['student','super-admin','professor']);
    }

    public function list(User $user)
    {
        return $user->hasAnyRole(['super-admin', 'control-member','professor']);
    }

    public function findById(User $user)
    {
        return $user->hasAnyRole(['super-admin', 'control-member','professor']);
    }
    public function update(User $user, Like $like = null)
    {
        switch (true) {
            case $user->id === $like->student_id:
                return true;
            default :
                return false;
        }
    }

    public function delete(User $user, Like $like = null)
    {
        switch (true) {
            case $user->id === $like->student_id:
                return true;
            default :
                return false;
        }
    }
}

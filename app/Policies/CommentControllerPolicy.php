<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentControllerPolicy
{
    public function create(User $user, Comment $comment = null)
    {
        switch (true) {
            case $user->hasAnyRole('super-admin'):
            case $user->hasPermissionTo('comment.create'):
                return true;
            default:
                return false;
        }
    }

    public function update(User $user, Comment $comment = null)
    {
        switch (true) {
            case $user->id === $comment->user_id:
                return true;
            default :
                return false;
        }
    }

    public function delete(User $user, Comment $comment = null)
    {
        switch (true) {
            case $user->id === $comment->user_id:
            case $user->hasAnyRole('super-admin'):
                return true;
            default :
                return false;
        }
    }
}

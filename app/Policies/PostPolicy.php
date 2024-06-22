<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class PostPolicy
{
    public function create(User $user, Post $post = null)
    {
        switch (true) {
            case $user->hasAnyRole('super-admin'):
            case $user->hasPermissionTo('Post.create'):
                return true;
            default:
                return false;
        }
    }

    public function update(User $user, Post $post = null)
    {
        switch (true) {
            case $user->id === $post->prof_id:
                return true;
            default :
                return false;
        }
    }

    public function delete(User $user, Post $post = null)
    {
        switch (true) {
            case $user->id === $post->prof_id:
            case $user->hasAnyRole('super-admin'):
                return true;
            default :
                return false;
        }
    }
}

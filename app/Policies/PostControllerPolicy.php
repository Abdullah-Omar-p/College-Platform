<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class PostControllerPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function list(User $user)
    {
        return $user->hasPermissionTo('post-list');
    }
}

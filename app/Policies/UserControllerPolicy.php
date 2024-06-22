<?php

namespace App\Policies;

use App\Models\User;

class UserControllerPolicy
{
    public function list(User $user)
    {
        return $user->hasPermissionTo('User.list');
    }

    public function create(User $user)
    {
        switch (true){
            case $user->hasAnyRole(['super-admin','control-member']):
            case $user->hasPermissionTo('User.create'):
                return true;
            default:
                return false;
        }
    }

    public function findById(User $user)
    {
        return $user->hasPermissionTo('User.find');
    }
    public function update(User $user)
    {
        switch (true){
            case $user->hasPermissionTo('User.update'):
            case $user->hasAnyRole('super-admin'):
                return true;
            default:
                false;
        }
    }

    public function delete(User $user)
    {
        switch (true){
            case $user->hasPermissionTo('User.delete'):
            case $user->hasAnyRole('super-admin'):
                return true;
            default:
                false;
        }
    }
}

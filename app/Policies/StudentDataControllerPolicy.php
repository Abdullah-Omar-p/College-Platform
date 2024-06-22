<?php

namespace App\Policies;

use App\Models\StudentData;
use App\Models\User;

class StudentDataControllerPolicy
{
    public function list(User $user)
    {
        return $user->hasPermissionTo('StudentData.list');
    }

    public function create(User $user)
    {
        switch (true){
            case $user->hasAnyRole('super-admin'):
            case $user->hasPermissionTo('StudentData.create'):
                return true;
            default:
                return false;
        }
    }

    public function findById(User $user)
    {
        return $user->hasPermissionTo('StudentData.find');
    }
    public function update(User $user, StudentData $quiz = null)
    {
        switch (true){
            case $user->hasPermissionTo('StudentData.update'):
            case $user->hasAnyRole('super-admin'):
                return true;
            default:
                false;
        }
    }

    public function delete(User $user, StudentData $quiz = null)
    {
        switch (true){
            case $user->hasPermissionTo('StudentData.delete'):
            case $user->hasAnyRole('super-admin'):
                return true;
            default:
                false;
        }
    }
}

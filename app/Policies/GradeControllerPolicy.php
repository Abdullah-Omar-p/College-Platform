<?php

namespace App\Policies;

use App\Models\Grade;
use App\Models\User;

class GradeControllerPolicy
{
    public function create(User $user)
    {
        switch (true){
            case $user->hasPermissionTo('Grade.create'):
                return true;
            default:
                return false;
        }
    }

    public function studentGrades(User $user)
    {
        return $user->hasAnyRole(['student']);
    }
    public function list(User $user)
    {
        switch (true){
            case $user->hasPermissionTo('Grade.list'):
            case $user->hasAnyRole(['super-admin','control-member','professor']):
                return true;
            default:
                return false;
        }
    }

    public function findById(User $user)
    {
        switch (true){
            case $user->hasPermissionTo('Grade.find'):
            case $user->hasAnyRole(['super-admin','control-member','professor']):
                return true;
            default:
                return false;
        }
    }
    public function update(User $user)
    {
        switch (true){
            case $user->hasPermissionTo('Grade.update'):
            case $user->hasAnyRole(['super-admin','control-member']):
                return true;
            default:
                return false;
        }
    }

    public function delete(User $user)
    {
        switch (true){
            case $user->hasPermissionTo('Grade.delete'):
            case $user->hasAnyRole(['super-admin','control-member']):
                return true;
            default:
                return false;
        }
    }
}

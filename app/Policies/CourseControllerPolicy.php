<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\CourseProf;
use App\Models\User;

class CourseControllerPolicy
{
    public function create(User $user, Course $course = null)
    {
        switch (true) {
            case $user->hasAnyRole('super-admin'):
            case $user->hasAnyRole('professor'):
            case $user->hasPermissionTo('course.create'):
                return true;
            default:
                return false;
        }
    }

    public function update(User $user, Course $course = null)
    {
        return CourseProf::where('course_id', $course->id)
            ->where('prof_id', $user->id)
            ->exists();
    }

    public function delete(User $user, Course $post = null)
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

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'role',
        'phone',
        'national_no',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function data()
    {
        return $this->hasOne(StudentData::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class , 'student_id');
    }

    public function subscribedInCourses()
    {
        return $this->hasMany(CourseStudent::class, 'student_id');
    }

    public function professorCourses()
    {
        return $this->hasMany(CourseProf::class , 'prof_id');
    }

    public function professorQuizzes()
    {
        return $this->hasMany(Quiz::class, 'prof_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function professorPosts()
    {
        return $this->hasMany(Post::class);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}

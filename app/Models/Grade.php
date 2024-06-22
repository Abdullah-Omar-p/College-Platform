<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'student_id',
        'course_id',
        'grade',
        'course_name',
        'level',
        'semester',
    ];

    public function user()
    {
        return $this->belongsToOne(User::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsToOne(Course::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',         
        'name',      
        'description',
        'level',     
        'semester',  
        'units',     
      ];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function subscribedStudents()
    {
        return $this->hasMany(User::class, 'course_student','student_id');
    }

    public function professors()
    {
        return $this->hasMany(User::class, 'course_prof','prof_id');
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}

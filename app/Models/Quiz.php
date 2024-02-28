<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',         
        'name',       
        'description',
        'course_id',  
        'prof_id',    
    ];

    public function questions()
    {
        return $this->hasMany(Quesetion::class);
    }

    public function professor()
    {
        return $this->hasOne(User::class,'prof_id');
    }

    public function students()
    {
        return $this->hasMany(User::class , 'student_quiz', 'student_id');
    }
}

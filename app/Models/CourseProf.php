<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseProf extends Model
{
    use HasFactory;

    protected $table = 'course_prof';
    protected $fillable = [
        'prof_id',
        'course_id',
    ];
}

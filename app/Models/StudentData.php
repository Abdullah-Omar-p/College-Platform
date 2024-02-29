<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentData extends Model
{
    use HasFactory;

    protected $table = 'student_data';

    protected $fillable = [
        'user_id',
        'national_id',
        'phone',
        'address',
        'family_phone',
        'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

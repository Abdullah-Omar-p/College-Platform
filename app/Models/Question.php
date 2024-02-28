<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'choice_1',
        'choice_2',
        'choice_3',
        'choice_4',
        'right_answer',
        'quiz_id',
    ];

    public function quiz()
    {
        return $this->belongsToOne(Quiz::class);
    }

}

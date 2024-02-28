<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
      'id', 
      'student_id',  
      'post_id', 
      'type',
    ];

    public function post ()
    {
        return $this->belongsToOne(Post::class);
    }

    public function user ()
    {
        return $this->belongsToOne(User::class,'student_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',   
        'body',
        'prof_id',
    ];

    public function comments() 
    {
     return $this->hasMany(Comment::class);
    }

    public function author()
    {
        return $this->hasOne(User::class, 'prof_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}

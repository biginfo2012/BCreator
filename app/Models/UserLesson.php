<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'lesson_id',
        'status',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function lesson(){
        return $this->hasOne(Lesson::class, 'id', 'lesson_id');
    }
}

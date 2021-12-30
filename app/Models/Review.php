<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'curriculum_id',
        'lesson_id',
        'thumbnail',
        'detail',
        'slack',
        'order',
        'public_status',
        'user_id',
        'deleted_at'
    ];
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function curriculum(){
        return $this->hasOne(Curriculum::class, 'id', 'curriculum_id');
    }
    public function lesson(){
        return $this->hasOne(Lesson::class, 'id', 'lesson_id');
    }
}

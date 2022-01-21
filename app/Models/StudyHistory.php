<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'type',
        'title',
        'date',
        'curriculum_id',
        'lesson_id',
        'review_id',
        'test_id',
    ];
    public function curriculum(){
        return $this->hasOne(Curriculum::class, 'id', 'curriculum_id');
    }
    public function lesson(){
        return $this->hasOne(Lesson::class, 'id', 'lesson_id');
    }
    public function review(){
        return $this->hasOne(Review::class, 'id', 'review_id');
    }
    public function test(){
        return $this->hasOne(Test::class, 'id', 'test_id');
    }
}

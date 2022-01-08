<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'curriculum_id',
        'thumbnail',
        'detail',
        'slack',
        'time',
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
    public function review(){
        return $this->hasOne(Review::class, 'lesson_id', 'id');
    }
    public function test(){
        return $this->hasOne(Test::class, 'lesson_id', 'id');
    }
}

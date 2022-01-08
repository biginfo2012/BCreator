<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCurriculum extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'curriculum_id',
        'status',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function curriculum(){
        return $this->hasOne(Curriculum::class, 'id', 'curriculum_id');
    }
}

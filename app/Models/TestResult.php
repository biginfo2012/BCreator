<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_id',
        'question_cnt',
        'right_cnt',
        'user_id',
        'diff_time'
    ];
    public function test(){
        return $this->hasOne(Test::class, 'id', 'test_id')->with('curriculum')->with('dt');
    }
}

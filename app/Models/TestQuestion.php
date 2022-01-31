<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'detail_id',
        'question_tag',
    ];
    public function qi(){
        return $this->hasMany(TestQuestionItem::class, 'question_id', 'id');
    }
}

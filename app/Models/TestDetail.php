<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_id',
        'parent_id',
        'title',
        'content',
    ];
    public function question(){
        return $this->hasMany(TestQuestion::class, 'detail_id', 'id')->with('qi');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
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
}

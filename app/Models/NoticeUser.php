<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticeUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'notice_id',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function notice(){
        return $this->hasOne(Notice::class, 'id', 'notice_id');
    }
}

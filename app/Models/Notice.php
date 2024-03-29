<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'detail',
        'public_status',
        'user_id',
        'deleted_at'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function noticeuser(){
        return $this->hasMany(NoticeUser::class, 'notice_id', 'id');
    }
}

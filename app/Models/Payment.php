<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'status',
        'user_id',
        'error',
        'paid_date',
        'payment_id',
        'payment_method'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

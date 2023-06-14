<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderCode()
    {
        return $this->belongsTo(Order::class, 'order_number', 'code');
    }
}

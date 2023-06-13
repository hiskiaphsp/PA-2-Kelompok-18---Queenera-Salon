<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $fillable = [
        'product_name','product_code', 'product_image', 'product_description','product_price','product_stock'
    ];

    public function OrderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_item_id',
        'status',
        'price',
        'payment_method',
        'payment_status',
    ];
    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'total_amount',
        'status',
        'customer_name',
        'customer_email',
        'shipping_address',
        'phone_number',
        'payment_method',
    ];

    /**
     * Sebuah pesanan dimiliki oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Sebuah pesanan memiliki banyak item produk.
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}

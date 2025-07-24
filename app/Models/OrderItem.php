<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    /**
     * Sebuah item pesanan dimiliki oleh satu produk.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Sebuah item pesanan dimiliki oleh satu pesanan.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

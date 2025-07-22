<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    /**
     * Atribut yang bisa diisi secara massal.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'image',
    ];

    /**
     * Mendapatkan produk yang memiliki gambar ini.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

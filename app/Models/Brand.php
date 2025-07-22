<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    /**
     * Atribut yang bisa diisi.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Mendapatkan produk yang dimiliki oleh brand.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

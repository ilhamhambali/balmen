<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'price', 'stock', 'sku', 'image', 'fit_type'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

<?php
// app/Models/Role.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Atribut yang bisa diisi.
     *
     * @var array
     */
    protected $fillable = [
        'nama_peran',
        'deskripsi',
    ];

    /**
     * Sebuah peran bisa dimiliki oleh banyak pengguna.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

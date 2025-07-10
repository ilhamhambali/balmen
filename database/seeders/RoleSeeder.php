<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['nama_peran' => 'admin', 'deskripsi' => 'Akses penuh ke sistem'],
            ['nama_peran' => 'pelanggan', 'deskripsi' => 'Pengguna yang bisa membeli produk'],
        ]);
    }
}

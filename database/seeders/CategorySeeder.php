<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            ['name' => 'Jacket', 'slug' => 'jacket'],
            ['name' => 'Shirt', 'slug' => 'shirt'],
            ['name' => 'T-Shirt', 'slug' => 't-shirt'],
        ]);
    }
}

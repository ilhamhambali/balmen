<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Menggantikan 'title'
        $table->string('slug')->unique();
        $table->text('description'); // Menggantikan 'content'
        $table->decimal('price', 10, 2); // Harga produk
        $table->integer('stock'); // Jumlah stok
        $table->string('sku')->unique()->nullable(); // Stock Keeping Unit
        $table->string('image')->nullable(); // Gambar utama produk
        $table->enum('fit_type', ['regular', 'slim_fit', 'oversize'])->nullable(); // Contoh untuk rekomendasi
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

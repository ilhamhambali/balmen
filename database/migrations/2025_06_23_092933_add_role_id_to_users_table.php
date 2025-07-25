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
    Schema::table('users', function (Blueprint $table) {
        // Menambahkan kolom role_id setelah kolom 'password'
        $table->foreignId('role_id')->nullable()->after('password')->constrained('roles')->onDelete('set null');
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Untuk rollback/undo migrasi
        $table->dropForeign(['role_id']);
        $table->dropColumn('role_id');
    });
}
};

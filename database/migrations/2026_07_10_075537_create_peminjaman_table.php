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
    Schema::create('peminjaman', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')
              ->constrained('users')
              ->cascadeOnDelete();

        $table->foreignId('barang_id')
              ->constrained('barang')
              ->cascadeOnDelete();

        $table->foreignId('peminjam_id')
              ->constrained('peminjam')
              ->cascadeOnDelete();

        $table->enum('status', [
            'pending',
            'approved',
            'returned',
            'rejected'
        ])->default('pending');

        $table->dateTime('tanggal_peminjaman')->nullable();
        $table->dateTime('tanggal_pengembalian')->nullable();

        $table->text('deskripsi')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('peminjaman');
        Schema::enableForeignKeyConstraints();
    }
};

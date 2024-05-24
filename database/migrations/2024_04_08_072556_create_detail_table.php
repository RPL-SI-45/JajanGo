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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu');
            $table->integer('jumlah');
            $table->text('catatan')->nullable();
            $table->date('tanggal_pesanan');
            $table->decimal('harga', 15, 2); // Menggunakan decimal untuk harga, 15 digit total, 2 digit setelah koma

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};

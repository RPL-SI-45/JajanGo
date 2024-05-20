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
        Schema::create('lacakpesanan', function (Blueprint $table) {
            $table->unsignedBigInteger('idPesanan');
            $table->unsignedBigInteger('idPelacakan');
            $table->enum('statusPelacakan', ['makanan telah diterima penjual', 'makanan sedang dibuat', 'makanan siap diambil']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lacakpesanan');
    }
};

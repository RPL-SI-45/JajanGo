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
            $table->string('statusPelacakan');
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
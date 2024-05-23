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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->bigIncrements('idPembayaran');
            $table->unsignedBigInteger('idPesanan');
            $table->string('metodePembayaran');
            $table->date('tanggalPembayaran');
            $table->integer('totalPembayaran');
            $table->string('gambarBuktiPembayaran');
            $table->timestamps();

            $table->foreign('idPesanan')->references('id')->on('pesanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};

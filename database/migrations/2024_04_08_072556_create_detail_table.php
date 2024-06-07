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
            $table->unsignedBigInteger('cart_item_id'); // Foreign key to cart_items table
            $table->integer('jumlah');
            $table->text('catatan')->nullable();
            $table->date('tanggal_pesanan');
            $table->decimal('harga', 15, 2);
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('cart_item_id')->references('id')->on('cart_items')->onDelete('cascade');
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

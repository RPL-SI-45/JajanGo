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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->integer('quantity');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade');
            // Ganti 'daftarmenu' sesuai dengan nama tabel menu yang sesuai
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};

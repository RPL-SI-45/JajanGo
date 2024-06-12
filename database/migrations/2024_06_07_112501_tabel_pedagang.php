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
        Schema::create('pedagang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_toko');
            $table->string('alamat_toko');
            $table->string('no_telepon_pedagang')->unique();
            $table->string('username_pedagang')->unique();
            $table->string('password');
            $table->text('deskripsi_toko')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedagang');
    }

};

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPedagang extends Model
{
    use HasFactory;

    protected $table = 'profilpedagang'; // sesuaikan dengan nama tabel Anda

    protected $fillable = [
        'namaToko',
        'alamatToko',
        'deskripsiToko',
        'gambarToko'
    ];
}
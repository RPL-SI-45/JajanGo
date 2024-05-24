<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekomendasiMakanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaToko', 'namaMakanan', 'harga', 'gambar'
    ];
}

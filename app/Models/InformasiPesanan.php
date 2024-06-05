<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiPesanan extends Model
{
    use HasFactory;
    protected $table = 'informasipesanan';
    protected $fillable = ['namaPesanan', 'tanggalPesanan', 'totalHarga'];
    protected $guarded = ['id'];
}
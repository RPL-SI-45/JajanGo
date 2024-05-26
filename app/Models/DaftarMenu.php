<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarMenu extends Model
{
    use HasFactory;
    
    protected $table = 'menu';
    
    protected $fillable = [
        'namaMenu', 
        'harga', 
        'deskripsiMenu', 
        'kategoriMenu', 
        'gambarMenu', 
        'is_recommended' // tambahkan ini
    ];

    protected $guarded = ['id'];
}

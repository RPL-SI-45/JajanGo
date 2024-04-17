<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuUser extends Model
{
    use HasFactory;
    protected $table = 'menuuser';
    protected $fillable = ['id', 'namaMenu', 'harga', 'DeskripsiMenu', 'gambar', 'kategoriMenu'];
    protected $guarded = ['id'];
}
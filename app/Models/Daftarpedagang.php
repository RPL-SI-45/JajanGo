<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftarpedagang extends Model
{
    use HasFactory;
    protected $table = 'daftarpedagang';
    protected $fillable = ['namaToko', 'alamatToko', 'deskripsiToko'];
    protected $guarded = ['id'];
}

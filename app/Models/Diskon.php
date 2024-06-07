<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    use HasFactory;

    protected $table = 'diskon';
    protected $fillable = ['kodeKupon', 'persentaseDiskon','namaMenu'];
    
    public function daftarMenu()
    {
        return $this->belongsTo(DaftarMenu::class, 'namaMenu', 'namaMenu');
    }

}

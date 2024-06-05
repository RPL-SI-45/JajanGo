<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LacakpesananPedagang extends Model
{
    use HasFactory;
    protected $primaryKey = 'idPelacakan';

    protected $table ='lacakpesanan';

    public $timestamps = false;

    protected $fillable = ['statusPelacakan'];
}

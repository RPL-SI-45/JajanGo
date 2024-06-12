<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Pedagang extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'pedagang'; // Nama tabel yang sesuai

    protected $fillable = [
        'nama_toko', 'alamat_toko', 'no_telepon_pedagang', 'username_pedagang', 'password', 'deskripsi_toko',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

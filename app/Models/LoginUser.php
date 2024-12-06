<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginUser extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'pengguna';

    // Kunci utama tabel
    protected $primaryKey = 'id_pengguna';

    // Kolom yang dapat diisi melalui mass-assignment
    protected $fillable = [
        'nama_pengguna',
        'email',
        'no_telepon',
        'password',
        'foto_profil',
    ];

    // Sembunyikan password saat data model dikonversi ke array atau JSON
    protected $hidden = [
        'password',
    ];
}

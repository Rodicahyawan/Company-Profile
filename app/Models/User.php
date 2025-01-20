<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $fillable = [ // Kolom yg bisa diisi
        'name',
        'email',
        'password',
        'nama_pengguna', 
        'no_telepon', 
        'foto_profil', 
        'alamat'
    ];

    protected $hidden = [ // Menyembunyikan kolom saat data pengguna dikembalikan dalam bentuk JSON atau array
        'password', 
        'remember_token',
    ];

    public function antreans() // Relasi Antrean (One to Many)
    {
        return $this->hasMany(Antrean::class, 'user_id');
    }

    public function ulasan() // Relasi Ulasan (One to Many)
    {
        return $this->hasMany(Ulasan::class, 'user_id');
    }


}

<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'nama_pengguna', 
        'no_telepon', 
        'foto_profil', 
        'alamat'
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function antreans()
    {
        return $this->hasMany(Antrean::class, 'user_id');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'user_id');
    }

}

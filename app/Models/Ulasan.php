<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    // Tentukan kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'user_id', 
        'nama_pasien', 
        'rating', 
        'jenis_layanan', 
        'ulasan'
    ];

    // Relasi antara Ulasan dan User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasan'; // Nama tabel
    protected $primaryKey = 'id_ulasan'; // Primary key
    protected $fillable = [
        'user_id',
        'nama_pasien',
        'rating',
        'jenis_layanan',
        'ulasan',
        'status',
        'layanan_id',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke tabel antrean
    public function antrean()
    {
        return $this->belongsTo(Antrean::class, 'antrean_id', 'id_antrean', 'user_id');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'id_layanan');
    }
        
}

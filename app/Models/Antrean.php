<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrean extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'antrean';
    protected $primaryKey = 'id_antrean';

    // Tentukan kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'user_id',
        'no_antrean',
        'id_antrean',
        'nama_pasien',
        'tanggal_lahir',
        'jenis_kelamin',
        'keluhan',
        'jenis_layanan',
        'tanggal_kedatangan',
        'status_antrean',
        'layanan_id',
        'nik'
    ];

    // Tentukan tipe data untuk beberapa kolom, jika perlu
    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_kedatangan' => 'date',
    ];

    // Relasi dengan model User (User yang membuat antrean)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Jika ingin mengambil status antrean
    public function getStatusAntreanAttribute($value)
    {
        return ucfirst($value);
    }

    // Relasi ke model Layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'id_layanan');
    }

    // Relasi ke model Ulasan
    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'antrean_id');
    }
}

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
        'layanan_id',
        'tanggal_kedatangan',
        'status_antrean',
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
        return ucfirst($value); // Menambahkan format kapitalisasi untuk status
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}

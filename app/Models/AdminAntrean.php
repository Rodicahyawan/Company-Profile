<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAntrean extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'antrean';

    // Tentukan kolom yang dapat diisi (mass assignment)
    protected $fillable = [
        'user_id',
        'id_antrean',
        'no_antrean',
        'nama_pasien',
        'tanggal_lahir',
        'jenis_kelamin',
        'keluhan',
        'layanan_id',
        'tanggal_kedatangan',
        'status_antrean',
        'nik',
    ];

    // Tentukan primary key jika bukan 'id'
    protected $primaryKey = 'id_antrean';

    // Tentukan tipe data primary key jika menggunakan UUID atau tipe lainnya
    protected $keyType = 'int';

    // Nonaktifkan otomatisasi timestamp
    public $timestamps = false;

    // Relasi dengan model Layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'id_layanan'); // Foreign key di tabel antrean & primary key pada tabel layanan
    }  

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Foreign key di tabel antrean
    }
}

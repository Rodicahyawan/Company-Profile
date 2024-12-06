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
        'id_pengguna',
        'id_antrean',
        'no_antrean',
        'nama_pasien',
        'tanggal_lahir',
        'jenis_kelamin',
        'keluhan',
        'jenis_layanan',
        'tanggal_kedatangan',
        'status_antrean',
        'nik',
    ];

    // Tentukan primary key jika bukan 'id'
    protected $primaryKey = 'id_antrean'; // Pastikan menggunakan 'id_antrean' sebagai primary key

    // Tentukan tipe data primary key jika menggunakan UUID atau tipe lainnya
    protected $keyType = 'int'; // Jika menggunakan integer

    public $timestamps = false;  // Nonaktifkan otomatisasi timestamp
}

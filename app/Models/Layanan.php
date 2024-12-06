<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan'; // Nama tabel

    protected $primaryKey = 'id_layanan'; // Tentukan primary key yang digunakan

    // Jika Anda ingin menonaktifkan timestamp
    public $timestamps = false;

    // Daftar kolom yang dapat diisi
    protected $fillable = [
        'jenis_layanan',
        'gambar_utama',
        'deskripsi_singkat',
        'deskripsi_lengkap',
        'gambar_kedua',
        'kapan_dibutuhkan',
    ];
    public function antrean()
    {
        return $this->hasMany(Antrean::class, 'layanan_id');
    }
}

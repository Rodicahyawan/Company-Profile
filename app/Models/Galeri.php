<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    // Definisikan nama tabel jika berbeda dari plural dari nama model
    protected $table = 'galeri';

    // Jika Anda ingin menonaktifkan timestamp
    public $timestamps = false;

    // Definisikan kolom yang dapat diisi
    protected $fillable = [
        'nama_perawatan', 
        'jenis_layanan', 
        'gambar'
    ];

    // Jika id_gambar tidak mengikuti konvensi Laravel, tambahkan:
    protected $primaryKey = 'id_gambar';
}

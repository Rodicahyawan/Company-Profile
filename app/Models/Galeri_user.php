<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri_user extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan oleh model ini
    protected $table = 'galeri'; 

    // Jika ada kolom yang perlu diisi secara massal
    protected $fillable = ['gambar', 'nama_perawatan'];
}
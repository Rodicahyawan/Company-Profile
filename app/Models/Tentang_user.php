<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang_user extends Model
{
    use HasFactory;

    protected $table = 'tentang'; // Nama tabel di database
    protected $fillable = ['gambar', 'keunggulan', 'deskripsi']; // Kolom yang akan digunakan
}


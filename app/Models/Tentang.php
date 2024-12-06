<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    use HasFactory;

    protected $table = 'tentang';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'id_tentang';

    public $timestamps = false; // If your table doesn't use timestamps

    protected $fillable = [
        'keunggulan',
        'deskripsi',
        'gambar'
    ];
}

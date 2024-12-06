<?php

namespace App\Http\Controllers\User;

use App\Models\Galeri_user; // Ubah ke Galeri_user
use App\Http\Controllers\Controller;

class GaleriControllerUser extends Controller
{
    public function index()
    {
        // Mengambil data galeri dengan paginasi 12 item per halaman
        $galeri = Galeri_user::paginate(12); 
        return view('user.galeri', compact('galeri'));
    }
    
    public function homepage()
    {
        // Mengambil data galeri dengan paginasi 6 item
        $galeri = Galeri_user::take(6)->get(); // Ambil 6 item untuk homepage
        
        // Mengirimkan data ke tampilan
        return view('user.homepage', compact('galeri'));  // Pastikan 'galeri' dikirimkan
    }
}


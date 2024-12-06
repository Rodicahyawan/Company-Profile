<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Layanan; 
use App\Models\Galeri_user; // Import model Galeri_user
use Illuminate\Http\Request;

class LayananControllerUser extends Controller
{
    public function index()
    {
        // Ambil data layanan dari database
        $layanan = Layanan::all(); 

        // Kirim data ke view
        return view('user.layanan', compact('layanan'));
    }

    public function show($jenis_layanan)
    {
        // Ambil data layanan berdasarkan jenis_layanan
        $layanan = Layanan::where('jenis_layanan', $jenis_layanan)->first();

        // Jika layanan tidak ditemukan, tampilkan pesan error
        if (!$layanan) {
            return response()->json(['message' => 'Layanan tidak ditemukan'], 404);
        }

        // Kirim data layanan ke view detail_layanan
        return view('user.detail_layanan', compact('layanan'));
    }

    public function homepage()
    {
        // Mengambil 6 layanan untuk ditampilkan di homepage
        $layanan = Layanan::limit(6)->get();

        // Mengambil 6 galeri untuk ditampilkan di homepage
        $galeri = Galeri_user::limit(6)->get();  // Ambil 6 item galeri

        // Mengirimkan data layanan dan galeri ke tampilan homepage
        return view('user.homepage', compact('layanan', 'galeri'));
    }
}

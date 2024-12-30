<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Layanan; 
use App\Models\Galeri_user; // Import model Galeri_user
use Illuminate\Http\Request;
use App\Models\Ulasan;


class LayananControllerUser extends Controller
{
    public function index()
    {
        // Ambil data layanan dari database, kecuali jenis tertentu
        $layanan = Layanan::whereNotIn('jenis_layanan', ['Konsultasi', 'Kontrol', 'Lainnya'])->get(); 

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
        $galeri = Galeri_user::limit(6)->get();

        // Mengambil 6 ulasan terbaru yang statusnya "Ditampilkan"
        $ulasans = Ulasan::with('user') // Relasi dengan tabel user
            ->where('status', 'Ditampilkan') // Menampilkan hanya ulasan yang statusnya Ditampilkan
            ->orderBy('created_at', 'desc') // Urutkan berdasarkan tanggal terbaru
            ->limit(6) // Ambil hanya 6 ulasan
            ->get();

        // Mengirimkan data layanan, galeri, dan ulasan ke tampilan homepage
        return view('user.homepage', compact('layanan', 'galeri', 'ulasans'));
    }

}

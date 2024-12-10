<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;  // Pastikan sudah ada model Ulasan
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function store(Request $request)
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
        }

        // Validasi input
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'nullable|string',
        ]);

        // Menyimpan ulasan ke tabel 'ulasan'
        Ulasan::create([
            'user_id' => Auth::id(),
            'nama_pasien' => Auth::user()->name,
            'rating' => $request->rating,
            'jenis_layanan' => $request->jenis_layanan,
            'ulasan' => $request->ulasan,
            'id_antrean' => $request->id_antrean,
            'status' => 'Disembunyikan', // Tambahkan status default
        ]);

        return redirect()->back()->with('success', 'Ulasan berhasil dikirim!');
    }

}

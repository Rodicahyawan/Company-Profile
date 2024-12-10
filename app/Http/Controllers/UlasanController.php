<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use App\Models\Layanan;  // Pastikan sudah ada model Ulasan
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
            'layanan_id' => 'required|exists:layanan,id_layanan', // Validasi layanan_id
        ]);
    
        // Simpan ulasan ke tabel 'ulasan'
        Ulasan::create([
            'user_id' => Auth::id(),
            'nama_pasien' => Auth::user()->name,
            'rating' => $request->rating,
            'layanan_id' => $request->layanan_id,
            'jenis_layanan' => Layanan::find($request->layanan_id)->jenis_layanan, // Ambil jenis_layanan dari model Layanan
            'ulasan' => $request->ulasan,
            'status' => 'Disembunyikan', // Status default
        ]);
    
        return redirect()->back()->with('success', 'Ulasan berhasil dikirim!');
    }

    public function index()
    {
        $ulasans = Ulasan::with('user') // Mengambil relasi user
            ->where('status', 'Ditampilkan')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.ulasan', compact('ulasans'));
    }


}

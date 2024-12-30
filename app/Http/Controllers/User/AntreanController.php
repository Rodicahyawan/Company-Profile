<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Antrean;
use App\Models\Layanan;
use Carbon\Carbon;

class AntreanController extends Controller
{
    public function index()
    {
        // Ambil daftar layanan dari database
        $layananUtama = Layanan::whereNotIn('jenis_layanan', ['Konsultasi', 'Kontrol', 'Lainnya'])->get();
        $layananTambahan = Layanan::whereIn('jenis_layanan', ['Konsultasi', 'Kontrol', 'Lainnya'])->get();

        // Gabungkan layanan utama dan tambahan, dengan tambahan di bagian bawah
        $layanan = $layananUtama->concat($layananTambahan);

        // Ambil antrean jika diperlukan
        $antreans = Antrean::orderBy('tanggal_kedatangan', 'desc')->paginate(10);
        

        // Kirim data ke view
        return view('user.janji_temu', compact('antreans', 'layanan'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nik' => 'required|string|max:16|unique:antrean,nik,NULL,id,tanggal_kedatangan,' . $request->tanggal_kedatangan,
            'keluhan' => 'nullable|string',
            'layanan_id' => 'required|exists:layanan,id_layanan',
            'tanggal_kedatangan' => 'required|date',
        ]);     

        // Cek apakah sudah ada antrean dengan NIK dan tanggal kedatangan yang sama
        $existingAntrean = Antrean::where('nik', $validated['nik'])
                                ->where('tanggal_kedatangan', $validated['tanggal_kedatangan'])
                                ->exists();

        if ($existingAntrean) {
            return redirect()->back()->withErrors(['error' => 'Antrean dengan NIK dan tanggal kedatangan ini sudah ada.']);
        }

        // Logika nomor antrean
        $antreanCount = Antrean::whereDate('tanggal_kedatangan', $validated['tanggal_kedatangan'])->count();
        $noAntrean = $antreanCount + 1;

        // Batasi antrean maksimum 10 per hari
        if ($antreanCount >= 10) {
            return back()->with('error', 'Maaf, antrean di tanggal ini sudah penuh. Silahkan memilih tanggal lain.');
        }

        // Simpan antrean baru
        Antrean::create([
            'no_antrean' => $noAntrean,
            'nama_pasien' => $validated['nama'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'nik' => $validated['nik'],
            'keluhan' => $validated['keluhan'],
            'layanan_id' => $validated['layanan_id'], // Tambahkan ini
            'tanggal_kedatangan' => $validated['tanggal_kedatangan'],
            'status_antrean' => 'Dalam Antrean',
            'user_id' => auth()->id(),
        ]);
        
        return redirect()->route('user.janjitemu')->with('success', 'Janji temu berhasil dibuat!');
    }

    public function markAsSelesai($id)
    {
        $antrean = Antrean::findOrFail($id);
        $antrean->status_antrean = 'Selesai';
        $antrean->save();

        return redirect()->back()->with('success', 'Layanan telah selesai.');
    }

    public function batalkan($id_antrean)
    {
        // Mencari antrean berdasarkan ID
        $antrean = Antrean::find($id_antrean);

        if ($antrean) {
            // Menghapus antrean
            $antrean->delete();

            // Redirect kembali ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Antrean berhasil dibatalkan');
        }

        // Jika antrean tidak ditemukan, redirect dengan pesan error
        return redirect()->back()->with('error', 'Antrean tidak ditemukan');
    }

}
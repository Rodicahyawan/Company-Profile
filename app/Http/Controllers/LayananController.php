<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Layanan;

class LayananController extends Controller
{
    // Fungsi Insert
    public function index()
    {
        // Mengambil semua data layanan dari model Layanan
        $layanan = Layanan::whereNotIn('jenis_layanan', ['Konsultasi', 'Kontrol', 'Lainnya'])->get();

        // Mengirim data layanan ke view
        return view('admin.layanan_admin', compact('layanan'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis_layanan' => 'required|string|max:100',
            'gambar_utama' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_singkat' => 'required|string|max:255',
            'deskripsi_lengkap' => 'required|string',
            'gambar_kedua' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kapan_dibutuhkan' => 'required|string',
        ]);

        // Proses upload gambar
        $gambarUtamaPath = $request->file('gambar_utama')->store('images', 'public'); //Mengunggah file inputan gambar pertama dan menyimpannya ke folder images dalam penyimpanan publik
        $gambarKeduaPath = $request->file('gambar_kedua')->store('images', 'public');

        // Membuat entri baru di tabel layanan
        Layanan::create([
            'jenis_layanan' => $request->jenis_layanan,
            'gambar_utama' => $gambarUtamaPath,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'deskripsi_lengkap' => $request->deskripsi_lengkap,
            'gambar_kedua' => $gambarKeduaPath,
            'kapan_dibutuhkan' => $request->kapan_dibutuhkan,
        ]);

        return redirect()->back()->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function update(Request $request, $id_layanan)
    {
        // Validasi input
        $request->validate([
            'jenis_layanan' => 'required|string|max:100',
            'gambar_utama' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_singkat' => 'required|string|max:255',
            'deskripsi_lengkap' => 'required|string',
            'gambar_kedua' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'kapan_dibutuhkan' => 'required|string',
        ]);

        // Temukan layanan berdasarkan ID
        $layanan = Layanan::findOrFail($id_layanan);
        $layanan->jenis_layanan = $request->jenis_layanan;

        // Memeriksa dan menghapus gambar utama jika di-upload gambar baru
        if ($request->hasFile('gambar_utama')) { // Mengecek apakah ada file gambar baru yang diunggah
            // Hapus gambar lama jika ada
            if ($layanan->gambar_utama) { // Mengecek apakah data layanan saat ini sudah memiliki gambar utama
                Storage::disk('public')->delete($layanan->gambar_utama); // Menghapus file gambar lama dari penyimpanan
            }
            $layanan->gambar_utama = $request->file('gambar_utama')->store('images', 'public'); // Mengunggah file gambar baru ke direktori images di disk public
        }

        // Memperbarui deskripsi
        $layanan->deskripsi_singkat = $request->deskripsi_singkat; // Mengambil data inputan kemudian disimpan ke properti deskripsi_singkat
        $layanan->deskripsi_lengkap = $request->deskripsi_lengkap;

        // Memeriksa dan menghapus gambar kedua jika di-upload gambar baru
        if ($request->hasFile('gambar_kedua')) {
            // Hapus gambar lama jika ada
            if ($layanan->gambar_kedua) {
                Storage::disk('public')->delete($layanan->gambar_kedua);
            }
            $layanan->gambar_kedua = $request->file('gambar_kedua')->store('images', 'public');
        }

        // Memperbarui kapan dibutuhkan
        $layanan->kapan_dibutuhkan = $request->kapan_dibutuhkan;
        $layanan->save();

        return redirect()->back()->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id); // Mencari data layanan di database berdasarkan $id
    
        // Hapus file gambar dari storage jika ada
        if ($layanan->gambar) { // Memeriksa apakah ada gambar
            $gambarPath = 'public/images/' . $layanan->gambar; // Menentukan path file gambar berdasarkan nama file yang disimpan di database
            
            // Log path gambar yang akan dihapus
            \Log::info('Menghapus gambar: ' . $gambarPath);
            
            // Cek apakah file gambar ada dan hapus
            if (\Storage::exists($gambarPath)) { // Mengecek apakah file gambar benar-benar ada di penyimpanan
                \Storage::delete($gambarPath); // Jika file ditemukan, maka file tersebut dihapus dari penyimpanan
            } else {
                \Log::warning('Gambar tidak ditemukan: ' . $gambarPath);
            }
        }
    
        // Hapus data layanan dari database
        $layanan->delete();
    
        return redirect()->back()->with('success', 'Layanan berhasil dihapus.');
    }
    
}

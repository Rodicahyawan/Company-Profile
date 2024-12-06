<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Layanan;
use Illuminate\Validation\Rule;

class GaleriController extends Controller
{
    public function index()
    {
        // Ambil data dari tabel layanan dan galeri
        $layanan = Layanan::all();
        $galeri = Galeri::paginate(10);

        // Kirim data ke view
        return view('admin.galeri_admin', compact('layanan', 'galeri'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_perawatan' => 'required|string|max:255',
            'jenis_layanan' => [
                'required',
                Rule::in(array_merge(Layanan::pluck('jenis_layanan')->toArray(), ['Lainnya'])), // Tambahkan "Lainnya"
            ],
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar harus diisi dan tipe valid
        ]);

        // Cek apakah ada file yang diunggah
        if ($request->hasFile('gambar')) {
            // Proses upload gambar menggunakan Storage
            $gambarPath = $request->file('gambar')->store('images', 'public'); // Simpan di storage/app/public/images
            
            // Simpan data ke database
            Galeri::create([
                'nama_perawatan' => $request->nama_perawatan,
                'jenis_layanan' => $request->jenis_layanan,
                'gambar' => $gambarPath, // Path gambar yang disimpan
            ]);

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
            } else {
                // Redirect dengan pesan error jika gambar gagal diunggah
                return redirect()->back()->with('error', 'Gagal mengunggah gambar.');
            }
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_perawatan' => 'required|string|max:255',
            'jenis_layanan' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Temukan galeri berdasarkan ID
        $galeri = Galeri::findOrFail($id);

        // Update data
        $galeri->nama_perawatan = $request->nama_perawatan;
        $galeri->jenis_layanan = $request->jenis_layanan;

        // Jika ada gambar baru, simpan dan update path gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($galeri->gambar) {
                Storage::disk('public')->delete($galeri->gambar); // Hapus path lama
            }

            // Simpan gambar baru
            $galeri->gambar = $request->file('gambar')->store('images', 'public');
        }

        // Simpan perubahan
        $galeri->save();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $galeri = Galeri::find($id);
        
        if ($galeri) {
            // Hapus gambar dari penyimpanan jika ada
            if ($galeri->gambar) {
                Storage::disk('public')->delete($galeri->gambar);
            }
            
            // Hapus data dari database
            $galeri->delete();
            
            return redirect()->back()->with('success', 'Galeri berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Galeri tidak ditemukan.');
    }


}


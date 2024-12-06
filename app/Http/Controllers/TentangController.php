<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TentangController extends Controller
{
    public function index()
    {
        $tentang = Tentang::all(); // Mengambil semua data dari tabel 'tentang'
        return view('admin.tentang_admin', compact('tentang')); // Memanggil view 'admin.tentang_admin'
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'keunggulan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar tidak nullable
        ]);

        // Proses upload gambar
        $gambarPath = $request->file('gambar')->store('images', 'public'); // Menyimpan gambar ke 'storage/app/public/images'
        
        // Simpan data tentang ke database
        Tentang::create([
            'keunggulan' => $request->keunggulan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath, // Menyimpan path gambar
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'keunggulan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $tentang = Tentang::find($id);
        $tentang->keunggulan = $request->keunggulan;
        $tentang->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $tentang->gambar = $path;
        }

        $tentang->save();

        return redirect()->route('tentang.index')->with('success', 'Data berhasil diupdate');
    }


    // Fungsi Delete
    public function destroy($id)
    {
        $tentang = Tentang::findOrFail($id);

        // Hapus file gambar dari storage jika ada
        if ($tentang->gambar && \Storage::exists('public/images/' . $tentang->gambar)) {
            \Storage::delete('public/images/' . $tentang->gambar);
        }

        // Hapus data dari database
        $tentang->delete();

        return redirect()->route('tentang.index')->with('success', 'Data berhasil dihapus.');
    }



}


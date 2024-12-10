<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;

class KelolaUlasanController extends Controller
{
    public function index()
    {
        // Ambil data ulasan dengan relasi antrean dan layanan
        $ulasans = Ulasan::with(['antrean.layanan'])->get();

        return view('admin.ulasan_admin', compact('ulasans'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Validasi input (opsional)
        $request->validate([
            'status' => 'required|in:Ditampilkan,Disembunyikan',
        ]);

        // Cari ulasan berdasarkan ID
        $ulasan = Ulasan::findOrFail($id);

        // Update status ulasan
        $ulasan->status = $request->status;
        $ulasan->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Status ulasan berhasil diubah.');
    }

    


}

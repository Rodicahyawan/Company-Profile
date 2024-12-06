<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserManagementController extends Controller
{
    // Method untuk menampilkan data pengguna
    public function index()
    {
        $pengguna = User::all(); // Ambil semua data pengguna
        return view('admin.datauser_admin', compact('pengguna'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diinputkan
        $request->validate([
            'nama_pengguna' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email', // email harus unik
            'no_telepon' => 'nullable|string|max:15',
            'password' => 'required|min:6',
            'alamat' => 'nullable|string|max:255', // Validasi kolom alamat
        ]);

        // Simpan data pengguna baru ke database
        User::create([
            'nama_pengguna' => $request->nama_pengguna,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'password' => bcrypt($request->password), // enkripsi password
            'foto_profil' => $request->file('foto_profil') ? $request->file('foto_profil')->store('profile_images') : null,
            'alamat' => $request->alamat, // Menyimpan alamat
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.datauser.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function getImage($filename)
    {
        $path = storage_path('app/private/profile_images/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }

    public function edit($id)
    {
        $pengguna = User::find($id);
        return response()->json($pengguna); // Mengembalikan data JSON untuk ditampilkan di modal
    }

    

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama_pengguna' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Email harus unik, kecuali milik pengguna ini
            'no_telepon' => 'nullable|string|max:15',
            'password' => 'nullable|min:6',
            'alamat' => 'nullable|string|max:255',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Temukan data pengguna
        $pengguna = User::findOrFail($id);
    
        // Update data pengguna
        $pengguna->nama_pengguna = $request->nama_pengguna;
        $pengguna->email = $request->email;
        $pengguna->no_telepon = $request->no_telepon;
        $pengguna->alamat = $request->alamat;
    
        // Update password jika diisi
        if ($request->filled('password')) {
            $pengguna->password = bcrypt($request->password);
        }
    
        // Update foto profil jika ada
        if ($request->file('foto_profil')) {
            // Hapus file foto profil lama jika ada
            if ($pengguna->foto_profil && \Storage::exists('public/' . $pengguna->foto_profil)) {
                \Storage::delete('public/' . $pengguna->foto_profil);
            }
    
            // Simpan file foto profil baru
            $pengguna->foto_profil = $request->file('foto_profil')->store('profile_images', 'public');
        }
    
        // Simpan data pengguna yang sudah diperbarui
        $pengguna->save();
    
        return redirect()->route('admin.datauser.index')->with('success', 'Pengguna berhasil diperbarui.');
    }
    

    public function destroy($id)
    {
        $pengguna = User::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($pengguna->foto_profil) {
            // Ambil path lengkap foto profil dari database
            $path = 'private/profile_images/' . basename($pengguna->foto_profil);

            // Cek apakah file ada di storage dan hapus
            if (Storage::exists($path)) {
                Storage::delete($path);
            }
        }

        // Hapus data pengguna
        $pengguna->delete();

        return redirect()->route('admin.datauser.index')->with('success', 'Pengguna berhasil dihapus');
    }


}




<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile()
    {
        // Mendapatkan pengguna yang sedang login
        $user = auth()->user();
        $userId = $user->id;
        $tanggalSekarang = today();
        
        // Mendapatkan data antrean yang akan datang (tanggal kedatangan >= sekarang)
        $antrean = Antrean::where('user_id', $userId)
            
            -> where('status_antrean', 'Dalam Antrean')
            ->with('layanan')
            ->get();
        
        // Mendapatkan riwayat antrean yang sudah lewat (tanggal kedatangan < sekarang)
        $historyAntrean = Antrean::where('user_id', $userId)

            -> where('status_antrean', 'Selesai')
            ->with('layanan')
            ->get();

            // dd([$antrean, $historyAntrean]);
        
        // Mengirimkan data pengguna, antrean, dan historyAntrean ke view 'user.profile'
        return view('user.profile', compact('user', 'antrean', 'historyAntrean'));
    }
    
    


    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'nama_pengguna' => 'nullable|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:15',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update data pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->no_telepon = $request->no_telepon;

        // dd($request->file('foto_profil'));

        // Update foto profil jika ada file baru
        if ($request->hasFile('foto_profil')) {
            // Hapus foto profil lama jika ada
            if ($user->foto_profil && Storage::exists($user->foto_profil)) {
                Storage::delete($user->foto_profil);
            }

            // Simpan foto profil baru
            $user->foto_profil = $request->file('foto_profil')->store('profile_pictures', 'public');
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

    
}

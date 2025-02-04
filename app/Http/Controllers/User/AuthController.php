<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User; // Pastikan model Pengguna sudah benar
use Illuminate\Support\Facades\Auth; // Import facade Auth

class AuthController extends Controller
{
    // Fungsi untuk menampilkan form login
    public function showLoginForm()
    {
        return view('user.login_user');
    }

    // Fungsi untuk login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Redirect berdasarkan role
            $user = Auth::user();
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');  
            } else {
                return redirect()->route('user.homepage');  
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Fungsi untuk menampilkan form registrasi
   
    public function showRegisterForm()
    {
        return view('user.signup_user');
    }

    public function register(Request $request)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users', // pastikan menggunakan tabel 'users'
        'phone' => 'required|string|max:15',
        'password' => 'required|string|min:8|confirmed',
        'alamat' => 'nullable|string|max:255',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }


    // Simpan pengguna baru
    $pengguna = User::create([
        'name' => $request->name, // Menggunakan nama yang sesuai dengan field tabel
        'email' => $request->email,
        'no_telepon' => $request->phone,
        'password' => Hash::make($request->password),
        'alamat' => $request->alamat,
    ]);

    Auth::login($pengguna);

    return redirect()->route('user.homepage')->with('success', 'Pendaftaran berhasil! Selamat datang.');
}


public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

 
    
}

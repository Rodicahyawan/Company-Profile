<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin; // Menggunakan model Admin
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
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
            //dd($user->hasRole('admin'));
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');  // Misalnya ke dashboard admin
            } else {
                return redirect()->route('user.homepage');  // Misalnya ke dashboard user
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

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
}

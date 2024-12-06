<?php



namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tentang; // Model yang sesuai dengan tabel tentang
use Illuminate\Http\Request;

class TentangControllerUser extends Controller
{


    public function tentang()
    {
        // Ambil data dari model Tentang
        $firstItem = Tentang::first(); // Ambil item pertama
        $tentangData = Tentang::skip(1)->take(PHP_INT_MAX)->get(); // Ambil sisanya
        // dd($firstItem);

        // Kirim data ke view
        return view('user.tentang', compact('firstItem', 'tentangData'));
    }


}



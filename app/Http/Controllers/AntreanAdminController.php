<?php

namespace App\Http\Controllers;

use App\Models\AdminAntrean;
use App\Models\Antrean;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\User;

class AntreanAdminController extends Controller
{
    // Menampilkan data antrean yang ada
    public function index()
    {
        $antreanHariIni = Antrean::with('layanan') // Tambahkan relasi layanan
            ->whereDate('tanggal_kedatangan', today())
            ->where('status_antrean', 'Dalam Antrean')
            ->get();
    
        $antreanMendatang = Antrean::with('layanan') // Tambahkan relasi layanan
            ->whereDate('tanggal_kedatangan', '>', today())
            ->where('status_antrean', 'Dalam Antrean')
            ->paginate(10);
    
        $antreanSelesai = Antrean::with('layanan') // Tambahkan relasi layanan
            ->where('status_antrean', 'Selesai')
            ->paginate(10);
    
        $pengguna = User::all();
        $layanan = Layanan::all(); // Ambil semua layanan
    
        return view('admin.antrean_admin', compact('antreanHariIni', 'antreanMendatang', 'antreanSelesai', 'pengguna', 'layanan'));
    }
    

    public function dashboard()
{
    // Hitung jumlah untuk dashboard
    $jumlahAntreanHariIni = AdminAntrean::whereDate('tanggal_kedatangan', today())
        ->where('status_antrean', 'Dalam Antrean')
        ->count();

    $jumlahAntreanMendatang = AdminAntrean::whereDate('tanggal_kedatangan', '>', today())
        ->where('status_antrean', 'Dalam Antrean')
        ->count();

    $jumlahAntreanSelesai = AdminAntrean::where('status_antrean', 'Selesai')->count();

    // Hitung jumlah perawatan per bulan
    $perawatanPerBulan = AdminAntrean::selectRaw('MONTH(tanggal_kedatangan) as bulan, COUNT(*) as total')
        ->where('status_antrean', 'Selesai')
        ->groupBy('bulan')
        ->pluck('total', 'bulan')
        ->toArray();

    // Format data untuk 12 bulan
    $perawatanBulanan = [];
    for ($i = 1; $i <= 12; $i++) {
        $perawatanBulanan[] = $perawatanPerBulan[$i] ?? 0; // Jika tidak ada data, isi dengan 0
    }

    // Kirim data ke view
    return view('admin.dashboard_admin', compact(
        'jumlahAntreanHariIni',
        'jumlahAntreanMendatang',
        'jumlahAntreanSelesai',
        'perawatanBulanan'
    ));
}

    // Update status antrean
    public function updateStatus(Request $request)
    {
        $idAntrean = $request->input('id_antrean'); // Mendapatkan id_antrean dari request
        $newStatus = $request->input('status'); // Mendapatkan status baru dari request

        // Ambil data antrean berdasarkan kolom id_antrean
        $antrean = AdminAntrean::where('id_antrean', $idAntrean)->first();

        // Validasi jika data tidak ditemukan
        if (!$antrean) {
            return redirect()->back()->with('error', 'Antrean tidak ditemukan.');
        }

        // Jika status adalah "Dibatalkan", hapus antrean
        if ($newStatus === 'Dibatalkan') {
            $antrean->delete();
            return redirect()->back()->with('success', 'Antrean berhasil dibatalkan dan dihapus.');
        }

        // Update status jika berbeda dan bukan "Dibatalkan"
        if ($antrean->status_antrean !== $newStatus) {
            $antrean->status_antrean = $newStatus;
            $antrean->save();
            return redirect()->back()->with('success', 'Status antrean berhasil diperbarui.');
        }

        // Jika status tidak berubah
        return redirect()->back()->with('info', 'Status tidak berubah.');
    }

    // Menyimpan data antrean baru
    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'id_pengguna' => 'required|integer|exists:pengguna,id_pengguna', // Validasi untuk id_pengguna
            'nik' => 'required|string|max:16',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'keluhan' => 'nullable|string',
            'jenis_layanan' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!Layanan::where('jenis_layanan', $value)->exists() && $value !== 'Lainnya') {
                        $fail('Jenis layanan tidak valid.');
                    }
                },
            ],
            'tanggal_kedatangan' => 'required|date',
        ]);

        // Mengambil nama pasien berdasarkan id_pengguna
        $pengguna = Pengguna::find($request->id_pengguna);
        $namaPasien = $pengguna ? $pengguna->nama_pengguna : 'Nama Tidak Ditemukan';

        // Hitung nomor antrean berdasarkan tanggal kedatangan
        $tanggalKedatangan = $request->tanggal_kedatangan;
        $jumlahAntreanHariIni = AdminAntrean::whereDate('tanggal_kedatangan', $tanggalKedatangan)->count();
        $noAntrean = $jumlahAntreanHariIni + 1;

        // Simpan data ke database
        AdminAntrean::create([
            'id_pengguna' => $request->id_pengguna,
            'no_antrean' => $noAntrean, // Nomor antrean otomatis
            'nama_pasien' => $namaPasien, // Simpan nama pasien berdasarkan id_pengguna
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'keluhan' => $request->keluhan,
            'jenis_layanan' => $request->jenis_layanan,
            'tanggal_kedatangan' => $tanggalKedatangan,
            'status_antrean' => 'Dalam Antrean', // Status otomatis "Dalam Antrean"
            'nik' => $request->nik,
        ]);

        return redirect('/admin/antrean')->with('success', 'Antrean berhasil ditambahkan!');
    }

    // Menampilkan form tambah antrean
    public function create()
    {
        $pengguna = Pengguna::all(); // Ambil semua data pengguna
        return view('admin.tambah-antrean', compact('pengguna'));
    }
}

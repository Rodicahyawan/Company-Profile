<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\User\LayananControllerUser;
use App\Http\Controllers\User\TentangControllerUser;
use App\Http\Controllers\User\GaleriControllerUser;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\AntreanController;
use App\Http\Controllers\AntreanAdminController;
use App\Http\Controllers\ProfileController;

//ROUTE ADMIN
// LOGIN
Route::get('/admin', function () {return view('admin.login_admin');})->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::middleware(['auth', 'check.role:admin'])->group(function () {
        Route::get('/admin/dashboard', [AntreanAdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

        // KELOLA TENTANG
        Route::get('/admin/tentang', [TentangController::class, 'index'])->name('tentang.index');
        Route::post('/admin/tentang', [TentangController::class, 'store'])->name('tentang.store');
        Route::put('/tentang/update/{id}', [TentangController::class, 'update'])->name('tentang.update');
        Route::delete('/tentang/destroy/{id}', [TentangController::class, 'destroy'])->name('tentang.destroy');

        // KELOLA LAYANAN
        Route::get('/admin/layanan', [LayananController::class, 'index'])->name('layanan.index');
        Route::post('/layanan/tambah', [LayananController::class, 'store'])->name('layanan.store');
        Route::put('/layanan/update/{layanan}', [LayananController::class, 'update'])->name('layanan.update');
        Route::put('/layanan/{layanan}', [LayananController::class, 'update'])->name('layanan.update');
        Route::delete('/layanan/destroy/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');

        // KELOLA GALERI
        Route::get('/admin/galeri', [GaleriController::class, 'index'])->name('galeri.index');
        Route::get('/galeri/tambah', [GaleriController::class, 'create'])->name('Galeri.create');
        Route::post('/galeri', [GaleriController::class, 'store'])->name('Galeri.store');
        Route::put('/galeri/{id}', [GaleriController::class, 'update'])->name('Galeri.update');
        Route::delete('/admin/galeri/destroy/{id}', [GaleriController::class, 'destroy'])->name('Galeri.destroy');

        // KELOLA ANTREAN
        Route::get('/admin/antrean', [AntreanAdminController::class, 'index']); // Menampilkan data antrean
        Route::post('/admin/antrean', [AntreanAdminController::class, 'store']); // Menyimpan data antrean
        Route::post('/admin/antrean/update-status', [AntreanAdminController::class, 'updateStatus'])->name('updateStatusAntrean');
        Route::post('/admin/antrean/store', [AntreanAdminController::class, 'store'])->name('antrean.store');
        Route::get('/admin/antrean', [AntreanAdminController::class, 'index'])->name('antrean.index');

        // KELOLA ULASAN
        Route::get('/admin/ulasan', function () {return view('admin.ulasan_admin');});

        // KELOLA DATA PENGUNJUNG
        Route::get('/admin/datauser', [UserManagementController::class, 'index'])->name('admin.datauser.index');
        Route::post('/admin/datauser/store', [UserManagementController::class, 'store'])->name('admin.datauser.store');
        Route::get('/admin/user-image/{filename}', [UserManagementController::class, 'getImage'])->name('admin.user-image');
        Route::get('/admin/datauser/edit/{id}', [UserManagementController::class, 'edit'])->name('admin.datauser.edit');
        
        Route::put('/admin/datauser/update/{id}', [UserManagementController::class, 'update'])->name('admin.datauser.update');
        Route::delete('/admin/datauser/{id}', [UserManagementController::class, 'destroy'])->name('admin.datauser.destroy');
    });

//ROUTE USER (PENGUNJUNG)


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

//contoh Halaman yang boleh diakses jika login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('user.profil');
  
    // Memperbarui data profil
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/antrean/{id_antrean}/batalkan', [AntreanController::class, 'batalkan'])->name('antrean.batalkan');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/janji-temu', [AntreanController::class, 'store'])->name('user.janjiTemu.store');
    Route::get('/janji-temu', [AntreanController::class, 'index'])->name('user.janjiTemu.index');
    Route::get('/janji-temu', [AntreanController::class, 'index'])->name('user.janjitemu');



});

Route::get('/layanan', function () {return view('user.layanan');});
Route::get('/layanan', [LayananControllerUser::class, 'index'])->name('layanan.index');
Route::get('/layanan/{jenis_layanan}', [LayananControllerUser::class, 'show'])->name('layanan.show');


Route::get('/tentang', [TentangControllerUser::class, 'index']);
Route::get('/tentang', [TentangControllerUser::class, 'tentang'])->name('user.tentang');

Route::get('/kontak', function () {
    return view('user.kontak'); // Pastikan ini sesuai dengan path ke view Anda
})->name('user.kontak'); // Menambahkan nama route
Route::get('/galeri', function () {
    return view('user.galeri');
})->name('user.galeri');

Route::get('/galeri', [GaleriControllerUser::class, 'index'])->name('user.galeri');
Route::get('/register', function () {
    return view('user.signup_user');
});

Route::get('/ulasan', function () {
    return view('user.ulasan');
})->name('user.ulasan');
Route::get('/homepage', [LayananControllerUser::class, 'homepage'])->name('user.homepage');



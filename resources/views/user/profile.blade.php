<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS dan dependensi (Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/user/profile.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar/Header -->
    @include('user.layout')

    <!-- Overlay untuk menu popup -->
    <div class="overlay"></div>

    <script>
        function toggleMenu() {
            const navMenu = document.querySelector('.nav-menu');
            const overlay = document.querySelector('.overlay');
            
            navMenu.classList.toggle('show');
            overlay.style.display = overlay.style.display === 'block' ? 'none' : 'block';
        }
        
        // Tutup menu saat overlay diklik
        document.querySelector('.overlay').addEventListener('click', () => {
            document.querySelector('.nav-menu').classList.remove('show');
            document.querySelector('.overlay').style.display = 'none';
        });
    </script>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        
    <!-- Judul -->
    <div class="judul d-flex justify-content-between align-items-center">
        <h3>Akun Saya</h3>
    </div>

    <!-- Section Account Information Card -->
    <div class="account-info-card">
        <!-- Profile Icon -->
        <div class="profile-avatar">
            <span class="icon-user-avatar">
                @if ($user->foto_profil) <!-- Mengeck apakah user memiliki foto profil yang tersimpan di db -->
                    <img 
                        src="{{ Storage::url($user->foto_profil) }}" 
                        alt="User Avatar" 
                        class="user-avatar-img"> <!-- Jika ada, maka diambil dan ditampilkan -->
                @else <!-- Jika tidak ada maka yg ditampilkan adalah icon default -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="user-avatar-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M22 12c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2s10 4.477 10 10" opacity="0.5"/>
                        <path fill="currentColor" d="M16.807 19.011A8.46 8.46 0 0 1 12 20.5a8.46 8.46 0 0 1-4.807-1.489c-.604-.415-.862-1.205-.51-1.848C7.41 15.83 8.91 15 12 15s4.59.83 5.318 2.163c.35.643.093 1.433-.511 1.848M12 12a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/>
                    </svg>
                @endif
            </span>
        </div>  
        <!-- Account Information -->
        <div class="account-details">
            <h4 class="account-username fw-bold">{{ $user->name }}</h4>
            <p class="account-email">{{ $user->email }}</p>
            <p class="account-phone">{{ $user->no_telepon }}</p>
        </div>
        <!-- Button Section edit & logout -->
        <div class="button-section ms-auto">
            <button class="btn edit-button" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                <span class="icon-edit-pen me-2"></span>
                Edit Profil
            </button>
                <button class="btn logout-button" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <span class="solar--logout-2-outline me-2"></span>
                    Logout
                </button>
        </div>
    </div>

    <!-- Modal Logout-->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin logout akun?
                </div>
                <div class="modal-footer">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Profil -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         @method('PUT') 
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $user->alamat) }}">
                        </div>
                        <div class="mb-3">
                            <label for="no_telepon" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ old('no_telepon', $user->no_telepon) }}">
                        </div>
                        <div class="mb-3">
                            <label for="foto_profil" class="form-label">Foto Profil</label>
                            <input type="file" class="form-control" id="foto_profil" name="foto_profil">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="main-container"> <!-- kontainer utama yang berisi 2 tab -->
        <div class="frame frame-1 active" onclick="showContent('content-jadwal', this)"> <!-- tab pertama yg secara default aktif -->
            <span class="menu-text jadwal-saya active-text">Jadwal Saya</span>
        </div>
        <div class="frame frame-2" onclick="showContent('content-histori', this)">
            <span class="menu-text histori">Histori</span>
        </div>
    </div>

    <!-- Content Sections -->
    <div id="content-jadwal" class="content">
        <!-- Jadwal Saya Card -->
        @if($antrean->isEmpty())
        <p>Saat ini anda belum mempunyai janji temu</p>
    @else
        @foreach($antrean as $item)
        <div class="jadwal-card">
            <div class="card-details">
                <span class="date-info">{{ \Carbon\Carbon::parse($item->tanggal_kedatangan)->translatedFormat('l, d F Y') }}</span>
                <span class="patient-info">Nama Pasien: {{ $item->nama_pasien }}</span>
                <span class="service-info">Layanan: {{ $item->layanan->jenis_layanan }}</span>
                <span class="queue-info">
                    No Antrean: {{ $item->no_antrean }}
                </span>
            </div>
            <div class="card-actions">
                <!-- Tombol Aksi -->
                <button class="cancel-button" data-bs-toggle="modal" data-bs-target="#batalkanModal{{ $item->id_antrean }}">
                    <span class="button-text-large">Batalkan</span>
                </button>
                <button class="done-button" data-bs-toggle="modal" data-bs-target="#selesaiModal{{ $item->id_antrean }}">
                    <span class="button-text-large-5">Selesai</span>
                </button>
            </div>
        </div>

        <!-- Modal Konvirmasi Selesai -->
        <div class="modal fade" id="selesaiModal{{ $item->id_antrean }}" tabindex="-1" aria-labelledby="selesaiModalLabel{{ $item->id_antrean }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="selesaiModalLabel{{ $item->id_antrean }}">Konfirmasi Layanan Selesai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin layanan untuk pasien <strong>{{ $item->nama_pasien }}</strong> pada tanggal 
                        <strong>{{ \Carbon\Carbon::parse($item->tanggal_kedatangan)->translatedFormat('l, d F Y') }}</strong> telah selesai dilakukan?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('antrean.selesai', $item->id_antrean) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-primary">Ya, Selesai</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Modal Batalkan Antrean -->
        <div class="modal fade" id="batalkanModal{{ $item->id_antrean }}" tabindex="-1" aria-labelledby="batalkanModalLabel{{ $item->id_antrean }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="batalkanModalLabel{{ $item->id_antrean }}">Konfirmasi Pembatalan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin membatalkan antrean untuk pasien <strong>{{ $item->nama_pasien }}</strong> pada tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal_kedatangan)->translatedFormat('l, d F Y') }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('antrean.batalkan', $item->id_antrean) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Batalkan</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        
    </div>

    <div id="content-histori" class="content">
        @if($historyAntrean->isNotEmpty())
            @foreach($historyAntrean as $item)
            <div class="jadwal-card">
                <div class="card-details">
                    <span class="date-info">{{ \Carbon\Carbon::parse($item->tanggal_kedatangan)->translatedFormat('l, d F Y') }}</span>
                    <span class="patient-info">Nama Pasien: {{ $item->nama_pasien }}</span>
                    <span class="service-info">Layanan: {{ $item->layanan->jenis_layanan }}</span>
                    <span class="queue-info">
                        No Antrean: {{ $item->no_antrean }}
                    </span>
                </div>
                <div class="card-actions">
                    <!-- Tombol untuk membuka modal -->
                    <button type="button" class="cancel-button" data-bs-toggle="modal" data-bs-target="#beriUlasanModal-{{ $item->id }}">
                        <span class="button-text-large">Beri Ulasan</span>
                    </button>
                </div>
            </div>
            
            <!-- Modal untuk Beri Ulasan -->
            <div class="modal fade" id="beriUlasanModal-{{ $item->id }}" tabindex="-1" aria-labelledby="beriUlasanModalLabel-{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="beriUlasanModalLabel-{{ $item->id }}">Beri Ulasan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('ulasan.store') }}" method="POST">
                                @csrf
                                <!-- Input tersembunyi untuk Layanan ID dan Antrean ID -->
                                <input type="hidden" name="layanan_id" value="{{ $item->layanan->id_layanan }}">
                                <!-- Rating -->
                                <div class="mb-3">
                                    <label for="rating" class="form-label">Rating</label>
                                    <div class="stars">
                                        <input type="radio" name="rating" id="star5-{{ $item->id }}" value="5">
                                        <label for="star5-{{ $item->id }}" class="star">&#9733;</label>
                                        <input type="radio" name="rating" id="star4-{{ $item->id }}" value="4">
                                        <label for="star4-{{ $item->id }}" class="star">&#9733;</label>
                                        <input type="radio" name="rating" id="star3-{{ $item->id }}" value="3">
                                        <label for="star3-{{ $item->id }}" class="star">&#9733;</label>
                                        <input type="radio" name="rating" id="star2-{{ $item->id }}" value="2">
                                        <label for="star2-{{ $item->id }}" class="star">&#9733;</label>
                                        <input type="radio" name="rating" id="star1-{{ $item->id }}" value="1">
                                        <label for="star1-{{ $item->id }}" class="star">&#9733;</label>
                                    </div>
                                </div>

                                <!-- Ulasan -->
                                <div class="mb-3">
                                    <label for="ulasan-{{ $item->id }}" class="form-label">Ulasan</label>
                                    <textarea class="form-control" id="ulasan-{{ $item->id }}" name="ulasan" rows="4">{{ old('ulasan') }}</textarea>
                                </div>

                                <!-- Footer Modal -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <p>Belum ada riwayat layanan</p>
        @endif
    </div>

    <script>
        // Event ini dipicu saat seluruh konten HTML selesai dimuat
        document.addEventListener("DOMContentLoaded", function() {
            // Set default active content on page load
            const defaultActiveFrame = document.querySelector('.frame-1');
            const defaultActiveText = document.querySelector('.jadwal-saya');
            const defaultActiveContent = document.querySelector('#content-jadwal');

            // Ensure the default content is active
            if (defaultActiveFrame) defaultActiveFrame.classList.add('active');
            if (defaultActiveText) defaultActiveText.classList.add('active-text');
            if (defaultActiveContent) defaultActiveContent.classList.add('active-content');
        });


        function showContent(contentId, element) {
            // Remove 'active' class from all frames
            const frames = document.querySelectorAll('.frame');
            frames.forEach(frame => frame.classList.remove('active'));

            // Remove 'active-text' class from all menu text
            const menuTexts = document.querySelectorAll('.menu-text');
            menuTexts.forEach(text => text.classList.remove('active-text'));

            // Add 'active' class to the clicked frame
            element.classList.add('active');

            // Add 'active-text' class to the clicked menu text
            const textElement = element.querySelector('.menu-text');
            if (textElement) {
                textElement.classList.add('active-text');
            }

            // Hide all content
            const contents = document.querySelectorAll('.content');
            contents.forEach(content => content.classList.remove('active-content'));

            // Show the selected content
            const selectedContent = document.getElementById(contentId);
            if (selectedContent) {
                selectedContent.classList.add('active-content');
            }
        }
    </script>
    
    <!-- Footer -->
    <div class="footer">
        <span class="footer-title">Praktik Dokter Gigi Dwi Imbang Lestari</span>
        <div class="footer-content">
            <div class="section alamat-praktik">
                <span class="section-title">Alamat Praktik</span>
                <span class="section-info">
                    <a href="https://www.google.com/maps/place/drg.+Dwi+Imbang+Lestari/@-7.6590723,109.1503525,15z/data=!4m6!3m5!1s0x2e656b4496cb3b81:0x712b092d3be1c696!8m2!3d-7.6590723!4d109.1503525!16s%2Fg%2F11lg306zsl?entry=ttu&g_ep=EgoyMDI0MTAyMy4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="maps-link">
                        Jl. A. Yani Adipala No.18, Kebonmanis, Adipala, Kec. Adipala, Kabupaten Cilacap, Jawa Tengah 53271
                    </a>
                </span>
            </div>            
            <div class="section layanan">
                <span class="section-title">Layanan</span>
                <div class="section-info layanan-list">
                    <span>Tambal Gigi</span>
                    <span>Cabut Gigi</span>
                    <span>Scaling</span>
                    <span>Perawatan Saluran Akar</span>
                    <span>Pembuatan Gigi Palsu</span>
                    <span>Crown Gigi</span>
                    <span>Pemasangan Behel</span>
                    <span>Fluoride Varnish</span>
                    <span>Perawatan Gigi Anak</span>
                </div>
            </div>
            <div class="section jadwal-kontak">
                <span class="section-title">Jadwal Praktik</span>
                <span class="section-info">Senin - Sabtu<br />15.30 - 19.00 WIB</span>
            
                <div class="kontak-section"> 
                    <div class="section-title">Kontak Kami</div>
                    <div class="section-info">
                        <a href="https://wa.me/62895385103675" target="_blank" class="telephone-link">
                            <span class="logos--whatsapp-icon"></span>0895385103675
                        </a>
                    </div>
                </div>
                
            </div>
                       
            <div class="section ikuti-kami">
                <span class="section-title">Ikuti Kami</span>
                <div class="social-icons">
                    <a href="https://www.instagram.com/drg.dwi_imbang/" target="_blank" class="social-link">
                        <span class="skill-icons--instagram"></span> Instagram
                    </a>
                    <a href="https://www.tiktok.com/@drg.dwi_imbang" target="_blank" class="social-link">
                        <span class="logos--tiktok-icon"></span> TikTok
                    </a>
                </div>
            </div>
                      
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <span>Copyright © 2025 Praktik drg. Dwi Imbang Lestari</span>
    </div>

</body>
</html>

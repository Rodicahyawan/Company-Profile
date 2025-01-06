<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/user/homepage.css') }}">
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
    
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Selamat Datang di Praktik Dokter Gigi Dwi Imbang Lestari</h1>
            <p class="hero-description">
                Kami berkomitmen untuk menjaga kesehatan gigi dan mulut Anda dengan perawatan profesional, nyaman, dan berkualitas. 
                Dapatkan senyuman sehat yang Anda impikan dengan layanan gigi terbaik kami.
            </p>
            <div class="hero-buttons">
                <a href="https://wa.me/62895385103675" class="cta-button primary-button">Hubungi Dokter</a>
                <a href="{{ route('user.janjitemu') }}" class="cta-button secondary-button">Buat Janji Temu</a>
            </div>            
        </div>
        <div class="hero-image">
            <img src="/Aset Gambar/dokter gigi ramah.jpeg" alt="Dokter Gigi Dwi Imbang Lestari">
        </div>
    </div>
    
    <!-- Tentang Kami Section -->
    <div class="about-us-section">
        <div class="about-us-content">
            <div class="about-us-image">
                <img src="/Aset Gambar/smile.jpg" alt="Perawatan Gigi">
            </div>
            <div class="about-us-text">
                <h2 class="about-us-title">Senyum Indah Dimulai dari Perawatan yang Tepat</h2>
                <p class="about-us-description">
                    Kami percaya bahwa kesehatan gigi dan mulut yang terjaga berawal dari perawatan yang tepat dan profesional. 
                    Telah dipercaya selama 10 tahun, kami menyediakan layanan perawatan gigi lengkap untuk menjaga kesehatan gigi dan mulut Anda, mendukung kenyamanan dan kepercayaan diri dalam setiap aktivitas.
                </p>
                <a href="{{ route('user.tentang') }}" class="tentang button-tentang">Tentang Kami</a>
            </div>
        </div>
    </div>

    <!-- Judul -->
    <div class="judul">
        <h3>Layanan Kami</h3>
        <a href="{{ route('layanan.index') }}" class="lihat-semua-button">Lihat Semua</a>
    </div>


    <!-- Card -->
    <div class="container-custom">
        <div class="card-container">
            @foreach($layanan as $item)
                <a href="{{ route('layanan.show', ['jenis_layanan' => $item->jenis_layanan]) }}" class="card-link">
                    <div class="card">
                        <img src="{{ asset('storage/' . $item->gambar_utama) }}" class="card-img-top" alt="{{ $item->jenis_layanan }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->jenis_layanan }}</h5>
                            <p class="card-text">{{ $item->deskripsi_singkat }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Judul -->
    <div class="judul">
        <h3>Galeri Perawatan</h3>
        <a href="{{ route('user.galeri') }}" class="lihat-semua-button">Lihat Semua</a>
    </div>

    <!-- Galeri Gambar -->
    <div class="gallery-wrapper">
    <div class="gallery-container">
        @foreach($galeri as $item)
            <div class="gallery-card">
                <div class="gallery-image" style="background-image: url('{{ asset('storage/' . $item->gambar) }}');"></div>
                <p class="gallery-caption">{{ $item->nama_perawatan }}</p>
            </div>
        @endforeach
    </div>
</div>


    <!-- Judul -->
    <div class="judul">
        <h3>Ulasan Pasien</h3>
        <a href="{{ route('user.ulasan') }}" class="lihat-semua-button">Lihat Semua</a>
    </div>

    <div class="review-card-container">
    @foreach ($ulasans as $ulasan)
        <a class="review-card-link">
            <div class="review-card">
                <div class="review-card-body">
                    <div class="profile-section">
                        @php
                            // Ambil foto profil berdasarkan relasi user di tabel ulasan
                            $userProfile = $ulasan->user->foto_profil ?? 'default-profile.png'; 
                        @endphp

                        @if (!empty($userProfile) && file_exists(storage_path('app/public/' . $userProfile)))
                            <img src="{{ asset('storage/' . $userProfile) }}" alt="Foto Profil" class="profile-icon">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="user-avatar-icon" viewBox="0 0 24 24" preserveAspectRatio="none">
                                <path fill="currentColor" d="M22 12c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2s10 4.477 10 10" opacity="0.5"/>
                                <path fill="currentColor" d="M16.807 19.011A8.46 8.46 0 0 1 12 20.5a8.46 8.46 0 0 1-4.807-1.489c-.604-.415-.862-1.205-.51-1.848C7.41 15.83 8.91 15 12 15s4.59.83 5.318 2.163c.35.643.093 1.433-.511 1.848M12 12a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/>
                            </svg>
                        @endif

                        <div class="profile-info">
                            <p class="username">{{ $ulasan->nama_pasien }}</p>
                            <div class="rating">
                                @for ($i = 0; $i < $ulasan->rating; $i++)
                                    <span class="emojione--star"></span> <!-- Bintang penuh -->
                                @endfor
                            </div>
                        </div>
                    </div>
                    <h5 class="jenis-layanan">{{ $ulasan->jenis_layanan }}</h5>
                    <p class="review-card-text">{{ $ulasan->ulasan }}</p>
                </div>
            </div>
        </a>
    @endforeach
</div>
    
    <!-- Call to Action -->
    <div class="cta-section">
        <div class="cta-content">
            <p class="cta-text">Jaga kesehatan gigi Anda dengan rutin ke dokter gigi minimal 6 bulan sekali!</p>  
            <div class="cta-buttons">
                <a href="https://wa.me/62895385103675" class="cta-button primary-button" target="_blank" rel="noopener noreferrer">Hubungi Dokter</a>
                <a href="{{ route('user.janjitemu') }}" class="cta-button secondary-button">Buat Janji Temu</a>
            </div>
        </div>
    </div>

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

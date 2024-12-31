<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/user/kontak.css') }}">
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
        
    <!-- Judul -->
    <div class="judul">
        <h3>Kontak Kami</h3>
    </div>

    <!-- Contact Cards Section -->
    <div class="container mt-4 d-flex justify-content-around flex-wrap">
        <div class="card contact-card p-4 text-center">
            <h5 class="title">Konsultasi WhatsApp</h5>
            <div class="image-circle mx-auto" style="background-image: url('/Aset Gambar/contact.jpg');"></div>
            <p class="phone">+62 895-3851-03675</p>
            <a href="https://api.whatsapp.com/send/?phone=62895385103675&text&type=phone_number&app_absent=0" target="_blank" class="btn btn-primary visit-btn">Klik untuk Mengunjungi</a>
        </div>
        <div class="card contact-card p-4 text-center">
            <h5 class="title">Instagram</h5>
            <div class="image-circle mx-auto" style="background-image: url('/Aset Gambar/contact.jpg');"></div>
            <p class="phone">@drg.dwi_imbang</p>
            <a href="https://www.instagram.com/drg.dwi_imbang/" target="_blank" class="btn btn-primary visit-btn">Klik untuk Mengunjungi</a>
        </div>
        <div class="card contact-card p-4 text-center">
            <h5 class="title">TikTok</h5>
            <div class="image-circle mx-auto" style="background-image: url('/Aset Gambar/contact.jpg');"></div>
            <p class="phone">@drg.dwi_imbang</p>
            <a href="https://www.tiktok.com/@drg.dwi_imbang" target="_blank" class="btn btn-primary visit-btn">Klik untuk Mengunjungi</a>
        </div>
    </div>

    <!-- Judul -->
    <div class="judul">
        <h3>Lokasi / Google Maps</h3>
    </div>

    <!-- Alamat Praktik -->
    <div class="alamat-kami">
        <p>
            Jl. A. Yani Adipala No.18, Kebonmanis, Adipala, Kec. Adipala, Kabupaten Cilacap, Jawa Tengah 53271
        </p>
    </div>

    <!-- Google Maps Embed -->
    <div class="google-maps-container">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1977.3791823678287!2d109.1505671!3d-7.6584343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e656b4496cb3b81%3A0x712b092d3be1c696!2sdrg.%20Dwi%20Imbang%20Lestari!5e0!3m2!1sen!2sid!4v1698780928244!5m2!1sen!2sid" 
            class="google-maps-iframe"
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
    
    <!-- Call to Action -->
    <div class="cta-section">
        <div class="cta-content">
            <p class="cta-text">Jaga kesehatan gigi Anda dengan rutin ke dokter gigi minimal 6 bulan sekali!</p>  
            <div class="cta-buttons">
                <a href="https://api.whatsapp.com/send/?phone=62895385103675&text&type=phone_number&app_absent=0" class="cta-button primary-button">Hubungi Dokter</a>
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
                        <a href="https://api.whatsapp.com/send/?phone=62895385103675&text&type=phone_number&app_absent=0" target="_blank" class="telephone-link">
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

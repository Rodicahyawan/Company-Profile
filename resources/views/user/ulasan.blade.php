<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/user/ulasan.css') }}">
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
        <h3>Ulasan Pasien</h3>
    </div>

    <!-- Card -->
    <div class="container-custom">
        <div class="review-card-container">
            <a class="review-card-link">
                <div class="review-card">
                    <div class="review-card-body">
                        <div class="profile-section">
                            <span class="mingcute--user-4-fill profile-icon"></span>
                            <div class="profile-info">
                                <p class="username">Angkasa Yudistira</p>
                                <div class="rating">
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                </div>
                            </div>
                        </div>
                        <h5 class="jenis-layanan">Cabut Gigi</h5>
                        <p class="review-card-text">Pelayanan tambal gigi di klinik ini sangat memuaskan! Dokternya ramah dan profesional, menjelaskan setiap prosedur dengan jelas, sehingga saya merasa nyaman dan tenang. Hasil tambalan gigi pun rapi dan tidak terasa sakit sama sekali.</p>
                    </div>
                </div>
            </a>
            <a class="review-card-link">
                <div class="review-card">
                    <div class="review-card-body">
                        <div class="profile-section">
                            <span class="mingcute--user-4-fill profile-icon"></span>
                            <div class="profile-info">
                                <p class="username">Angkasa Yudistira</p>
                                <div class="rating">
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                </div>
                            </div>
                        </div>
                        <h5 class="jenis-layanan">Cabut Gigi</h5>
                        <p class="review-card-text">Pelayanan tambal gigi di klinik ini sangat memuaskan! Dokternya ramah dan profesional, menjelaskan setiap prosedur dengan jelas, sehingga saya merasa nyaman dan tenang. Hasil tambalan gigi pun rapi dan tidak terasa sakit sama sekali.</p>
                    </div>
                </div>
            </a><a class="review-card-link">
                <div class="review-card">
                    <div class="review-card-body">
                        <div class="profile-section">
                            <span class="mingcute--user-4-fill profile-icon"></span>
                            <div class="profile-info">
                                <p class="username">Angkasa Yudistira</p>
                                <div class="rating">
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                </div>
                            </div>
                        </div>
                        <h5 class="jenis-layanan">Cabut Gigi</h5>
                        <p class="review-card-text">Pelayanan tambal gigi di klinik ini sangat memuaskan! Dokternya ramah dan profesional, menjelaskan setiap prosedur dengan jelas, sehingga saya merasa nyaman dan tenang. Hasil tambalan gigi pun rapi dan tidak terasa sakit sama sekali.</p>
                    </div>
                </div>
            </a>
            </a><a class="review-card-link">
                <div class="review-card">
                    <div class="review-card-body">
                        <div class="profile-section">
                            <span class="mingcute--user-4-fill profile-icon"></span>
                            <div class="profile-info">
                                <p class="username">Angkasa Yudistira</p>
                                <div class="rating">
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                </div>
                            </div>
                        </div>
                        <h5 class="jenis-layanan">Cabut Gigi</h5>
                        <p class="review-card-text">Pelayanan tambal gigi di klinik ini sangat memuaskan! Dokternya ramah dan profesional, menjelaskan setiap prosedur dengan jelas, sehingga saya merasa nyaman dan tenang. Hasil tambalan gigi pun rapi dan tidak terasa sakit sama sekali.</p>
                    </div>
                </div>
            </a></a><a class="review-card-link">
                <div class="review-card">
                    <div class="review-card-body">
                        <div class="profile-section">
                            <span class="mingcute--user-4-fill profile-icon"></span>
                            <div class="profile-info">
                                <p class="username">Angkasa Yudistira</p>
                                <div class="rating">
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                </div>
                            </div>
                        </div>
                        <h5 class="jenis-layanan">Cabut Gigi</h5>
                        <p class="review-card-text">Pelayanan tambal gigi di klinik ini sangat memuaskan! Dokternya ramah dan profesional, menjelaskan setiap prosedur dengan jelas, sehingga saya merasa nyaman dan tenang. Hasil tambalan gigi pun rapi dan tidak terasa sakit sama sekali.</p>
                    </div>
                </div>
            </a></a><a class="review-card-link">
                <div class="review-card">
                    <div class="review-card-body">
                        <div class="profile-section">
                            <span class="mingcute--user-4-fill profile-icon"></span>
                            <div class="profile-info">
                                <p class="username">Angkasa Yudistira</p>
                                <div class="rating">
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                    <span class="emojione--star"></span>
                                </div>
                            </div>
                        </div>
                        <h5 class="jenis-layanan">Cabut Gigi</h5>
                        <p class="review-card-text">Pelayanan tambal gigi di klinik ini sangat memuaskan! Dokternya ramah dan profesional, menjelaskan setiap prosedur dengan jelas, sehingga saya merasa nyaman dan tenang. Hasil tambalan gigi pun rapi dan tidak terasa sakit sama sekali.</p>
                    </div>
                </div>
            </a>
            <!-- Ulangi untuk card ulasan lainnya -->
        </div>
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
        <span>© 2024 Rodi Cahyawan</span>
    </div>


    


</body>
</html>

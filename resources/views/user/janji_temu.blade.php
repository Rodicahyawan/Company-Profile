<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Janji Temu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/user/janji_temu.css') }}">
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
        <h3>Buat Janji Temu</h3>
    </div>

    <div class="container mt-3">
    <!-- Error from withErrors -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

</div>
    
    <!-- Appointment Section -->
    <div class="appointment-section">
        <form action="{{ route('user.janjiTemu.store') }}" method="post" class="appointment-form-container">
            @csrf
            <!-- Jadwal Praktik -->
            <div class="schedule">
                <h4>Jadwal Praktik</h4>
                <img src="/Aset Gambar/jadwal_illustrasi.png" alt="Jadwal Illustrasi" class="schedule-image">
                <ul>
                    <li><span>Senin:</span> <span>15.30 - 19.00 WIB</span></li>
                    <li><span>Selasa:</span> <span>15.30 - 19.00 WIB</span></li>
                    <li><span>Rabu:</span> <span>15.30 - 19.00 WIB</span></li>
                    <li><span>Kamis:</span> <span>15.30 - 19.00 WIB</span></li>
                    <li><span>Jumat:</span> <span>15.30 - 19.00 WIB</span></li>
                    <li><span>Sabtu:</span> <span>15.30 - 19.00 WIB</span></li>
                </ul>
            </div>

            <!-- Form Pendaftaran -->
            <div class="appointment-form">
                <h4>Form Pendaftaran</h4>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan nama lengkap pasien" required>
                </div>
                <div class="form-group d-flex">
                    <div class="col-md-5">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
                    </div>
                    <div class="col-md-5 ml-3">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nik">NIK / No KTP</label>
                    <input type="text" id="nik" name="nik" class="form-control" placeholder="Masukan NIK pasien" required>
                </div>
                <div class="form-group">
                    <label for="keluhan">Masalah atau Keluhan</label>
                    <input type="text" id="keluhan" name="keluhan" class="form-control" placeholder="Jelaskan masalah atau keluhan yang dirasakan" required>
                </div>
                <div class="form-group">
                    <label for="layanan">Jenis Layanan</label>
                    <select id="layanan" name="layanan_id" class="form-control" required>
                        <option value="" disabled selected>Pilih jenis layanan</option>
                        @foreach($layanan as $item)
                            <option value="{{ $item->id_layanan }}">{{ $item->jenis_layanan }}</option>
                        @endforeach
                    </select>                    
                </div>
                <div class="form-group">
                    <label for="tanggal_kedatangan">Tanggal Kedatangan</label>
                    <input type="date" id="tanggal_kedatangan" name="tanggal_kedatangan" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Kirim</button>
            </div>
        </form>
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

    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const successMessage = "{{ session('success') }}";
            const alertBox = document.createElement('div');
            alertBox.className = 'alert alert-success custom-alert';
            alertBox.innerHTML = `<strong>Success!</strong> ${successMessage} 
                                  <button class="btn-close" onclick="this.parentElement.style.display='none';">&times;</button>`;
            document.body.appendChild(alertBox);
        });
    </script>
@endif

@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const errorMessage = "{{ session('error') }}";
            const alertBox = document.createElement('div');
            alertBox.className = 'alert alert-danger custom-alert';
            alertBox.innerHTML = `<strong>Error!</strong> ${errorMessage} 
                                  <button class="btn-close" onclick="this.parentElement.style.display='none';">&times;</button>`;
            document.body.appendChild(alertBox);
        });
    </script>
@endif

</body>
</html>
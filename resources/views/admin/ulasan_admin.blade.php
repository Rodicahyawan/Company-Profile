<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Ulasan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/ulasan_admin.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-fluid d-flex flex-column flex-md-row p-0">
        <!-- Sidebar -->
        <div class="sidebar bg-sidebar d-flex flex-column p-4">
            <h2 class="text-white sidebar-title">drg. Dwi Imbang Lestari</h2>
            <hr class="sidebar-divider"> <!-- Thin line after the name -->
            <span class="menu-label">Menu</span> <!-- "Menu" label -->
            <ul class="nav flex-column mt-4">
                <li class="nav-item">
                    <a href="{{ url('/admin/dashboard') }}" class="nav-link">
                        <span class="ri--dashboard-fill"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/tentang') }}" class="nav-link">
                        <span class="mdi--about"></span>
                        <span>Tentang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/layanan') }}" class="nav-link">
                        <span class="vaadin--dental-chair"></span>
                        <span>Layanan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/galeri') }}" class="nav-link">
                        <span class="f7--photo"></span>
                        <span>Galeri</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/antrean') }}" class="nav-link">
                        <span class="mdi--human-queue"></span>
                        <span>Antrean</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/ulasan') }}" class="nav-link active">
                        <span class="ic--round-rate-review"></span>
                        <span>Ulasan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/datauser') }}" class="nav-link">
                        <span class="fa-solid--users"></span>
                        <span>Data Pengguna</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <span class="solar--logout-2-bold"></span>
                        <span>Log Out</span>
                    </a>
                </li>
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
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <form action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
        
        <!-- Header -->
        <div class="content bg-main p-4 flex-grow-1">
            <div class="header bg-white shadow-sm p-3 mb-4 d-flex align-items-center">
                <div class="user-info text-start" style="padding-right: 20px;">
                    <span class="welcome d-block">Selamat Datang 👋</span>
                    <span class="role">Administrator</span>
                </div>
            </div>

            <!-- Main Content -->
            <!-- judul & searchbar -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3>Ulasan Pasien</h3>
            </div>

            <!-- Searchbar -->
            <div class="mb-3 search-wrapper">
                <span class="uil--search"></span>
                <input id="searchInput" type="text" class="form-control" placeholder="Cari ulasan">
            </div>
        
            <!-- Tabel Ulasan -->
            <div class="table-responsive-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Ulasan</th>
                        <th>ID Pengguna</th>
                        <th>Nama Pasien</th>
                        <th>Rating</th>
                        <th>Jenis Layanan</th>
                        <th>Ulasan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ulasans as $ulasan) <!-- mengiterasi setiap data ulasan yang ada dalam koleksi $ulasans -->
                        <tr>
                            <td>{{ $ulasan->id_ulasan }}</td>
                            <td>{{ $ulasan->user_id }}</td>
                            <td>{{ $ulasan->nama_pasien }}</td>
                            <td>
                                <div class="rating"> <!-- Menampilkan bintang sesuai dengan nilai rating dari ulasan -->
                                    @for ($i = 1; $i <= 5; $i++) 
                                        <span class="{{ $i <= $ulasan->rating ? 'line-md--star-filled' : 'line-md--star-empty' }}"></span>
                                    @endfor
                                </div>
                            </td>
                            <td>{{ $ulasan->jenis_layanan ?? 'Tidak Tersedia' }}</td> <!-- Menampilkan jenis layanan dari ulasan -->
                            <td>{{ $ulasan->ulasan }}</td> <!-- Menampilkan deskripsi ulasan -->
                            <td> <!-- Tombol pemicu modal edit status ulasan -->
                            <button class="btn-tampilkan-ulasan" data-bs-toggle="modal" data-bs-target="#editStatusModal-{{ $ulasan->id_ulasan }}" 
                                style="background-color: {{ $ulasan->status === 'Disembunyikan' ? '#FF8A00' : '#009A0F' }};">
                                {{ $ulasan->status }}
                            </button>

                            <!-- Modal untuk edit status -->
                            <div class="modal fade" id="editStatusModal-{{ $ulasan->id_ulasan }}" tabindex="-1" aria-labelledby="editStatusLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editStatusLabel">Edit Status Ulasan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="{{ route('ulasan.updateStatus', $ulasan->id_ulasan) }}"> <!-- Mengarahkan ke route ulasan.updateStatus dengan ID ulasan yang akan diperbarui -->
                                            @csrf
                                            <div class="modal-body">
                                                <p>Pilih status untuk ulasan ini:</p>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" value="Ditampilkan" 
                                                        id="tampilkan-{{ $ulasan->id_ulasan }}" {{ $ulasan->status === 'Ditampilkan' ? 'checked' : '' }}> <!-- Jika status dari ulasan saat ini sama dengan "Ditampilkan", maka atribut checked akan ditambahkan -->
                                                    <label class="form-check-label" for="tampilkan-{{ $ulasan->id_ulasan }}">
                                                        Tampilkan Ulasan
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" value="Disembunyikan" 
                                                        id="sembunyikan-{{ $ulasan->id_ulasan }}" {{ $ulasan->status === 'Disembunyikan' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="sembunyikan-{{ $ulasan->id_ulasan }}">
                                                        Sembunyikan Ulasan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const searchInput = document.getElementById('searchInput'); // mengetik kata kunci pencarian
                    const table = document.querySelector('.table tbody'); // Data yang akan dicari berada di dalam elemen ini
                    
                    searchInput.addEventListener('input', function() {
                        const searchTerm = searchInput.value.toLowerCase(); // Mengambil Nilai Pencarian
                        const rows = table.getElementsByTagName('tr'); // Mengambil semua elemen baris dalam body 

                        for (let i = 0; i < rows.length; i++) { // Iterasi setiap baris di dalam tabel untuk memeriksa apakah kata kunci cocok
                            const cells = rows[i].getElementsByTagName('td'); // Mengambil semua elemen cell dalam baris
                            let found = false;

                            for (let j = 0; j < cells.length; j++) { 
                                const cell = cells[j];
                                if (cell.textContent.toLowerCase().includes(searchTerm)) { // Mengecek apakah teks dalam cell mengandung kata kunci
                                    found = true;
                                    break;
                                }
                            }

                            rows[i].style.display = found ? '' : 'none'; // Menampilkan baris jika kata kunci cocock dan Menyembunyikan baris yang tidak mengandung kata kunci pencarian
                        }
                    });
                });
            </script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

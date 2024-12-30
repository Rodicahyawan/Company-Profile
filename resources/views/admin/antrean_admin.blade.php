<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Antrean</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/antrean_admin.css') }}">
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
                    <a href="{{ url('/admin/antrean') }}" class="nav-link active">
                        <span class="mdi--human-queue"></span>
                        <span>Antrean</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/ulasan') }}" class="nav-link">
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
            <!-- Table Antrean Hari Ini -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3>Antrean Hari Ini</h3>
                <button class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#tambahAntreanModal">
                    Tambah
                </button>
            </div>

            <div class="mb-3 search-wrapper">
                <span class="uil--search"></span>
                <input type="text" class="form-control" id="searchInput" placeholder="Cari antrean">
            </div>

            <div class="table-responsive-wrapper">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Pengguna</th>
                            <th>ID Antrean</th>
                            <th>No Antrean</th>
                            <th>Nama Pasien</th>
                            <th>NIK</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Keluhan</th>
                            <th>Jenis Layanan</th>
                            <th>Tanggal Kedatangan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($antreanHariIni->isEmpty())
                            <tr>
                                <td colspan="11" class="text-center">Tidak ada data</td>
                            </tr>
                        @else
                            @foreach($antreanHariIni as $antrean)
                                <tr>
                                    <td>{{ $antrean->user_id }}</td>
                                    <td>{{ $antrean->id_antrean }}</td>
                                    <td>{{ $antrean->no_antrean }}</td>
                                    <td>{{ $antrean->nama_pasien }}</td>
                                    <td>{{ $antrean->nik }}</td>
                                    <td>{{ \Carbon\Carbon::parse($antrean->tanggal_lahir)->format('d/m/Y') }}</td>
                                    <td>{{ $antrean->jenis_kelamin }}</td>
                                    <td>{{ $antrean->keluhan }}</td>
                                    <td>{{ $antrean->layanan->jenis_layanan}}</td>
                                    <td>{{ \Carbon\Carbon::parse($antrean->tanggal_kedatangan)->format('d/m/Y') }}</td>
                                    <td>
                                        <!-- Status Button -->
                                        <form action="{{ route('updateStatusAntrean') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="id_antrean" value="{{ $antrean->id_antrean }}">
                                            <div class="dropdown">
                                                <button type="button" class="status-button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{ $antrean->status_antrean }}
                                                    <span class="mingcute--down-line"></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                                    <li>
                                                        <button type="submit" name="status" value="Dalam Antrean" class="dropdown-item">
                                                            Dalam Antrean
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="submit" name="status" value="Selesai" class="dropdown-item">
                                                            Selesai
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="submit" name="status" value="Dibatalkan" class="dropdown-item text-danger">
                                                            Dibatalkan
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Search -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const searchInput = document.getElementById('searchInput'); // Ambil elemen input pencarian
                    const table = document.querySelector('.table tbody'); // Pilih tbody dari tabel
                    
                    searchInput.addEventListener('input', function() {
                        const searchTerm = searchInput.value.toLowerCase(); // Ambil nilai pencarian dan ubah menjadi huruf kecil
                        const rows = table.getElementsByTagName('tr'); // Ambil semua baris dalam tabel

                        // Loop melalui baris dan sembunyikan yang tidak cocok dengan kata kunci pencarian
                        for (let i = 0; i < rows.length; i++) {
                            const cells = rows[i].getElementsByTagName('td'); // Ambil semua sel dalam baris
                            let found = false; // Flag untuk memeriksa apakah kata kunci ditemukan dalam baris

                            // Loop melalui sel untuk memeriksa apakah ada sel yang mengandung kata kunci pencarian
                            for (let j = 0; j < cells.length; j++) {
                                const cell = cells[j];
                                if (cell.textContent.toLowerCase().includes(searchTerm)) {
                                    found = true; // Set flag menjadi true jika ditemukan
                                    break; // Keluar dari loop jika ditemukan
                                }
                            }

                            // Ubah visibilitas baris berdasarkan hasil pencarian
                            if (found) {
                                rows[i].style.display = ''; // Tampilkan baris
                            } else {
                                rows[i].style.display = 'none'; // Sembunyikan baris
                            }
                        }
                    });
                });
            </script>

            <br><br><br>

            <!-- Table Antrean Mendatang -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3>Antrean Mendatang</h3>
                <button class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#tambahAntreanModal">
                    Tambah
                </button>
            </div>
            <div class="mb-3 search-wrapper">
                <span class="uil--search"></span>
                <input type="text" class="form-control" id="searchInputMendatang" placeholder="Cari antrean">
            </div>
            <div class="table-responsive-wrapper">
                <table class="table" id="tableAntreanMendatang">
                    <thead>
                        <tr>
                            <th>ID Pengguna</th>
                            <th>ID Antrean</th>
                            <th>No Antrean</th>
                            <th>Nama Pasien</th>
                            <th>NIK</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Keluhan</th>
                            <th>Jenis Layanan</th>
                            <th>Tanggal Kedatangan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($antreanMendatang->isEmpty())
                            <tr>
                                <td colspan="11" class="text-center">Tidak ada data</td>
                            </tr>
                        @else
                            @foreach($antreanMendatang as $antrean)
                                <tr>
                                    <td>{{ $antrean->user_id }}</td>
                                    <td>{{ $antrean->id_antrean }}</td>
                                    <td>{{ $antrean->no_antrean }}</td>
                                    <td>{{ $antrean->nama_pasien }}</td>
                                    <td>{{ $antrean->nik }}</td>
                                    <td>{{ \Carbon\Carbon::parse($antrean->tanggal_lahir)->format('d/m/Y') }}</td>
                                    <td>{{ $antrean->jenis_kelamin }}</td>
                                    <td>{{ $antrean->keluhan }}</td>
                                    <td>{{ $antrean->layanan->jenis_layanan }}</td>
                                    <td>{{ \Carbon\Carbon::parse($antrean->tanggal_kedatangan)->format('d/m/Y') }}</td>
                                    <td>
                                        <form action="{{ route('updateStatusAntrean') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="id_antrean" value="{{ $antrean->id_antrean }}">
                                            <div class="dropdown">
                                                <button type="button" class="status-button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{ $antrean->status_antrean }}
                                                    <span class="mingcute--down-line"></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                                    <li>
                                                        <button type="submit" name="status" value="Dalam Antrean" class="dropdown-item">
                                                            Dalam Antrean
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="submit" name="status" value="Selesai" class="dropdown-item">
                                                            Selesai
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button type="submit" name="status" value="Dibatalkan" class="dropdown-item text-danger">
                                                            Dibatalkan
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $antreanMendatang->links('pagination::bootstrap-4') }} <!-- Menggunakan tampilan pagination Bootstrap -->
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const searchInputHariIni = document.getElementById('searchInput');
                    const tableHariIni = document.querySelector('.table tbody');

                    const searchInputMendatang = document.getElementById('searchInputMendatang');
                    const tableMendatang = document.querySelector('#tableAntreanMendatang tbody');

                    // Fungsi Pencarian Umum
                    function searchTable(inputElement, tableBody) {
                        const searchTerm = inputElement.value.toLowerCase();
                        const rows = tableBody.getElementsByTagName('tr');

                        for (let i = 0; i < rows.length; i++) {
                            const cells = rows[i].getElementsByTagName('td');
                            let found = false;

                            for (let j = 0; j < cells.length; j++) {
                                const cell = cells[j];
                                if (cell.textContent.toLowerCase().includes(searchTerm)) {
                                    found = true;
                                    break;
                                }
                            }

                            rows[i].style.display = found ? '' : 'none';
                        }
                    }

                    // Event Listener untuk Antrean Hari Ini
                    searchInputHariIni.addEventListener('input', function() {
                        searchTable(searchInputHariIni, tableHariIni);
                    });

                    // Event Listener untuk Antrean Mendatang
                    searchInputMendatang.addEventListener('input', function() {
                        searchTable(searchInputMendatang, tableMendatang);
                    });
                });
            </script>
            
            <br><br><br>

            <!-- Table Histori / Layanan Selesai -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3>Histori / Layanan Selesai</h3>
            </div>
            <div class="mb-3 search-wrapper">
                <span class="uil--search"></span>
                <input type="text" class="form-control" id="searchHistoriInput" placeholder="Cari data">
            </div>
            <div class="table-responsive-wrapper">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Antrean</th>
                            <th>Nama Pasien</th>
                            <th>NIK</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Keluhan</th>
                            <th>Jenis Layanan</th>
                            <th>Tanggal Kedatangan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="historiTableBody">
                        @foreach($antreanSelesai as $antrean)
                            <tr>
                                <td>{{ $antrean->id_antrean }}</td>
                                <td>{{ $antrean->nama_pasien }}</td>
                                <td>{{ $antrean->nik }}</td>
                                <td>{{ \Carbon\Carbon::parse($antrean->tanggal_lahir)->format('d/m/Y') }}</td>
                                <td>{{ $antrean->jenis_kelamin }}</td>
                                <td>{{ $antrean->keluhan }}</td>
                                <td>{{ $antrean->layanan->jenis_layanan }}</td>
                                <td>{{ \Carbon\Carbon::parse($antrean->tanggal_kedatangan)->format('d/m/Y') }}</td>
                                <td>
                                    <button class="status-button-selesai">
                                        {{ $antrean->status_antrean }}
                                        <span class="mingcute--down-line"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $antreanSelesai->links('pagination::bootstrap-4') }} <!-- Menggunakan tampilan pagination Bootstrap -->
            </div>

            <!-- Search Script -->
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const searchHistoriInput = document.getElementById('searchHistoriInput'); // Input pencarian histori
                    const historiTableBody = document.getElementById('historiTableBody'); // Tbody tabel histori

                    searchHistoriInput.addEventListener('input', function () {
                        const searchTerm = searchHistoriInput.value.toLowerCase(); // Ambil kata kunci
                        const rows = historiTableBody.getElementsByTagName('tr'); // Ambil semua baris di tabel histori

                        for (let i = 0; i < rows.length; i++) {
                            const cells = rows[i].getElementsByTagName('td'); // Ambil semua sel di baris
                            let found = false; // Flag pencarian

                            for (let j = 0; j < cells.length; j++) {
                                const cell = cells[j];
                                if (cell.textContent.toLowerCase().includes(searchTerm)) {
                                    found = true; // Kata kunci ditemukan
                                    break;
                                }
                            }

                            // Tampilkan/sembunyikan baris berdasarkan hasil pencarian
                            rows[i].style.display = found ? '' : 'none';
                        }
                    });
                });
            </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

    <!-- Modal Form Tambah Antrean -->
    <div class="modal fade" id="tambahAntreanModal" tabindex="-1" aria-labelledby="tambahAntreanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahAntreanModalLabel">Tambah Data Antrean</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formTambahAntrean" action="{{ route('antrean.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Nama Pasien</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                <option value="">-- Pilih Pasien --</option>
                                @foreach ($pengguna as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }} (ID: {{ $user->id }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" maxlength="16" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="keluhan" class="form-label">Keluhan</label>
                            <textarea class="form-control" id="keluhan" name="keluhan"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
                            <select class="form-control" id="jenis_layanan" name="layanan_id" required>
                                <option value="">-- Pilih Layanan --</option>
                                @foreach ($layanan as $item)
                                    <option value="{{ $item->id_layanan }}">{{ $item->jenis_layanan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_kedatangan" class="form-label">Tanggal Kedatangan</label>
                            <input type="date" class="form-control" id="tanggal_kedatangan" name="tanggal_kedatangan" required>
                        </div>
                        <!-- Kolom Status Antrean dihapus karena otomatis "Dalam Antrean" -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

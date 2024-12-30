<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Galeri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/galeri_admin.css') }}">
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
                    <a href="{{ url('/admin/galeri') }}" class="nav-link active">
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
                        <a href="{{ url('/logout') }}" class="btn btn-danger">Logout</a> <!-- Tautan logout -->
                    </div>
                </div>
            </div>
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
                <h3>Galeri Perawatan</h3>
                <button class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#tambahGaleriModal">
                    Tambah
                </button>
            </div>
            <div class="mb-3 search-wrapper">
                <span class="uil--search"></span>
                <input type="text" class="form-control" id="searchInput" placeholder="Cari galeri">
            </div>
        
           
            <!-- Table -->
            <div class="table-responsive-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Gambar</th>
                        <th>Nama Perawatan</th>
                        <th>Jenis Layanan</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($galeri as $item)
                        <tr>
                            <td>{{ $item->id_gambar }}</td>
                            <td>{{ $item->nama_perawatan }}</td>
                            <td>{{ $item->jenis_layanan }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->gambar) }}" style="width: 100px; height: auto;">
                            </td>
                            <td>
                                <a href="#" class="text-success" data-bs-toggle="modal" data-bs-target="#editGaleriModal" onclick="editGaleri({{ $item }})">
                                    <span class="iconamoon--edit"></span>
                                </a>
                                <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#deleteGaleriModal" onclick="setDeleteGaleri({{ $item->id_gambar }})">
                                    <span class="fluent--delete-20-regular"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $galeri->links('pagination::bootstrap-4') }} <!-- Menggunakan tampilan pagination Bootstrap -->
            </div>


                <!-- Modal Tambah Galeri -->
                <div class="modal fade" id="tambahGaleriModal" tabindex="-1" aria-labelledby="tambahGaleriModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('Galeri.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahGaleriModalLabel">Tambah Galeri</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nama_perawatan" class="form-label">Nama Perawatan</label>
                                        <input type="text" class="form-control" id="nama_perawatan" name="nama_perawatan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
                                        <select class="form-control" id="jenis_layanan" name="jenis_layanan" required>
                                            <option value="">Pilih Jenis Layanan</option>
                                            @foreach ($layanan as $item)
                                                <option value="{{ $item->jenis_layanan }}">{{ $item->jenis_layanan }}</option>
                                            @endforeach
                                            <option value="Lainnya">Lainnya</option> <!-- Tambahkan opsi ini -->
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label">Gambar</label>
                                        <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal Edit Galeri -->
                <div class="modal fade" id="editGaleriModal" tabindex="-1" aria-labelledby="editGaleriModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('Galeri.update', '') }}" method="POST" id="editGaleriForm" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editGaleriModalLabel">Edit Galeri</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="edit_id_gambar" name="id_gambar">
                                    <div class="mb-3">
                                        <label for="edit_nama_perawatan" class="form-label">Nama Perawatan</label>
                                        <input type="text" class="form-control" id="edit_nama_perawatan" name="nama_perawatan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_jenis_layanan" class="form-label">Jenis Layanan</label>
                                        <select class="form-control" id="edit_jenis_layanan" name="jenis_layanan" required>
                                            <option value="">Pilih Jenis Layanan</option>
                                            <option value="Tambal Gigi">Tambal Gigi</option>
                                            <option value="Cabut Gigi">Cabut Gigi</option>
                                            <option value="Scaling">Scaling</option>
                                            <option value="Perawatan Saluran Akar">Perawatan Saluran Akar</option>
                                            <option value="Pembuatan Gigi Palsu">Pembuatan Gigi Palsu</option>
                                            <option value="Crown Gigi">Crown Gigi</option>
                                            <option value="Pemasangan Behel">Pemasangan Behel</option>
                                            <option value="Fluoride Varnish">Fluoride Varnish</option>
                                            <option value="Perawatan Gigi Anak">Perawatan Gigi Anak</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    <div class="mb-3">
                                        <label for="edit_gambar" class="form-label">Gambar</label>
                                        <input type="file" class="form-control" id="edit_gambar" name="gambar">
                                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function editGaleri(item) {
                // Set the form action URL
                const form = document.getElementById('editGaleriForm');
                form.action = form.action + '/' + item.id_gambar;

                // Fill the modal fields with data
                document.getElementById('edit_id_gambar').value = item.id_gambar;
                document.getElementById('edit_nama_perawatan').value = item.nama_perawatan;
                document.getElementById('edit_jenis_layanan').value = item.jenis_layanan;
            }
        </script>

                <!-- Modal Konfirmasi Hapus Galeri -->
                <div class="modal fade" id="deleteGaleriModal" tabindex="-1" aria-labelledby="deleteGaleriModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteGaleriModalLabel">Konfirmasi Hapus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus galeri ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <!-- Form penghapusan -->
                                <form action="{{ route('Galeri.destroy', ['id' => 0]) }}" method="POST" id="deleteGaleriForm">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id_gambar" id="delete_id_gambar">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function setDeleteGaleri(id_gambar) {
                        // Set the ID gambar yang akan dihapus ke dalam form
                        document.getElementById('delete_id_gambar').value = id_gambar;

                        // Set form action sesuai ID
                        const form = document.getElementById('deleteGaleriForm');
                        form.action = "{{ url('admin/galeri/destroy') }}/" + id_gambar;
                    }
                </script>

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
</body>
</html>

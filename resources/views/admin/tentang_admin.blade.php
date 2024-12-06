<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Tentang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/tentang_admin.css') }}">
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
                    <a href="{{ url('/admin/tentang') }}" class="nav-link active">
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
                    <span class="admin-name d-block">Admin</span>
                    <span class="admin-email">admin101@gmail.com</span>
                </div>
            </div>

            <!-- Main Content -->
            <!-- judul & searchbar -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3>Keunggulan Kami</h3>
                <button class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#tambahTentangModal">
                    Tambah
                </button>
            </div>

            <div class="mb-3 search-wrapper">
                <span class="uil--search"></span>
                <input type="text" class="form-control" id="searchInput" placeholder="Cari keunggulan">
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Tentang</th>
                        <th>Keunggulan</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tentang as $item)
                        <tr>
                            <td>{{ $item->id_tentang }}</td>
                            <td>{{ $item->keunggulan }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                @if ($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" style="width: 100px;">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td>
                                <a href="#" class="text-success" data-bs-toggle="modal" data-bs-target="#editTentangModal" data-id="{{ $item->id_tentang }}" data-keunggulan="{{ $item->keunggulan }}" data-deskripsi="{{ $item->deskripsi }}">
                                    <span class="iconamoon--edit"></span>
                                </a>
                                <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#deleteTentangModal" data-id="{{ $item->id_tentang }}">
                                    <span class="fluent--delete-20-regular"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <!-- Modal Tambah Tentang -->
            <div class="modal fade" id="tambahTentangModal" tabindex="-1" aria-labelledby="tambahTentangModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('tentang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahTentangModalLabel">Tambah Tentang</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="keunggulan" class="form-label">Keunggulan</label>
                                    <input type="text" class="form-control" id="keunggulan" name="keunggulan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
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

            <!-- Modal Edit Tentang -->
            <div class="modal fade" id="editTentangModal" tabindex="-1" aria-labelledby="editTentangModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('tentang.update', ['id' => 0]) }}" method="POST" enctype="multipart/form-data" id="editForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editTentangModalLabel">Edit Tentang</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="editKeunggulan" class="form-label">Keunggulan</label>
                                    <input type="text" class="form-control" id="editKeunggulan" name="keunggulan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editDeskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="editDeskripsi" name="deskripsi" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="editGambar" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" id="editGambar" name="gambar" accept="image/*">
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

            <script>
                var editModal = document.getElementById('editTentangModal');
                editModal.addEventListener('show.bs.modal', function (event) {
                    // Tombol yang memicu modal
                    var button = event.relatedTarget;
                    // Ambil data dari atribut data-* tombol
                    var id = button.getAttribute('data-id');
                    var keunggulan = button.getAttribute('data-keunggulan');
                    var deskripsi = button.getAttribute('data-deskripsi');
                    
                    // Masukkan data ke dalam input form modal
                    var inputKeunggulan = editModal.querySelector('#editKeunggulan');
                    var inputDeskripsi = editModal.querySelector('#editDeskripsi');
                    var editForm = document.getElementById('editForm');

                    inputKeunggulan.value = keunggulan;
                    inputDeskripsi.value = deskripsi;

                    // Ubah action form untuk mengarahkan ke route update dengan ID yang sesuai
                    editForm.action = '/tentang/update/' + id;
                });
            </script>



            <!-- Modal Konfirmasi Hapus -->
            <div class="modal fade" id="deleteTentangModal" tabindex="-1" aria-labelledby="deleteTentangModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteTentangModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <!-- Form penghapusan -->
                            <form action="{{ route('tentang.destroy', ['id' => 0]) }}" method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id_tentang" id="deleteId">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                var deleteModal = document.getElementById('deleteTentangModal');
                deleteModal.addEventListener('show.bs.modal', function (event) {
                    // Ambil tombol yang memicu modal
                    var button = event.relatedTarget;
                    // Ambil data-id dari tombol delete
                    var TentangId = button.getAttribute('data-id');
                    // Masukkan data-id ke dalam input hidden di modal
                    var inputId = deleteModal.querySelector('#deleteId');
                    inputId.value = TentangId;

                    // Ubah action form sesuai dengan ID layanan
                    var deleteForm = document.getElementById('deleteForm');
                    deleteForm.action = '/tentang/destroy/' + TentangId;
                });
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
            
            <!-- JS Bootstrap -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

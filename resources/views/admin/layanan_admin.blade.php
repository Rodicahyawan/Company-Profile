<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Layanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/layanan_admin.css') }}">
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
                    <a href="{{ url('/admin/layanan') }}" class="nav-link active">
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
                <h3>Layanan Kami</h3>
                <button class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#addServiceModal">Tambah</button>
            </div>
            
            <div class="mb-3 search-wrapper">
                <span class="uil--search"></span>
                <input type="text" class="form-control" id="searchInput" placeholder="Cari layanan">
            </div>
                     
            <!-- Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Layanan</th>
                        <th>Jenis Layanan</th>
                        <th>Gambar Utama</th>
                        <th>Deskripsi Singkat</th>
                        <th>Deskripsi Lengkap</th>
                        <th>Gambar Kedua</th>
                        <th>Kapan Dibutuhkan?</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($layanan as $item) <!-- Pastikan ini menggunakan $layanan -->
                    <tr>
                        <td>{{ $item->id_layanan }}</td>
                        <td>{{ $item->jenis_layanan }}</td>
                        <td><img src="{{ asset('storage/' . $item->gambar_utama) }}" style="width: 100px;"></td>
                        <td class="text-limited">
                            <span class="short-text">{{ Str::limit($item->deskripsi_singkat, 100) }}</span>
                            <span class="more-text" style="display: none;">{{ $item->deskripsi_singkat }}</span>
                            <button class="more-btn">Selengkapnya</button>
                        </td>
                        <td class="text-limited">
                            <span class="short-text">{{ Str::limit($item->deskripsi_lengkap, 100) }}</span>
                            <span class="more-text" style="display: none;">{{ $item->deskripsi_lengkap }}</span>
                            <button class="more-btn">Selengkapnya</button>
                        </td>
                        <td><img src="{{ asset('storage/' . $item->gambar_kedua) }}" style="width: 100px;"></td>
                        <td class="text-limited">
                            <span class="short-text">{{ Str::limit($item->kapan_dibutuhkan, 100) }}</span>
                            <span class="more-text" style="display: none;">{{ $item->kapan_dibutuhkan }}</span>
                            <button class="more-btn">Selengkapnya</button>
                        </td>
                        <td>
                            <a href="#" class="text-success" data-bs-toggle="modal" data-bs-target="#editServiceModal" 
                            data-id="{{ $item->id_layanan }}" 
                            data-jenis="{{ $item->jenis_layanan }}" 
                            data-deskripsi="{{ $item->deskripsi_singkat }}" 
                            data-deskripsi-lengkap="{{ $item->deskripsi_lengkap }}" 
                            data-kapan="{{ $item->kapan_dibutuhkan }}">
                            <span class="iconamoon--edit"></span>
                            </a>
                            <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#deleteServiceModal" data-id="{{ $item->id_layanan }}">
                                <span class="fluent--delete-20-regular"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelectorAll('.more-btn').forEach(button => {
                            button.addEventListener('click', () => {
                                const td = button.closest('.text-limited');
                                const moreText = td.querySelector('.more-text');
                                const shortText = td.querySelector('.short-text');
                                
                                if (moreText.style.display === 'none') {
                                    moreText.style.display = 'inline';
                                    shortText.style.display = 'none';
                                    button.textContent = 'Sembunyikan';
                                    td.style.maxHeight = 'none'; // Menghapus batas tinggi
                                } else {
                                    moreText.style.display = 'none';
                                    shortText.style.display = 'inline';
                                    button.textContent = 'Selengkapnya';
                                    td.style.maxHeight = '4.5em'; // Mengembalikan batas tinggi
                                }
                            });
                        });
                    });
                </script>
            </table>
            
            <!-- Modal Tambah Layanan -->
            <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addServiceModalLabel">Tambah Layanan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
                                    <input type="text" class="form-control" name="jenis_layanan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_utama" class="form-label">Gambar Utama</label>
                                    <input type="file" class="form-control" name="gambar_utama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi_singkat" class="form-label">Deskripsi Singkat</label>
                                    <textarea class="form-control" name="deskripsi_singkat" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi_lengkap" class="form-label">Deskripsi Lengkap</label>
                                    <textarea class="form-control" name="deskripsi_lengkap" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_kedua" class="form-label">Gambar Kedua</label>
                                    <input type="file" class="form-control" name="gambar_kedua" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kapan_dibutuhkan" class="form-label">Kapan Dibutuhkan?</label>
                                    <input type="text" class="form-control" name="kapan_dibutuhkan" required>
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

            <!-- Modal Edit Layanan -->
            <div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('layanan.update', ['layanan' => ':id_layanan']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editServiceModalLabel">Edit Layanan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id_layanan" id="editIdLayanan">
                                <div class="mb-3">
                                    <label for="edit_jenis_layanan" class="form-label">Jenis Layanan</label>
                                    <input type="text" class="form-control" name="jenis_layanan" id="edit_jenis_layanan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_gambar_utama" class="form-label">Gambar Utama</label>
                                    <input type="file" class="form-control" name="gambar_utama">
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_deskripsi_singkat" class="form-label">Deskripsi Singkat</label>
                                    <textarea class="form-control" name="deskripsi_singkat" id="edit_deskripsi_singkat" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_deskripsi_lengkap" class="form-label">Deskripsi Lengkap</label>
                                    <textarea class="form-control" name="deskripsi_lengkap" id="edit_deskripsi_lengkap" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_gambar_kedua" class="form-label">Gambar Kedua</label>
                                    <input type="file" class="form-control" name="gambar_kedua">
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_kapan_dibutuhkan" class="form-label">Kapan Dibutuhkan?</label>
                                    <textarea type="text" class="form-control" name="kapan_dibutuhkan" id="edit_kapan_dibutuhkan" required></textarea>
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
                // Event listener for the edit link
                document.addEventListener('DOMContentLoaded', function() {
                    const editServiceModal = document.getElementById('editServiceModal');
                    
                    editServiceModal.addEventListener('show.bs.modal', function(event) {
                        const button = event.relatedTarget; // Button that triggered the modal
                        const id = button.getAttribute('data-id');
                        const jenis = button.getAttribute('data-jenis');
                        const deskripsi = button.getAttribute('data-deskripsi');
                        const deskripsiLengkap = button.getAttribute('data-deskripsi-lengkap');
                        const kapan = button.getAttribute('data-kapan');
                        
                        // Update the modal's content
                        const editIdLayanan = document.getElementById('editIdLayanan');
                        const editJenisLayanan = document.getElementById('edit_jenis_layanan');
                        const editDeskripsiSingkat = document.getElementById('edit_deskripsi_singkat');
                        const editDeskripsiLengkap = document.getElementById('edit_deskripsi_lengkap');
                        const editKapanDibutuhkan = document.getElementById('edit_kapan_dibutuhkan');

                        editIdLayanan.value = id;
                        editJenisLayanan.value = jenis;
                        editDeskripsiSingkat.value = deskripsi;
                        editDeskripsiLengkap.value = deskripsiLengkap;
                        editKapanDibutuhkan.value = kapan;

                        // Update the form action URL
                        const form = editServiceModal.querySelector('form');
                        form.action = form.action.replace(':id', id);
                    });
                });
            </script>

            <!-- Modal Konfirmasi Hapus -->
            <div class="modal fade" id="deleteServiceModal" tabindex="-1" aria-labelledby="deleteServiceModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteServiceModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus layanan ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <!-- Form penghapusan -->
                            <form action="{{ route('layanan.destroy', ['id' => 0]) }}" method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id_layanan" id="deleteId">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                var deleteModal = document.getElementById('deleteServiceModal');
                deleteModal.addEventListener('show.bs.modal', function (event) {
                    // Ambil tombol yang memicu modal
                    var button = event.relatedTarget;
                    // Ambil data-id dari tombol delete
                    var serviceId = button.getAttribute('data-id');
                    // Masukkan data-id ke dalam input hidden di modal
                    var inputId = deleteModal.querySelector('#deleteId');
                    inputId.value = serviceId;

                    // Ubah action form sesuai dengan ID layanan
                    var deleteForm = document.getElementById('deleteForm');
                    deleteForm.action = '/layanan/destroy/' + serviceId;
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

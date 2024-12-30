<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Akun User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/datauser_admin.css') }}">
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
                    <a href="{{ url('/admin/ulasan') }}" class="nav-link">
                        <span class="ic--round-rate-review"></span>
                        <span>Ulasan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/datauser') }}" class="nav-link active">
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
                <h3>Data Pengguna Terdaftar</h3>
                <button class="btn btn-tambah" data-bs-toggle="modal" data-bs-target="#tambahUserModal">Tambah</button>
            </div>

            <div class="mb-3 search-wrapper">
                <span class="uil--search"></span>
                <input type="text" class="form-control" id="searchInput" placeholder="Cari pengguna">
            </div>
            
            <!-- Table -->
            <div class="table-responsive-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Pengguna</th>
                        <th>Nama Pengguna</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Password</th>
                        <th>Foto Profil</th>
                        <th>Aksi</th>
                </thead>

                <tbody>
                    @foreach($pengguna as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->no_telepon ?? 'Tidak Tersedia' }}</td>
                        <td>{{ str_repeat('*', 8) }}</td> <!-- Hanya menampilkan 8 karakter bintang -->
                        <td>
                            @if($user->foto_profil)
                                <img src="{{ Storage::url($user->foto_profil) }}" width="50" height="50" style="object-fit: cover; border-radius: 50%;">
                            @else
                                Tidak Tersedia
                            @endif
                        </td>
                        
                        <td>
                            <a href="#" class="text-success btn-edit" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#editUserModal">
                                <span class="iconamoon--edit"></span>
                            </a>
                            <a href="#" class="text-danger btn-delete" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                                <span class="fluent--delete-20-regular"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
            </table>  
            </div>
            
            <!-- Modal Form Tambah Pengguna -->
            <div class="modal fade" id="tambahUserModal" tabindex="-1" aria-labelledby="tambahUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahUserModalLabel">Tambah Pengguna Baru</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formTambahPengguna" action="{{ route('admin.datauser.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Pengguna</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_telepon" class="form-label">No Telepon</label>
                                    <input type="text" class="form-control" id="no_telepon" name="no_telepon">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="foto_profil" class="form-label">Foto Profil</label>
                                    <input type="file" class="form-control" id="foto_profil" name="foto_profil">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Form Edit Pengguna -->
            <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel">Edit Pengguna</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formEditPengguna" action="{{ route('admin.datauser.update', ['id' => ':id']) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="edit_name" class="form-label">Nama Pengguna</label>
                                    <input type="text" class="form-control" id="edit_name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="edit_alamat" name="alamat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="edit_email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_no_telepon" class="form-label">No Telepon</label>
                                    <input type="text" class="form-control" id="edit_no_telepon" name="no_telepon">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="edit_password" name="password">
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_foto_profil" class="form-label">Foto Profil</label>
                                    <input type="file" class="form-control" id="edit_foto_profil" name="foto_profil">
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto profil.</small>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).on('click', '.btn-edit', function () {
                    var userId = $(this).data('id');
                    // console.log(userId);
                    var url = "{{ route('admin.datauser.edit', ':id') }}".replace(':id', userId);

                    $.get(url, function (data) {
                        $('#edit_name').val(data.name);
                        $('#edit_alamat').val(data.alamat);
                        $('#edit_email').val(data.email);
                        $('#edit_no_telepon').val(data.no_telepon);
                        $('#formEditPengguna').attr('action', "{{ route('admin.datauser.update', ':id') }}".replace(':id', userId));
                    });
                });
            </script>

            <!-- Modal Konfirmasi Delete -->
            <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteUserModalLabel">Konfirmasi Hapus Pengguna</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus pengguna ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form id="deleteUserForm" action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).on('click', '.btn-delete', function () {
                    var userId = $(this).data('id');
                    var url = "{{ route('admin.datauser.destroy', ':id') }}".replace(':id', userId);
                    $('#deleteUserForm').attr('action', url);
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



</body>
</html>

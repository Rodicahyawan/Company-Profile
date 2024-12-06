<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user/signup_user.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="login-container">
            <h3>Daftar Akun</h3>
            <p>Masukkan informasi Anda untuk memulai pendaftaran akun baru.</p>

            <!-- Menampilkan error jika ada -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ old('alamat') }}">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" class="form-control" placeholder="No Telepon" value="{{ old('phone') }}" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
                </div>
                <button type="submit" class="btn-login">REGISTER</button>
            </form>

            <div class="register-option">
                <p>Sudah punya akun? <a href="/login" class="register-link">LOGIN disini!</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user/login_user.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="login-container">
            <h3>Masuk Akun</h3>
            <p>Masuk ke akun Anda dengan username dan password untuk melanjutkan.</p>
            
            <!-- Menampilkan pesan kesalahan -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Menampilkan pesan sukses jika ada -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form id="loginForm" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" autofocus required value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn-login">LOGIN</button>
            </form>
            <div class="register-option">
                <p>Belum punya akun? <a href="/register" class="register-link">DAFTAR disini!</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

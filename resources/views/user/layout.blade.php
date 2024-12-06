<div class="navbar">
    <span class="logo">drg. Dwi Imbang Lestari</span>
    <div class="mobile-menu-toggle" onclick="toggleMenu()">&#9776;</div> <!-- Ikon Burger Menu -->
    <div class="nav-menu">
        <a href="{{ route('user.homepage') }}" class="nav-item {{ request()->is('homepage') ? 'active' : '' }}">
            <span class="icomoon-free--home"></span>
        </a>
        <a href="{{ route('user.tentang') }}" class="nav-item {{ request()->is('tentang') ? 'active' : '' }}">Tentang</a>
        <a href="{{ route('layanan.index') }}" class="nav-item {{ request()->is('layanan') ? 'active' : '' }}">Layanan</a>
        <a href="{{ route('user.galeri') }}" class="nav-item {{ request()->is('galeri') ? 'active' : '' }}">Galeri</a>
        <a href="{{ route('user.ulasan') }}" class="nav-item {{ request()->is('ulasan') ? 'active' : '' }}">Ulasan</a>
        <a href="{{ route('user.kontak') }}" class="nav-item {{ request()->is('kontak') ? 'active' : '' }}">Kontak</a>
        @if(Auth::check())
        <a href="{{ route('user.janjitemu') }}">
            <button class="appointment-button {{ request()->is('janjitemu') ? 'active' : '' }}">Buat Janji Temu</button>
        </a>
        @auth
        <a href="{{ route('user.profil') }}" class="nav-item {{ request()->is('profil') ? 'active' : '' }}">
            <img 
                src="{{ Auth::user()->foto_profil ? Storage::url(Auth::user()->foto_profil) : asset('storage/images/default-profile.png') }}" 
                alt="Profil">
        </a>
        @endauth               
        @else
            <a href="{{ route('login') }}" class="nav-item {{ request()->is('login') ? 'active' : '' }}">Login</a>
        @endif
    </div>
</div>

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
            @if (Auth::user()->foto_profil)
                <img 
                    src="{{ Storage::url(Auth::user()->foto_profil) }}" 
                    alt="Profil">
            @else
                <svg xmlns="http://www.w3.org/2000/svg" width="58" height="58" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M22 12c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2s10 4.477 10 10" opacity="0.5"/>
                    <path fill="currentColor" d="M16.807 19.011A8.46 8.46 0 0 1 12 20.5a8.46 8.46 0 0 1-4.807-1.489c-.604-.415-.862-1.205-.51-1.848C7.41 15.83 8.91 15 12 15s4.59.83 5.318 2.163c.35.643.093 1.433-.511 1.848M12 12a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/>
                </svg>
            @endif
        </a>
        @endauth               
        @else
            <a href="{{ route('login') }}" class="nav-item {{ request()->is('login') ? 'active' : '' }}">Login</a>
        @endif
    </div>
</div>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Diskominfo Kab. Tegal') | Portal Pendaftaran Magang</title>
    <meta name="description" content="Website resmi penerimaan dan pendaftaran magang Dinas Komunikasi dan Informatika Pemerintah Kabupaten Tegal">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo-tegal.svg') }}">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'diskominfo-blue': '#1a4c7e',
                        'diskominfo-blue-dark': '#103357',
                        'diskominfo-blue-light': '#2563eb',
                        'diskominfo-navy': '#091c30',
                        'diskominfo-gold': '#f59e0b',
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', '"Poppins"', 'system-ui', '-apple-system', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
    @stack('styles')
</head>
<body class="bg-slate-50/50 text-slate-800 antialiased flex flex-col min-h-screen">

    {{-- ============ TOPBAR / INFORMASI SINGKAT ============ --}}
    <div class="bg-diskominfo-navy text-slate-300 text-xs py-1.5 px-4 border-b border-white/5 hidden sm:block">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-4">
                <span class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-diskominfo-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Slawi, Kabupaten Tegal, Jawa Tengah 52415
                </span>
                <span class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-diskominfo-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Jam Pelayanan: Senin - Jumat (Buka 07.15 WIB)
                </span>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('registrasi.status') }}" class="hover:text-white transition flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Lacak Berkas Mandiri
                </a>
            </div>
        </div>
    </div>

    {{-- ============ NAVBAR UTAMA ============ --}}
    <header class="bg-diskominfo-blue sticky top-0 z-50 shadow-md shadow-slate-900/10 transition-all duration-200">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5 flex items-center justify-between">
            
            {{-- Brand Logo --}}
            <a href="{{ route('beranda') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-white/10 p-1 flex items-center justify-center border border-white/20 group-hover:scale-105 transition">
                    <img src="{{ asset('images/logo-tegal.svg') }}" alt="Logo Kabupaten Tegal" class="h-8 w-8 object-contain">
                </div>
                <div class="leading-tight">
                    <div class="flex items-center gap-1.5">
                        <span class="text-white font-extrabold text-base sm:text-lg tracking-wide">DISKOMINFO</span>
                        <span class="text-diskominfo-gold font-bold text-xs px-1.5 py-0.5 rounded bg-amber-400/20 border border-amber-400/30">TEGAL</span>
                    </div>
                    <span class="text-blue-200 text-xs font-medium block">Portal Pendaftaran Magang</span>
                </div>
            </a>

            {{-- Desktop Navigation Links --}}
            <div class="hidden md:flex items-center gap-1 lg:gap-2 text-sm font-medium">
                <a href="{{ route('beranda') }}"
                   class="px-3.5 py-2 rounded-lg transition {{ request()->routeIs('beranda') ? 'bg-white/15 text-white font-semibold shadow-inner' : 'text-blue-100 hover:text-white hover:bg-white/10' }}">
                    Beranda
                </a>
                <a href="{{ route('profil') }}"
                   class="px-3.5 py-2 rounded-lg transition {{ request()->routeIs('profil') ? 'bg-white/15 text-white font-semibold shadow-inner' : 'text-blue-100 hover:text-white hover:bg-white/10' }}">
                    Profil Dinas
                </a>
                <a href="{{ route('pengumuman.index') }}"
                   class="px-3.5 py-2 rounded-lg transition {{ request()->routeIs('pengumuman.*') ? 'bg-white/15 text-white font-semibold shadow-inner' : 'text-blue-100 hover:text-white hover:bg-white/10' }}">
                    Pengumuman
                </a>
                <a href="{{ route('registrasi.create') }}"
                   class="px-3.5 py-2 rounded-lg transition {{ request()->routeIs('registrasi.create') ? 'bg-white/15 text-white font-semibold shadow-inner' : 'text-blue-100 hover:text-white hover:bg-white/10' }}">
                    Registrasi
                </a>
                <a href="{{ route('registrasi.status') }}"
                   class="px-3.5 py-2 rounded-lg transition {{ request()->routeIs('registrasi.status*') ? 'bg-white/15 text-white font-semibold shadow-inner' : 'text-blue-100 hover:text-white hover:bg-white/10' }}">
                    Cek Status
                </a>
            </div>

            {{-- User Actions / Auth Buttons --}}
            <div class="flex items-center gap-2 sm:gap-3">
                @auth
                    <div class="hidden sm:flex items-center gap-2">
                        @if (auth()->user()->role === 'admin')
                            <a href="{{ route('admin.registrasi.index') }}" 
                               class="text-xs font-semibold px-3 py-1.5 rounded-lg bg-amber-400 text-amber-950 hover:bg-amber-300 transition flex items-center gap-1.5 shadow-sm">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                                </svg>
                                Kelola Magang
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" 
                               class="text-xs font-semibold px-3 py-1.5 rounded-lg bg-white/15 text-white hover:bg-white/25 transition">
                                Dashboard Saya
                            </a>
                        @endif

                        <div class="text-right hidden lg:block">
                            <span class="text-xs font-bold text-white block truncate max-w-[120px]">{{ auth()->user()->name }}</span>
                            <span class="text-[10px] uppercase font-semibold text-blue-200 block">{{ auth()->user()->role }}</span>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" 
                                title="Keluar dari akun"
                                class="bg-red-500/20 hover:bg-red-500/30 text-red-200 border border-red-400/30 font-semibold px-3.5 py-1.5 rounded-full text-xs transition flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            <span class="hidden sm:inline">Keluar</span>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="bg-white text-diskominfo-blue hover:bg-amber-400 hover:text-slate-900 font-bold px-5 py-2 rounded-full text-xs sm:text-sm transition shadow-sm flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        <span>LOGIN</span>
                    </a>
                @endauth

                {{-- Mobile Menu Hamburger Button --}}
                <button id="menu-toggle" 
                        aria-label="Buka Menu Navigasi"
                        class="md:hidden text-white p-2 rounded-lg hover:bg-white/10 transition focus:outline-none">
                    <svg id="icon-open" class="h-6 w-6 block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="icon-close" class="h-6 w-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </nav>

        {{-- Mobile Drawer Menu --}}
        <div id="mobile-menu" class="hidden md:hidden bg-diskominfo-blue-dark border-t border-white/10 px-6 py-5 space-y-3 text-sm">
            @auth
                <div class="flex items-center justify-between pb-3 mb-2 border-b border-white/10">
                    <div>
                        <span class="text-white font-bold text-sm block">{{ auth()->user()->name }}</span>
                        <span class="text-blue-300 text-xs">{{ auth()->user()->email }}</span>
                    </div>
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase
                        {{ auth()->user()->role === 'admin' ? 'bg-amber-400 text-amber-950' : 'bg-emerald-500 text-white' }}">
                        {{ auth()->user()->role }}
                    </span>
                </div>

                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.registrasi.index') }}" 
                       class="flex items-center gap-2 py-2 px-3 rounded-lg bg-amber-400/20 text-amber-300 font-semibold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <span>Kelola Pendaftaran Magang (Admin)</span>
                    </a>
                @else
                    <a href="{{ route('dashboard') }}" 
                       class="flex items-center gap-2 py-2 px-3 rounded-lg bg-white/10 text-white font-semibold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span>Dashboard Saya</span>
                    </a>
                @endif
            @endauth

            <a href="{{ route('beranda') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded-lg {{ request()->routeIs('beranda') ? 'bg-white/15 text-white font-bold' : 'text-blue-100 hover:text-white hover:bg-white/5' }}">
                <span>Beranda</span>
            </a>
            <a href="{{ route('profil') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded-lg {{ request()->routeIs('profil') ? 'bg-white/15 text-white font-bold' : 'text-blue-100 hover:text-white hover:bg-white/5' }}">
                <span>Profil Dinas</span>
            </a>
            <a href="{{ route('pengumuman.index') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded-lg {{ request()->routeIs('pengumuman.*') ? 'bg-white/15 text-white font-bold' : 'text-blue-100 hover:text-white hover:bg-white/5' }}">
                <span>Pengumuman</span>
            </a>
            <a href="{{ route('registrasi.create') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded-lg {{ request()->routeIs('registrasi.create') ? 'bg-white/15 text-white font-bold' : 'text-blue-100 hover:text-white hover:bg-white/5' }}">
                <span>Formulir Registrasi</span>
            </a>
            <a href="{{ route('registrasi.status') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded-lg {{ request()->routeIs('registrasi.status*') ? 'bg-white/15 text-white font-bold' : 'text-blue-100 hover:text-white hover:bg-white/5' }}">
                <span>Cek Status Pendaftaran</span>
            </a>

            @guest
                <div class="pt-3 border-t border-white/10">
                    <a href="{{ route('login') }}" 
                       class="w-full bg-amber-400 hover:bg-amber-300 text-slate-950 font-bold py-2.5 rounded-xl flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        <span>Masuk ke Akun</span>
                    </a>
                </div>
            @endguest
        </div>
    </header>

    {{-- ============ FLASH MESSAGE ALERTS ============ --}}
    @if (session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 pt-4 w-full">
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3.5 rounded-xl text-sm flex items-start gap-3 shadow-sm">
                <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="flex-1 font-medium">{{ session('success') }}</div>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 pt-4 w-full">
            <div class="bg-rose-50 border border-rose-200 text-rose-800 px-4 py-3.5 rounded-xl text-sm flex items-start gap-3 shadow-sm">
                <svg class="w-5 h-5 text-rose-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="flex-1 font-medium">{{ session('error') }}</div>
            </div>
        </div>
    @endif

    {{-- ============ MAIN CONTENT ============ --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- ============ FOOTER ============ --}}
    <footer class="bg-diskominfo-navy text-slate-300 mt-auto border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
                
                {{-- Col 1: Instansi Info --}}
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/10 p-1 flex items-center justify-center border border-white/10">
                            <img src="{{ asset('images/logo-tegal.svg') }}" alt="Logo Kabupaten Tegal" class="h-8 w-8 object-contain">
                        </div>
                        <div>
                            <h3 class="text-white font-extrabold text-base tracking-wide">DISKOMINFO</h3>
                            <span class="text-xs text-blue-200">Kabupaten Tegal</span>
                        </div>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Dinas Komunikasi dan Informatika Kabupaten Tegal membuka kesempatan berharga bagi generasi muda untuk mengasah keahlian digital, kehumasan, dan tata kelola teknologi pemerintahan.
                    </p>
                    <div class="pt-2">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-semibold bg-blue-900/60 text-blue-200 border border-blue-700/50">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                            Pendaftaran Magang Aktif
                        </span>
                    </div>
                </div>

                {{-- Col 2: Tautan Cepat --}}
                <div>
                    <h4 class="text-white font-bold text-sm tracking-wider uppercase mb-4 text-diskominfo-gold">
                        Tautan Navigasi
                    </h4>
                    <ul class="space-y-2.5 text-xs sm:text-sm">
                        <li><a href="{{ route('beranda') }}" class="hover:text-white transition flex items-center gap-1.5">&rsaquo; Beranda</a></li>
                        <li><a href="{{ route('profil') }}" class="hover:text-white transition flex items-center gap-1.5">&rsaquo; Profil Dinas</a></li>
                        <li><a href="{{ route('pengumuman.index') }}" class="hover:text-white transition flex items-center gap-1.5">&rsaquo; Pengumuman & Jadwal</a></li>
                        <li><a href="{{ route('registrasi.create') }}" class="hover:text-white transition flex items-center gap-1.5">&rsaquo; Pendaftaran Magang</a></li>
                        <li><a href="{{ route('registrasi.status') }}" class="hover:text-white transition flex items-center gap-1.5">&rsaquo; Cek Status Seleksi</a></li>
                    </ul>
                </div>

                {{-- Col 3: Bidang Kerja Magang --}}
                <div>
                    <h4 class="text-white font-bold text-sm tracking-wider uppercase mb-4 text-diskominfo-gold">
                        Bidang / Formasi
                    </h4>
                    <ul class="space-y-2 text-xs text-slate-400">
                        <li class="flex items-start gap-1.5">
                            <span class="text-diskominfo-gold">&bull;</span>
                            <span>E-Government & Layanan SPBE</span>
                        </li>
                        <li class="flex items-start gap-1.5">
                            <span class="text-diskominfo-gold">&bull;</span>
                            <span>Keamanan Informasi & Sandi</span>
                        </li>
                        <li class="flex items-start gap-1.5">
                            <span class="text-diskominfo-gold">&bull;</span>
                            <span>Informasi & Komunikasi Publik (IKP)</span>
                        </li>
                        <li class="flex items-start gap-1.5">
                            <span class="text-diskominfo-gold">&bull;</span>
                            <span>Statistik Sektoral & Analisis Data</span>
                        </li>
                    </ul>
                </div>

                {{-- Col 4: Alamat & Kontak --}}
                <div class="space-y-3">
                    <h4 class="text-white font-bold text-sm tracking-wider uppercase mb-4 text-diskominfo-gold">
                        Kantor & Kontak
                    </h4>
                    <p class="text-xs text-slate-400 leading-relaxed flex items-start gap-2">
                        <svg class="w-4 h-4 text-diskominfo-gold shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        <span>Jl. DR. Soetomo No.1, Dukuh Ringin, Dukuhwringin, Kec. Slawi, Kabupaten Tegal, Jawa Tengah 52415</span>
                    </p>
                    <p class="text-xs text-slate-400 flex items-center gap-2">
                        <svg class="w-4 h-4 text-diskominfo-gold shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>magang@diskominfo.tegalkab.go.id</span>
                    </p>
                    <p class="text-xs text-slate-400 flex items-center gap-2">
                        <svg class="w-4 h-4 text-diskominfo-gold shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <a href="tel:02834561555" class="hover:text-white transition">Telp: (0283) 4561555</a>
                    </p>
                    <p class="text-xs text-slate-400 flex items-center gap-2">
                        <svg class="w-4 h-4 text-diskominfo-gold shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Jam: Buka Senin - Jumat pukul 07.15 WIB</span>
                    </p>
                    <p class="text-xs text-slate-400 flex items-center gap-2">
                        <svg class="w-4 h-4 text-diskominfo-gold shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <span>Lama Perjalanan: ±3 mnt dari Alun-Alun Slawi</span>
                    </p>
                </div>
            </div>

            {{-- Bottom Bar --}}
            <div class="border-t border-white/10 mt-10 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-400">
                <p>&copy; {{ date('Y') }} Dinas Komunikasi dan Informatika Kabupaten Tegal. Hak Cipta Dilindungi.</p>
                <p class="text-[11px] text-slate-500">Pemerintah Kabupaten Tegal - Mewujudkan Pelayanan Publik Digital yang Prima</p>
            </div>
        </div>
    </footer>

    {{-- Script Navigasi Mobile --}}
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');

        if (menuToggle && mobileMenu) {
            menuToggle.addEventListener('click', function () {
                const isHidden = mobileMenu.classList.toggle('hidden');
                if (isHidden) {
                    iconOpen.classList.remove('hidden');
                    iconClose.classList.add('hidden');
                } else {
                    iconOpen.classList.add('hidden');
                    iconClose.classList.remove('hidden');
                }
            });
        }
    </script>
    @stack('scripts')
</body>
</html>

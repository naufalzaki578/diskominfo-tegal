<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Diskominfo Kab. Tegal') | Pendaftaran Magang</title>
    <meta name="description" content="Website resmi pendaftaran magang Dinas Komunikasi dan Informatika Kabupaten Tegal">

    <!-- Tailwind CSS (CDN untuk pengembangan cepat, gunakan Vite untuk produksi) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'diskominfo-blue': '#1d4e79',
                        'diskominfo-blue-dark': '#163d5f',
                    },
                    fontFamily: {
                        sans: ['"Poppins"', 'ui-sans-serif', 'system-ui'],
                    },
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
    @stack('styles')
</head>
<body class="bg-white text-slate-800 antialiased">

    {{-- ============ NAVBAR ============ --}}
    <header class="bg-diskominfo-blue">
        <nav class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ route('beranda') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/logo-tegal.png') }}" alt="Logo Kabupaten Tegal" class="h-10 w-10 object-contain" onerror="this.style.display='none'">
                <span class="text-white font-bold text-lg md:text-xl">DISKOMINFO Kab.Tegal</span>
            </a>

            <div class="hidden md:flex items-center gap-8 text-sm font-medium">
                <a href="{{ route('beranda') }}"
                   class="{{ request()->routeIs('beranda') ? 'text-white' : 'text-blue-100/70 hover:text-white' }} transition">Beranda</a>
                <a href="{{ route('profil') }}"
                   class="{{ request()->routeIs('profil') ? 'text-white' : 'text-blue-100/70 hover:text-white' }} transition">Profil</a>
                <a href="{{ route('pengumuman.index') }}"
                   class="{{ request()->routeIs('pengumuman.*') ? 'text-white' : 'text-blue-100/70 hover:text-white' }} transition">Pengumuman</a>
                <a href="{{ route('registrasi.create') }}"
                   class="{{ request()->routeIs('registrasi.*') ? 'text-white' : 'text-blue-100/70 hover:text-white' }} transition">Registrasi</a>
            </div>

            <div class="flex items-center gap-3">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-white text-diskominfo-blue font-semibold px-5 py-2 rounded-full text-sm hover:bg-blue-50 transition">
                            Keluar
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="bg-white text-diskominfo-blue font-semibold px-5 py-2 rounded-full text-sm hover:bg-blue-50 transition">
                        LOGIN
                    </a>
                @endauth

                <!-- Tombol menu mobile -->
                <button id="menu-toggle" class="md:hidden text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Menu mobile -->
        <div id="mobile-menu" class="hidden md:hidden px-6 pb-4 space-y-2 text-blue-100">
            <a href="{{ route('beranda') }}" class="block py-1">Beranda</a>
            <a href="{{ route('profil') }}" class="block py-1">Profil</a>
            <a href="{{ route('pengumuman.index') }}" class="block py-1">Pengumuman</a>
            <a href="{{ route('registrasi.create') }}" class="block py-1">Registrasi</a>
        </div>
    </header>

    {{-- ============ FLASH MESSAGE ============ --}}
    @if (session('success'))
        <div class="max-w-4xl mx-auto mt-4 px-6">
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        </div>
    @endif

    {{-- ============ KONTEN HALAMAN ============ --}}
    <main>
        @yield('content')
    </main>

    {{-- ============ FOOTER ============ --}}
    <footer class="bg-diskominfo-blue-dark text-blue-100 mt-24">
        <div class="max-w-7xl mx-auto px-6 py-10 grid md:grid-cols-3 gap-8 text-sm">
            <div>
                <h3 class="text-white font-semibold mb-2">DISKOMINFO Kab. Tegal</h3>
                <p>Jl. Contoh Raya No. 1, Slawi, Kabupaten Tegal, Jawa Tengah</p>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-2">Tautan</h3>
                <ul class="space-y-1">
                    <li><a href="{{ route('profil') }}" class="hover:text-white">Profil Dinas</a></li>
                    <li><a href="{{ route('pengumuman.index') }}" class="hover:text-white">Pengumuman</a></li>
                    <li><a href="{{ route('registrasi.create') }}" class="hover:text-white">Registrasi Magang</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-2">Kontak</h3>
                <p>Email: magang@diskominfo.tegalkab.go.id</p>
                <p>Telp: (0283) 000000</p>
            </div>
        </div>
        <div class="border-t border-white/10 py-4 text-center text-xs text-blue-200">
            &copy; {{ date('Y') }} Dinas Komunikasi dan Informatika Kabupaten Tegal. Seluruh hak cipta dilindungi.
        </div>
    </footer>

    <script>
        document.getElementById('menu-toggle')?.addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
    @stack('scripts')
</body>
</html>

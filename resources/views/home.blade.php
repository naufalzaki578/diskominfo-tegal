@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    {{-- ============ HERO SECTION ============ --}}
    <section class="relative overflow-hidden bg-gradient-to-b from-blue-900 via-diskominfo-blue to-slate-900 text-white py-16 md:py-24">
        {{-- Background Grid & Glow Effect --}}
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_30%,rgba(37,99,235,0.25),transparent_60%)] pointer-events-none"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_80%,rgba(245,158,11,0.15),transparent_50%)] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                
                {{-- Text Left Column --}}
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/20 text-xs font-semibold backdrop-blur-sm text-diskominfo-gold">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>Penerimaan Magang Mahasiswa & Siswa SMK/SMA</span>
                    </div>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight sm:leading-snug">
                        Bangun Karier Digital di <br class="hidden sm:inline">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 via-amber-200 to-yellow-400">
                            Diskominfo Kab. Tegal
                        </span>
                    </h1>

                    <p class="text-blue-100/90 text-sm sm:text-base lg:text-lg leading-relaxed max-w-2xl mx-auto lg:mx-0">
                        &ldquo;Menyemai Inovasi, Mewujudkan Transformasi: Kembangkan keahlian nyata di bidang rekayasa perangkat lunak, keamanan siber, dan komunikasi publik bersama praktisi pemerintahan.&rdquo;
                    </p>

                    <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="{{ route('registrasi.create') }}"
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 bg-diskominfo-gold hover:bg-amber-400 text-slate-950 font-bold px-8 py-4 rounded-xl shadow-lg shadow-amber-500/20 hover:scale-[1.02] transition-all text-sm sm:text-base">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            <span>Daftar Magang Sekarang</span>
                        </a>

                        <a href="{{ route('registrasi.status') }}"
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white font-semibold px-7 py-4 rounded-xl border border-white/20 backdrop-blur-sm transition-all text-sm sm:text-base">
                            <svg class="w-5 h-5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <span>Cek Status Berkas</span>
                        </a>
                    </div>

                    {{-- Mini Testimonials / Trust Badges --}}
                    <div class="pt-6 border-t border-white/10 flex flex-wrap items-center justify-center lg:justify-start gap-6 text-xs text-blue-200">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Proses Seleksi Transparan</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>100% Bebas Biaya</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Sertifikat Resmi Pemkab</span>
                        </div>
                    </div>
                </div>

                {{-- Interactive Illustration Column Right --}}
                <div class="lg:col-span-5 flex justify-center">
                    <div class="relative w-full max-w-md">
                        {{-- Outer Decorative Glow Card --}}
                        <div class="absolute -inset-1.5 bg-gradient-to-r from-blue-500 to-amber-500 rounded-3xl blur opacity-30"></div>
                        
                        <div class="relative bg-slate-900/90 border border-white/10 rounded-2xl p-6 shadow-2xl backdrop-blur-xl text-left">
                            
                            {{-- Window Header --}}
                            <div class="flex items-center justify-between pb-4 border-b border-white/10 mb-5">
                                <div class="flex items-center gap-2">
                                    <div class="w-3 h-3 rounded-full bg-rose-500"></div>
                                    <div class="w-3 h-3 rounded-full bg-amber-500"></div>
                                    <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                                </div>
                                <span class="text-xs font-mono text-slate-400">portal-magang.tegalkab.go.id</span>
                            </div>

                            {{-- Live Metric Highlight --}}
                            <div class="space-y-4">
                                <div class="bg-white/5 border border-white/10 p-4 rounded-xl flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-blue-500/20 text-blue-300 flex items-center justify-center font-bold">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-400">Peluang Penempatan</p>
                                            <p class="text-sm font-bold text-white">4 Bidang & Divisi</p>
                                        </div>
                                    </div>
                                    <span class="text-xs px-2.5 py-1 bg-blue-500/20 text-blue-300 rounded-full font-semibold">Tersedia</span>
                                </div>

                                <div class="bg-white/5 border border-white/10 p-4 rounded-xl flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-amber-500/20 text-amber-300 flex items-center justify-center font-bold">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-400">Pembimbingan</p>
                                            <p class="text-sm font-bold text-white">Mentor Praktisi Senior</p>
                                        </div>
                                    </div>
                                    <span class="text-xs px-2.5 py-1 bg-amber-500/20 text-amber-300 rounded-full font-semibold">1-on-1</span>
                                </div>

                                <div class="bg-white/5 border border-white/10 p-4 rounded-xl flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-emerald-500/20 text-emerald-300 flex items-center justify-center font-bold">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-400">Sertifikasi Akhir</p>
                                            <p class="text-sm font-bold text-white">Sertifikat Magang Resmi</p>
                                        </div>
                                    </div>
                                    <span class="text-xs px-2.5 py-1 bg-emerald-500/20 text-emerald-300 rounded-full font-semibold">Akreditasi</span>
                                </div>
                            </div>

                            {{-- Bottom Callout --}}
                            <div class="mt-5 p-3.5 rounded-xl bg-blue-600/20 border border-blue-400/30 text-xs text-blue-200 text-center">
                                Terbuka untuk Jurusan TI, Sistem Informasi, Desain Komunikasi Visual, Ilmu Komunikasi, Administrasi, & bidang terkait.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ============ STATS BAR ============ --}}
    <section class="bg-white border-b border-slate-100 py-8 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 text-center">
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                    <span class="text-2xl sm:text-3xl font-extrabold text-diskominfo-blue">100%</span>
                    <p class="text-xs sm:text-sm font-medium text-slate-600 mt-1">Gratis & Bebas Biaya</p>
                </div>
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                    <span class="text-2xl sm:text-3xl font-extrabold text-diskominfo-blue">4 Bidang</span>
                    <p class="text-xs sm:text-sm font-medium text-slate-600 mt-1">Pilihan Divisi Spesifik</p>
                </div>
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                    <span class="text-2xl sm:text-3xl font-extrabold text-diskominfo-blue">Resmi</span>
                    <p class="text-xs sm:text-sm font-medium text-slate-600 mt-1">Sertifikat Pemkab Tegal</p>
                </div>
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                    <span class="text-2xl sm:text-3xl font-extrabold text-diskominfo-blue">Cepat</span>
                    <p class="text-xs sm:text-sm font-medium text-slate-600 mt-1">Verifikasi Berkas Online</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ PILIHAN BIDANG MAGANG ============ --}}
    <section class="py-16 md:py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-wider text-diskominfo-blue bg-blue-100 px-3 py-1 rounded-full">
                    Formasi Penempatan
                </span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">
                    Pilihan Bidang Kerja di Diskominfo
                </h2>
                <p class="text-slate-600 text-sm sm:text-base mt-3">
                    Sesuaikan minat dan latar belakang pendidikan Anda dengan 4 divisi operasional teknologi & informasi pemerintahan kami:
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                {{-- Bidang 1 --}}
                <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-blue-100 text-diskominfo-blue flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg text-slate-900">E-Government & SPBE</h3>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                            Pengembangan aplikasi web/mobile daerah, integrasi API sistem pemerintah, manajemen server dan pusat data terpadu.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100">
                        <span class="text-[11px] font-semibold text-blue-700 bg-blue-50 px-2.5 py-1 rounded-full">Teknik Informatika / RPL</span>
                    </div>
                </div>

                {{-- Bidang 2 --}}
                <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg text-slate-900">Keamanan Siber & Sandi</h3>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                            Pemantauan insiden keamanan informasi (CSIRT), audit celah sistem, enkripsi berkas, dan edukasi literasi keamanan siber.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100">
                        <span class="text-[11px] font-semibold text-amber-700 bg-amber-50 px-2.5 py-1 rounded-full">Cybersecurity / Jaringan</span>
                    </div>
                </div>

                {{-- Bidang 3 --}}
                <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg text-slate-900">Informasi & Komunikasi Publik</h3>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                            Produksi konten visual media sosial resmi dinas, liputan berita pemerintah, video edukasi, dan penulisan siaran pers.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100">
                        <span class="text-[11px] font-semibold text-purple-700 bg-purple-50 px-2.5 py-1 rounded-full">Ilmu Komunikasi / DKV / Multimedia</span>
                    </div>
                </div>

                {{-- Bidang 4 --}}
                <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg text-slate-900">Statistik & Analisis Data</h3>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                            Pengelolaan portal Satu Data Kabupaten Tegal, visualisasi dashboard statistik daerah, dan pembersihan data survei.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100">
                        <span class="text-[11px] font-semibold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full">Statistika / Sains Data / SI</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ============ ALUR PENDAFTARAN ============ --}}
    <section class="py-16 md:py-24 bg-white border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-wider text-diskominfo-blue bg-blue-100 px-3 py-1 rounded-full">
                    Langkah Mudah
                </span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">
                    Alur Pendaftaran & Seleksi Magang
                </h2>
                <p class="text-slate-600 text-sm sm:text-base mt-3">
                    Proses registrasi dirancang efisien dan sepenuhnya daring tanpa perlu bolak-balik ke kantor dinas:
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
                
                {{-- Step 1 --}}
                <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 text-center relative group hover:border-diskominfo-blue transition">
                    <div class="w-14 h-14 mx-auto rounded-2xl bg-diskominfo-blue text-white flex items-center justify-center font-extrabold text-lg shadow-md mb-4 group-hover:scale-110 transition">
                        1
                    </div>
                    <h3 class="font-bold text-slate-900 text-base">Isi Formulir Online</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-500 leading-relaxed">
                        Lengkapi identitas diri, asal sekolah/kampus, dan unggah Surat Pengantar resmi (PDF) dari instansi Anda.
                    </p>
                </div>

                {{-- Step 2 --}}
                <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 text-center relative group hover:border-diskominfo-blue transition">
                    <div class="w-14 h-14 mx-auto rounded-2xl bg-diskominfo-blue text-white flex items-center justify-center font-extrabold text-lg shadow-md mb-4 group-hover:scale-110 transition">
                        2
                    </div>
                    <h3 class="font-bold text-slate-900 text-base">Verifikasi Berkas</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-500 leading-relaxed">
                        Tim admin Diskominfo memeriksa ketersediaan kuota, kesesuaian jurusan, dan validitas dokumen pengantar.
                    </p>
                </div>

                {{-- Step 3 --}}
                <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 text-center relative group hover:border-diskominfo-blue transition">
                    <div class="w-14 h-14 mx-auto rounded-2xl bg-diskominfo-blue text-white flex items-center justify-center font-extrabold text-lg shadow-md mb-4 group-hover:scale-110 transition">
                        3
                    </div>
                    <h3 class="font-bold text-slate-900 text-base">Pengumuman & Akun</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-500 leading-relaxed">
                        Pantau status melalui menu Lacak Berkas. Jika disetujui, akun peserta akan dibuat untuk mengakses dashboard.
                    </p>
                </div>

                {{-- Step 4 --}}
                <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 text-center relative group hover:border-diskominfo-blue transition">
                    <div class="w-14 h-14 mx-auto rounded-2xl bg-diskominfo-blue text-white flex items-center justify-center font-extrabold text-lg shadow-md mb-4 group-hover:scale-110 transition">
                        4
                    </div>
                    <h3 class="font-bold text-slate-900 text-base">Onboarding & Magang</h3>
                    <p class="mt-2 text-xs sm:text-sm text-slate-500 leading-relaxed">
                        Hadir di kantor Diskominfo Slawi sesuai jadwal tanggal mulai, bertemu mentor pembimbing, dan memulai proyek nyata.
                    </p>
                </div>

            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('registrasi.create') }}"
                   class="inline-flex items-center gap-2 bg-diskominfo-blue hover:bg-diskominfo-blue-dark text-white font-bold px-8 py-3.5 rounded-full transition shadow-md shadow-blue-900/10">
                    <span>Mulai Pendaftaran Sekarang</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- ============ PENGUMUMAN TERBARU ============ --}}
    @if ($pengumumanTerbaru->isNotEmpty())
        <section class="py-16 md:py-24 bg-slate-50 border-t border-slate-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-10 gap-4">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-diskominfo-blue bg-blue-100 px-3 py-1 rounded-full">
                            Warta Resmi
                        </span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-2 tracking-tight">
                            Pengumuman & Informasi Terbaru
                        </h2>
                    </div>
                    <a href="{{ route('pengumuman.index') }}" 
                       class="text-diskominfo-blue font-bold text-sm hover:text-diskominfo-blue-dark inline-flex items-center gap-1 group">
                        <span>Lihat Semua Pengumuman</span>
                        <span class="group-hover:translate-x-1 transition-transform">&rarr;</span>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($pengumumanTerbaru as $item)
                        <a href="{{ route('pengumuman.show', $item) }}"
                           class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
                            <div>
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-blue-50 text-diskominfo-blue border border-blue-100">
                                        Pengumuman
                                    </span>
                                    <span class="text-xs text-slate-400">
                                        {{ $item->tanggal_terbit->translatedFormat('d F Y') }}
                                    </span>
                                </div>
                                <h3 class="font-bold text-base sm:text-lg text-slate-900 group-hover:text-diskominfo-blue transition line-clamp-2">
                                    {{ $item->judul }}
                                </h3>
                                <p class="mt-2 text-xs sm:text-sm text-slate-500 leading-relaxed line-clamp-3">
                                    {{ Str::limit(strip_tags($item->isi), 120) }}
                                </p>
                            </div>
                            <div class="mt-5 pt-4 border-t border-slate-100 text-xs font-semibold text-diskominfo-blue flex items-center justify-between">
                                <span>Baca Rincian</span>
                                <span class="group-hover:translate-x-1 transition">&rarr;</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ============ FAQ ACCORDION ============ --}}
    <section class="py-16 md:py-24 bg-white border-t border-slate-100">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold uppercase tracking-wider text-diskominfo-blue bg-blue-100 px-3 py-1 rounded-full">
                    Tanya Jawab
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-2 tracking-tight">
                    Pertanyaan yang Sering Diajukan
                </h2>
                <p class="text-slate-500 text-sm mt-2">
                    Hal-hal penting seputar persyaratan dan ketentuan magang di Diskominfo Kab. Tegal:
                </p>
            </div>

            <div class="space-y-4">
                {{-- FAQ 1 --}}
                <details class="group bg-slate-50 rounded-2xl p-5 border border-slate-200/80 [&_summary::-webkit-details-marker]:hidden cursor-pointer">
                    <summary class="flex items-center justify-between font-bold text-slate-900 text-sm sm:text-base">
                        <span>Siapa saja yang diperbolehkan mendaftar program magang ini?</span>
                        <span class="w-6 h-6 rounded-full bg-white text-slate-600 flex items-center justify-center shrink-0 ml-4 group-open:rotate-180 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </span>
                    </summary>
                    <p class="mt-3 text-xs sm:text-sm text-slate-600 leading-relaxed pt-2 border-t border-slate-200/60">
                        Program terbuka bagi mahasiswa (D3/D4/S1) maupun siswa SMK/SMA yang memiliki surat pengantar resmi dari institusi pendidikan masing-masing.
                    </p>
                </details>

                {{-- FAQ 2 --}}
                <details class="group bg-slate-50 rounded-2xl p-5 border border-slate-200/80 [&_summary::-webkit-details-marker]:hidden cursor-pointer">
                    <summary class="flex items-center justify-between font-bold text-slate-900 text-sm sm:text-base">
                        <span>Berapa lama durasi magang yang diizinkan?</span>
                        <span class="w-6 h-6 rounded-full bg-white text-slate-600 flex items-center justify-center shrink-0 ml-4 group-open:rotate-180 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </span>
                    </summary>
                    <p class="mt-3 text-xs sm:text-sm text-slate-600 leading-relaxed pt-2 border-t border-slate-200/60">
                        Durasi magang fleksibel menyesuaikan kurikulum instansi pendaftar, biasanya berkisar antara 1 bulan hingga 6 bulan (program MBKM).
                    </p>
                </details>

                {{-- FAQ 3 --}}
                <details class="group bg-slate-50 rounded-2xl p-5 border border-slate-200/80 [&_summary::-webkit-details-marker]:hidden cursor-pointer">
                    <summary class="flex items-center justify-between font-bold text-slate-900 text-sm sm:text-base">
                        <span>Apakah pendaftar akan mendapatkan sertifikat?</span>
                        <span class="w-6 h-6 rounded-full bg-white text-slate-600 flex items-center justify-center shrink-0 ml-4 group-open:rotate-180 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </span>
                    </summary>
                    <p class="mt-3 text-xs sm:text-sm text-slate-600 leading-relaxed pt-2 border-t border-slate-200/60">
                        Ya! Setiap peserta yang menyelesaikan seluruh rangkaian kegiatan dan evaluasi magang dengan baik akan menerima Sertifikat Resmi bernomor dari Dinas Komunikasi dan Informatika Kabupaten Tegal.
                    </p>
                </details>

                {{-- FAQ 4 --}}
                <details class="group bg-slate-50 rounded-2xl p-5 border border-slate-200/80 [&_summary::-webkit-details-marker]:hidden cursor-pointer">
                    <summary class="flex items-center justify-between font-bold text-slate-900 text-sm sm:text-base">
                        <span>Bagaimana jika surat pengantar dari kampus masih dalam proses?</span>
                        <span class="w-6 h-6 rounded-full bg-white text-slate-600 flex items-center justify-center shrink-0 ml-4 group-open:rotate-180 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </span>
                    </summary>
                    <p class="mt-3 text-xs sm:text-sm text-slate-600 leading-relaxed pt-2 border-t border-slate-200/60">
                        Surat pengantar merupakan syarat verifikasi wajib. Anda disarankan menyelesaikan pengajuan surat di instansi Anda terlebih dahulu sebelum mengunggahnya ke form pendaftaran.
                    </p>
                </details>
            </div>
        </div>
    </section>

    {{-- ============ BOTTOM CTA BANNER ============ --}}
    <section class="py-12 md:py-16 bg-gradient-to-r from-diskominfo-blue-dark to-diskominfo-blue text-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                Siap Berkontribusi Nyata untuk Kemajuan Kabupaten Tegal?
            </h2>
            <p class="mt-3 text-blue-100 text-sm sm:text-base max-w-2xl mx-auto">
                Daftarkan diri Anda hari ini dan jadilah bagian dari transformasi digital pemerintahan daerah.
            </p>
            <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('registrasi.create') }}"
                   class="w-full sm:w-auto bg-diskominfo-gold hover:bg-amber-400 text-slate-950 font-bold px-8 py-3.5 rounded-full shadow-lg transition text-sm">
                    Isi Formulir Pendaftaran
                </a>
                <a href="{{ route('profil') }}"
                   class="w-full sm:w-auto bg-white/10 hover:bg-white/20 text-white font-semibold px-7 py-3.5 rounded-full border border-white/20 transition text-sm">
                    Pelajari Profil Dinas
                </a>
            </div>
        </div>
    </section>
@endsection

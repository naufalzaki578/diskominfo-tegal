@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    {{-- ============ HERO SECTION ============ --}}
    <section class="relative overflow-hidden">
        {{-- Dekorasi garis/titik jaringan di background --}}
        <svg class="absolute inset-0 w-full h-full opacity-30 pointer-events-none" xmlns="http://www.w3.org/2000/svg">
            <line x1="0" y1="80" x2="150" y2="180" stroke="#cbd5e1" stroke-width="1"/>
            <line x1="150" y1="180" x2="60" y2="260" stroke="#cbd5e1" stroke-width="1"/>
            <line x1="80%" y1="60" x2="70%" y2="160" stroke="#cbd5e1" stroke-width="1"/>
            <circle cx="150" cy="180" r="3" fill="#94a3b8"/>
            <circle cx="60" cy="260" r="3" fill="#94a3b8"/>
            <circle cx="70%" cy="160" r="3" fill="#94a3b8"/>
        </svg>

        <div class="max-w-7xl mx-auto px-6 py-16 md:py-24 grid md:grid-cols-2 gap-12 items-center relative">
            {{-- Kolom teks --}}
            <div>
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight text-slate-900 uppercase">
                    Pendaftaran Magang Dinas Kominfo Kabupaten Tegal
                </h1>
                <p class="mt-6 text-slate-600 text-lg leading-relaxed max-w-xl">
                    &ldquo;Menyemai Inovasi, Mewujudkan Transformasi: Magang di Diskominfo, Tempat Berkembang dan
                    Berkontribusi untuk Kemajuan Teknologi dan Informasi.&rdquo;
                </p>

                <a href="{{ route('registrasi.create') }}"
                   class="inline-block mt-8 bg-diskominfo-blue hover:bg-diskominfo-blue-dark text-white font-semibold px-8 py-3 rounded-full transition shadow-lg shadow-blue-900/10">
                    Daftar Sekarang
                </a>
            </div>

            {{-- Kolom ilustrasi --}}
            <div class="flex justify-center">
                <svg viewBox="0 0 500 400" class="w-full max-w-md" xmlns="http://www.w3.org/2000/svg">
                    <ellipse cx="250" cy="360" rx="200" ry="24" fill="#eef2f7"/>
                    <rect x="90" y="230" width="230" height="110" rx="14" fill="#2f6fb0"/>
                    <rect x="105" y="245" width="200" height="80" rx="6" fill="#eaf2fb"/>
                    <rect x="60" y="150" width="150" height="230" rx="16" fill="#1d2733"/>
                    <rect x="70" y="165" width="130" height="185" rx="4" fill="#eaf2fb"/>
                    <circle cx="300" cy="120" r="34" fill="#f4a53a"/>
                    <rect x="284" y="150" width="34" height="70" fill="#22344a"/>
                    <circle cx="200" cy="90" r="30" fill="#f7c68d"/>
                    <rect x="184" y="118" width="34" height="70" fill="#f4a53a"/>
                    <circle cx="360" cy="110" r="14" fill="#eaf2fb" stroke="#2f6fb0" stroke-width="3"/>
                    <rect x="345" y="150" width="30" height="26" rx="4" fill="#f4a53a"/>
                </svg>
            </div>
        </div>
    </section>

    {{-- ============ PENGUMUMAN TERBARU ============ --}}
    @if ($pengumumanTerbaru->isNotEmpty())
        <section class="max-w-7xl mx-auto px-6 py-16">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-slate-900">Pengumuman Terbaru</h2>
                <a href="{{ route('pengumuman.index') }}" class="text-diskominfo-blue text-sm font-semibold hover:underline">
                    Lihat semua &rarr;
                </a>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach ($pengumumanTerbaru as $item)
                    <a href="{{ route('pengumuman.show', $item) }}"
                       class="block border border-slate-100 rounded-xl p-6 hover:shadow-lg transition">
                        <span class="text-xs text-slate-400">{{ $item->tanggal_terbit->translatedFormat('d F Y') }}</span>
                        <h3 class="mt-2 font-semibold text-slate-900 line-clamp-2">{{ $item->judul }}</h3>
                        <p class="mt-2 text-sm text-slate-500 line-clamp-3">{{ Str::limit(strip_tags($item->isi), 120) }}</p>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    {{-- ============ ALUR PENDAFTARAN ============ --}}
    <section class="bg-slate-50">
        <div class="max-w-7xl mx-auto px-6 py-16">
            <h2 class="text-2xl font-bold text-slate-900 text-center mb-12">Alur Pendaftaran Magang</h2>
            <div class="grid md:grid-cols-4 gap-8 text-center">
                @foreach ([
                    ['judul' => 'Isi Formulir', 'ket' => 'Lengkapi data diri dan unggah surat pengantar dari instansi.'],
                    ['judul' => 'Verifikasi Berkas', 'ket' => 'Tim Diskominfo memeriksa kelengkapan dokumen pendaftaran.'],
                    ['judul' => 'Konfirmasi Email', 'ket' => 'Status pendaftaran dikirimkan melalui email yang terdaftar.'],
                    ['judul' => 'Mulai Magang', 'ket' => 'Peserta memulai kegiatan magang sesuai jadwal yang ditentukan.'],
                ] as $index => $langkah)
                    <div>
                        <div class="w-12 h-12 mx-auto rounded-full bg-diskominfo-blue text-white flex items-center justify-center font-bold">
                            {{ $index + 1 }}
                        </div>
                        <h3 class="mt-4 font-semibold text-slate-900">{{ $langkah['judul'] }}</h3>
                        <p class="mt-2 text-sm text-slate-500">{{ $langkah['ket'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

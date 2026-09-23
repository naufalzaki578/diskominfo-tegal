@extends('layouts.app')

@section('title', 'Dashboard Pengguna')

@section('content')
{{-- Header Hero --}}
<section class="bg-gradient-to-r from-diskominfo-navy to-diskominfo-blue text-white py-10 md:py-14">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-diskominfo-gold bg-white/10 px-3 py-1 rounded-full">
                    Portal Pengguna
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold mt-2 tracking-tight">
                    Selamat Datang, {{ auth()->user()->name }}
                </h1>
                <p class="text-blue-100 text-xs sm:text-sm mt-1">
                    {{ auth()->user()->email }} &bull; Role: 
                    <span class="font-bold uppercase text-amber-300">{{ auth()->user()->role }}</span>
                </p>
            </div>
            
            <div class="flex items-center gap-2">
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.registrasi.index') }}" 
                       class="bg-amber-400 hover:bg-amber-300 text-slate-950 font-bold px-5 py-2.5 rounded-xl text-xs sm:text-sm transition flex items-center gap-2 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                        </svg>
                        <span>Kelola Pendaftaran Magang</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="py-10 md:py-14 bg-slate-50 min-h-[75vh]">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 space-y-8">


        {{-- JIKA PENGGUNA ADALAH ADMIN --}}
        @if (auth()->user()->role === 'admin')
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-800 flex items-center justify-center font-bold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Hak Akses Administrator Aktif</h2>
                        <p class="text-xs sm:text-sm text-slate-500">Anda memiliki wewenang penuh untuk meninjau dan memvalidasi pendaftaran calon peserta magang.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-slate-100">
                    <a href="{{ route('admin.registrasi.index') }}" 
                       class="p-5 rounded-2xl bg-slate-50 hover:bg-blue-50/50 border border-slate-200 hover:border-diskominfo-blue transition group flex items-start justify-between">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-diskominfo-blue">Menu Utama</span>
                            <h3 class="font-bold text-base text-slate-900 mt-1 group-hover:text-diskominfo-blue transition">
                                Kelola Data Pendaftar Magang &rarr;
                            </h3>
                            <p class="text-xs text-slate-500 mt-1">Lihat berkas surat pengantar, approve/reject pendaftar, dan kelola status.</p>
                        </div>
                    </a>

                    <a href="{{ route('pengumuman.index') }}" 
                       class="p-5 rounded-2xl bg-slate-50 hover:bg-blue-50/50 border border-slate-200 hover:border-diskominfo-blue transition group flex items-start justify-between">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Informasi</span>
                            <h3 class="font-bold text-base text-slate-900 mt-1 group-hover:text-diskominfo-blue transition">
                                Lihat Warta & Pengumuman &rarr;
                            </h3>
                            <p class="text-xs text-slate-500 mt-1">Tinjau informasi dan pengumuman yang tampil kepada publik.</p>
                        </div>
                    </a>
                </div>
            </div>

        {{-- JIKA PENGGUNA ADALAH PESERTA DENGAN DATA PENDAFTARAN --}}
        @elseif ($registrasi)
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                
                {{-- Banner Status --}}
                <div class="p-6 sm:p-8 
                    @if ($registrasi->status === 'diterima') bg-emerald-500/10 border-b border-emerald-500/20
                    @elseif ($registrasi->status === 'menunggu') bg-amber-500/10 border-b border-amber-500/20
                    @else bg-rose-500/10 border-b border-rose-500/20 @endif">
                    
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Status Magang Anda</span>
                            <div class="flex items-center gap-3 mt-1">
                                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-sm font-bold
                                    @if ($registrasi->status === 'diterima') bg-emerald-100 text-emerald-800
                                    @elseif ($registrasi->status === 'menunggu') bg-amber-100 text-amber-800
                                    @else bg-rose-100 text-rose-800 @endif">
                                    <span class="w-2.5 h-2.5 rounded-full
                                        @if ($registrasi->status === 'diterima') bg-emerald-500
                                        @elseif ($registrasi->status === 'menunggu') bg-amber-500
                                        @else bg-rose-500 @endif"></span>
                                    {{ ucfirst($registrasi->status) }}
                                </span>
                            </div>
                        </div>

                        @if ($registrasi->status === 'diterima')
                            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-xl bg-emerald-100 text-emerald-800 font-bold text-xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Peserta Magang Terkonfirmasi</span>
                            </div>
                        @endif
                    </div>

                    {{-- Panduan Peserta Diterima --}}
                    @if ($registrasi->status === 'diterima')
                        <div class="mt-5 p-5 bg-emerald-50 rounded-2xl border border-emerald-200 text-emerald-950 space-y-3">
                            <h3 class="font-bold text-sm sm:text-base flex items-center gap-2">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Informasi Hari Pertama Magang:</span>
                            </h3>
                            <ul class="list-disc list-inside text-xs sm:text-sm text-emerald-900 space-y-1.5 pl-1">
                                <li><strong>Waktu Kedatangan:</strong> Hadir tepat waktu pukul <strong>07.15 WIB</strong> pada tanggal {{ $registrasi->tanggal_mulai->translatedFormat('d F Y') }}.</li>
                                <li><strong>Lokasi Kantor:</strong> Gedung Diskominfo Kab. Tegal — <em>Jl. DR. Soetomo No.1, Dukuh Ringin, Dukuhwringin, Kec. Slawi, Kabupaten Tegal, Jawa Tengah 52415</em> (±3 mnt dari Alun-Alun Slawi).</li>
                                <li><strong>Pakaian:</strong> Kemeja putih berkerah, celana/rok bahan hitam rapi, dan sepatu tertutup.</li>
                                <li><strong>Kelengkapan:</strong> Membawa <em>Surat Pengantar Asli</em> dari instansi asal dan laptop pribadi.</li>
                                <li><strong>Hotline Kantor:</strong> <a href="tel:02834561555" class="underline font-bold">(0283) 4561555</a> jika membutuhkan informasi lebih lanjut.</li>
                            </ul>
                        </div>
                    @endif
                </div>

                {{-- Detail Pendaftaran --}}
                <div class="p-6 sm:p-8 space-y-6">
                    <h3 class="text-base font-bold text-slate-900">Rincian Data Pendaftaran</h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 text-xs sm:text-sm">
                        <div class="bg-slate-50 p-4 rounded-xl">
                            <span class="text-slate-400 block text-xs">Nama Lengkap</span>
                            <span class="text-slate-900 font-bold text-sm sm:text-base mt-0.5 block">{{ $registrasi->nama_lengkap }}</span>
                        </div>
                        <div class="bg-slate-50 p-4 rounded-xl">
                            <span class="text-slate-400 block text-xs">NIM / NIS</span>
                            <span class="text-slate-900 font-bold text-sm sm:text-base mt-0.5 block">{{ $registrasi->nim_nis }}</span>
                        </div>
                        <div class="bg-slate-50 p-4 rounded-xl">
                            <span class="text-slate-400 block text-xs">Asal Instansi</span>
                            <span class="text-slate-900 font-bold text-sm sm:text-base mt-0.5 block">{{ $registrasi->asal_instansi }}</span>
                        </div>
                        <div class="bg-slate-50 p-4 rounded-xl">
                            <span class="text-slate-400 block text-xs">Jurusan</span>
                            <span class="text-slate-900 font-bold text-sm sm:text-base mt-0.5 block">{{ $registrasi->jurusan }}</span>
                        </div>
                        <div class="bg-slate-50 p-4 rounded-xl">
                            <span class="text-slate-400 block text-xs">Tanggal Mulai</span>
                            <span class="text-slate-900 font-bold text-sm sm:text-base mt-0.5 block">{{ $registrasi->tanggal_mulai->translatedFormat('d M Y') }}</span>
                        </div>
                        <div class="bg-slate-50 p-4 rounded-xl">
                            <span class="text-slate-400 block text-xs">Tanggal Selesai</span>
                            <span class="text-slate-900 font-bold text-sm sm:text-base mt-0.5 block">{{ $registrasi->tanggal_selesai->translatedFormat('d M Y') }}</span>
                        </div>
                    </div>
                </div>

            </div>

        {{-- JIKA PENGGUNA BELUM TERHUBUNG DENGAN REGISTRASI --}}
        @else
            <div class="bg-white rounded-3xl p-8 sm:p-12 text-center border border-slate-200 shadow-sm max-w-md mx-auto space-y-4">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 text-diskominfo-blue flex items-center justify-center mx-auto">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-slate-900">Belum Ada Berkas Terhubung</h2>
                <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
                    Akun Anda saat ini belum memiliki data permohonan magang yang aktif di sistem Diskominfo Kab. Tegal.
                </p>
                <a href="{{ route('registrasi.create') }}" 
                   class="inline-block bg-diskominfo-blue hover:bg-diskominfo-blue-dark text-white font-bold text-xs sm:text-sm px-6 py-3 rounded-xl transition shadow">
                    Isi Formulir Pendaftaran Sekarang
                </a>
            </div>
        @endif

    </div>
</section>
@endsection
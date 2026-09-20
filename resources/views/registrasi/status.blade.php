@extends('layouts.app')

@section('title', 'Cek Status Pendaftaran Magang')

@section('content')
<section class="py-12 md:py-16 bg-gradient-to-b from-blue-50/50 to-white min-h-[80vh]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        
        {{-- Header Title --}}
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-diskominfo-blue mb-3">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Pelacakan Berkas Mandiri
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                Cek Status Pendaftaran Magang
            </h1>
            <p class="mt-3 text-slate-600 text-sm sm:text-base">
                Masukkan alamat email atau NIM / NIS yang Anda gunakan saat mendaftar untuk melihat progres verifikasi berkas secara langsung.
            </p>
        </div>

        {{-- Form Pencarian --}}
        <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/60 border border-slate-100 p-6 sm:p-8 mb-10">
            <form action="{{ route('registrasi.status.check') }}" method="POST" class="flex flex-col sm:flex-row gap-3">
                @csrf
                <div class="relative flex-1">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" 
                           name="keyword" 
                           value="{{ old('keyword', $search ?? '') }}" 
                           placeholder="Ketikkan Email atau NIM / NIS Anda..." 
                           required 
                           class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-slate-200 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-diskominfo-blue focus:border-transparent text-sm sm:text-base transition">
                </div>
                <button type="submit" 
                        class="bg-diskominfo-blue hover:bg-diskominfo-blue-dark text-white font-semibold px-8 py-3.5 rounded-xl transition flex items-center justify-center gap-2 shadow-md shadow-blue-900/10">
                    <span>Lacak Status</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>
            </form>
            @error('keyword')
                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Hasil Pencarian --}}
        @if ($searched)
            @if ($registrasi)
                <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden transition">
                    
                    {{-- Status Banner Top --}}
                    <div class="p-6 sm:p-8 
                        @if ($registrasi->status === 'menunggu') bg-amber-500/10 border-b border-amber-500/20
                        @elseif ($registrasi->status === 'diterima') bg-emerald-500/10 border-b border-emerald-500/20
                        @else bg-rose-500/10 border-b border-rose-500/20 @endif">
                        
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div>
                                <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Status Permohonan:</span>
                                <div class="mt-1 flex items-center gap-3">
                                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-sm font-bold
                                        @if ($registrasi->status === 'menunggu') bg-amber-100 text-amber-800
                                        @elseif ($registrasi->status === 'diterima') bg-emerald-100 text-emerald-800
                                        @else bg-rose-100 text-rose-800 @endif">
                                        <span class="w-2.5 h-2.5 rounded-full animate-pulse
                                            @if ($registrasi->status === 'menunggu') bg-amber-500
                                            @elseif ($registrasi->status === 'diterima') bg-emerald-500
                                            @else bg-rose-500 @endif"></span>
                                        {{ ucfirst($registrasi->status) }}
                                    </span>
                                    <span class="text-xs text-slate-500">
                                        Diajukan pada {{ $registrasi->created_at->translatedFormat('d F Y') }}
                                    </span>
                                </div>
                            </div>

                            @if ($registrasi->status === 'diterima')
                                <a href="{{ route('login') }}" 
                                   class="inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                    </svg>
                                    <span>Masuk ke Akun Peserta</span>
                                </a>
                            @endif
                        </div>

                        {{-- Pesan Narasi Status --}}
                        <div class="mt-5 text-sm sm:text-base leading-relaxed text-slate-700">
                            @if ($registrasi->status === 'menunggu')
                                <div class="flex items-start gap-3 p-4 bg-amber-50 rounded-xl border border-amber-200/80 text-amber-900">
                                    <svg class="w-6 h-6 text-amber-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div>
                                        <p class="font-semibold">Berkas Sedang Dalam Proses Verifikasi</p>
                                        <p class="mt-1 text-xs sm:text-sm text-amber-800">
                                            Berkas pendaftaran Anda telah berhasil diterima oleh sistem Diskominfo Kab. Tegal dan sedang dalam tahap peninjauan oleh tim admin. Silakan periksa halaman ini secara berkala.
                                        </p>
                                    </div>
                                </div>
                            @elseif ($registrasi->status === 'diterima')
                                <div class="flex items-start gap-3 p-4 bg-emerald-50 rounded-xl border border-emerald-200/80 text-emerald-900">
                                    <svg class="w-6 h-6 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div>
                                        <p class="font-semibold text-emerald-900">Selamat! Pengajuan Magang Anda Telah Disetujui</p>
                                        <p class="mt-1 text-xs sm:text-sm text-emerald-800">
                                            Anda dinyatakan diterima untuk melaksanakan program magang di Diskominfo Kabupaten Tegal. Akun peserta telah dibuat. Silakan login untuk melihat instruksi orientasi dan perlengkapan hari pertama.
                                        </p>
                                    </div>
                                </div>
                            @elseif ($registrasi->status === 'ditolak')
                                <div class="flex items-start gap-3 p-4 bg-rose-50 rounded-xl border border-rose-200/80 text-rose-900">
                                    <svg class="w-6 h-6 text-rose-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div>
                                        <p class="font-semibold text-rose-900">Pendaftaran Belum Dapat Diterima</p>
                                        <p class="mt-1 text-xs sm:text-sm text-rose-800">
                                            Mohon maaf, karena keterbatasan kuota bimbingan atau ketidaksesuaian dokumen, pengajuan Anda belum dapat disetujui pada periode ini. Anda dapat mencoba mendaftar kembali pada gelombang berikutnya.
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Timeline Tahapan --}}
                    <div class="px-6 sm:px-8 py-8 border-b border-slate-100 bg-slate-50/50">
                        <h2 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-6">
                            Tahapan Proses Pendaftaran
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            {{-- Step 1 --}}
                            <div class="flex items-center gap-3 p-3.5 bg-white rounded-xl border border-emerald-200">
                                <div class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400">Langkah 1</p>
                                    <p class="text-xs sm:text-sm font-semibold text-slate-900">Pengiriman Berkas</p>
                                </div>
                            </div>

                            {{-- Step 2 --}}
                            <div class="flex items-center gap-3 p-3.5 bg-white rounded-xl border 
                                @if ($registrasi->status === 'menunggu') border-amber-300 ring-2 ring-amber-100
                                @elseif ($registrasi->status === 'diterima') border-emerald-200
                                @else border-slate-200 @endif">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 
                                    @if ($registrasi->status === 'menunggu') bg-amber-500 text-white
                                    @elseif ($registrasi->status === 'diterima') bg-emerald-500 text-white
                                    @else bg-slate-300 text-white @endif">
                                    @if ($registrasi->status === 'diterima')
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    @else
                                        <span class="text-xs font-bold">2</span>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400">Langkah 2</p>
                                    <p class="text-xs sm:text-sm font-semibold text-slate-900">Verifikasi Dokumen</p>
                                </div>
                            </div>

                            {{-- Step 3 --}}
                            <div class="flex items-center gap-3 p-3.5 bg-white rounded-xl border 
                                @if ($registrasi->status === 'diterima') border-emerald-300 ring-2 ring-emerald-100
                                @elseif ($registrasi->status === 'ditolak') border-rose-300
                                @else border-slate-200 opacity-70 @endif">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0
                                    @if ($registrasi->status === 'diterima') bg-emerald-500 text-white
                                    @elseif ($registrasi->status === 'ditolak') bg-rose-500 text-white
                                    @else bg-slate-200 text-slate-500 @endif">
                                    @if ($registrasi->status === 'diterima')
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    @elseif ($registrasi->status === 'ditolak')
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    @else
                                        <span class="text-xs font-bold">3</span>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400">Langkah 3</p>
                                    <p class="text-xs sm:text-sm font-semibold text-slate-900">Keputusan & Onboarding</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Data Rincian Pendaftar --}}
                    <div class="p-6 sm:p-8">
                        <h2 class="text-base font-bold text-slate-900 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-diskominfo-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Rincian Data Pendaftar
                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                            <div class="bg-slate-50 p-4 rounded-xl">
                                <span class="text-xs text-slate-400 block font-medium">Nama Lengkap</span>
                                <span class="text-slate-900 font-semibold text-base mt-0.5 block">{{ $registrasi->nama_lengkap }}</span>
                            </div>

                            <div class="bg-slate-50 p-4 rounded-xl">
                                <span class="text-xs text-slate-400 block font-medium">NIM / NIS</span>
                                <span class="text-slate-900 font-semibold text-base mt-0.5 block">{{ $registrasi->nim_nis }}</span>
                            </div>

                            <div class="bg-slate-50 p-4 rounded-xl">
                                <span class="text-xs text-slate-400 block font-medium">Asal Sekolah / Kampus</span>
                                <span class="text-slate-900 font-semibold text-base mt-0.5 block">{{ $registrasi->asal_instansi }}</span>
                            </div>

                            <div class="bg-slate-50 p-4 rounded-xl">
                                <span class="text-xs text-slate-400 block font-medium">Jurusan / Program Studi</span>
                                <span class="text-slate-900 font-semibold text-base mt-0.5 block">{{ $registrasi->jurusan }}</span>
                            </div>

                            <div class="bg-slate-50 p-4 rounded-xl">
                                <span class="text-xs text-slate-400 block font-medium">Alamat Email</span>
                                <span class="text-slate-900 font-semibold text-base mt-0.5 block">{{ $registrasi->email }}</span>
                            </div>

                            <div class="bg-slate-50 p-4 rounded-xl">
                                <span class="text-xs text-slate-400 block font-medium">Periode Magang Diajukan</span>
                                <span class="text-slate-900 font-semibold text-base mt-0.5 block">
                                    {{ $registrasi->tanggal_mulai->translatedFormat('d M Y') }} s/d {{ $registrasi->tanggal_selesai->translatedFormat('d M Y') }}
                                </span>
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <span class="text-xs text-slate-400 text-center sm:text-left">
                                Butuh bantuan atau klarifikasi? Hubungi helpdesk Diskominfo Slawi di WhatsApp 0812-3456-7890.
                            </span>
                            <a href="{{ route('registrasi.create') }}" class="text-xs font-semibold text-diskominfo-blue hover:underline">
                                &larr; Buat Pendaftaran Baru
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-white rounded-2xl p-8 sm:p-12 text-center border border-slate-100 shadow-lg max-w-md mx-auto">
                    <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-slate-900 mb-2">Data Tidak Ditemukan</h2>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6">
                        Tidak ada pendaftaran yang sesuai dengan kata kunci <span class="font-semibold text-slate-800">"{{ $search }}"</span>. Pastikan Anda memasukkan Email atau NIM/NIS yang tepat.
                    </p>
                    <a href="{{ route('registrasi.create') }}" 
                       class="inline-block bg-diskominfo-blue hover:bg-diskominfo-blue-dark text-white font-semibold text-sm px-6 py-2.5 rounded-full transition shadow">
                        Daftar Magang Sekarang
                    </a>
                </div>
            @endif
        @else
            {{-- Panduan Bantuan Sebelum Mencari --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm text-center">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-diskominfo-blue flex items-center justify-center mx-auto mb-3 font-bold">1</div>
                    <h3 class="font-bold text-slate-900 text-sm">Gunakan Email Terdaftar</h3>
                    <p class="mt-1 text-xs text-slate-500">Ketikkan email yang sama persis saat Anda mengisi formulir registrasi magang.</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm text-center">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-diskominfo-blue flex items-center justify-center mx-auto mb-3 font-bold">2</div>
                    <h3 class="font-bold text-slate-900 text-sm">Atau Gunakan NIM / NIS</h3>
                    <p class="mt-1 text-xs text-slate-500">Nomor induk mahasiswa atau pelajar Anda juga bisa dijadikan identitas pencarian.</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm text-center">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-diskominfo-blue flex items-center justify-center mx-auto mb-3 font-bold">3</div>
                    <h3 class="font-bold text-slate-900 text-sm">Pembaruan Real-Time</h3>
                    <p class="mt-1 text-xs text-slate-500">Status langsung diperbarui segera setelah admin memeriksa dan memvalidasi berkas.</p>
                </div>
            </div>
        @endif

    </div>
</section>
@endsection

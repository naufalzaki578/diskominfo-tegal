@extends('layouts.app')

@section('title', 'Kelola Pendaftaran Magang')

@section('content')
{{-- Header Admin Hero --}}
<section class="bg-gradient-to-r from-slate-900 via-diskominfo-blue-dark to-slate-900 text-white py-10 md:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-diskominfo-gold bg-white/10 px-3 py-1 rounded-full">
                    Panel Administrator
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold mt-2 tracking-tight">
                    Kelola Pendaftaran Magang
                </h1>
                <p class="text-slate-300 text-xs sm:text-sm mt-1">
                    Verifikasi berkas persyaratan, tinjau dokumen surat pengantar & CV, dan tentukan status kelulusan peserta.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('registrasi.create') }}" target="_blank"
                   class="bg-white/10 hover:bg-white/20 text-white font-semibold text-xs px-4 py-2.5 rounded-xl border border-white/20 transition flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    <span>Buka Form Registrasi</span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-8 md:py-12 bg-slate-50 min-h-[85vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        {{-- Flash Notification Credentials Alert --}}
        @if (session('password_baru'))
            <div class="bg-gradient-to-r from-amber-50 to-yellow-50 border-2 border-amber-300 text-amber-950 p-6 rounded-2xl shadow-md">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-amber-500 text-white flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <div class="space-y-1 flex-1">
                        <h3 class="font-extrabold text-base text-amber-900">
                            Pendaftaran Berhasil Disetujui & Akun Peserta Dibuat!
                        </h3>
                        <p class="text-xs sm:text-sm text-amber-800">
                            Sampaikan rincian akses login berikut kepada peserta untuk mengakses Dashboard Peserta:
                        </p>
                        <div class="mt-3 bg-white/80 p-3.5 rounded-xl border border-amber-200 inline-flex flex-col sm:flex-row sm:items-center gap-4 text-xs font-mono">
                            <div>Email: <strong class="text-slate-900 font-bold">{{ session('email_baru') }}</strong></div>
                            <div class="hidden sm:block text-slate-300">|</div>
                            <div>Kata Sandi Baru: <span class="bg-amber-100 text-amber-900 px-2 py-0.5 rounded font-extrabold">{{ session('password_baru') }}</span></div>
                        </div>
                        <p class="text-[11px] text-amber-700 mt-1 italic">
                            * Simpan kata sandi ini sekarang karena demi keamanan sistem hanya menampilkannya sekali.
                        </p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Statistics Cards --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            {{-- Total --}}
            <a href="{{ route('admin.registrasi.index') }}" 
               class="bg-white p-5 rounded-2xl border {{ !$status ? 'border-diskominfo-blue ring-2 ring-blue-100' : 'border-slate-200' }} shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Total Pendaftar</span>
                    <span class="w-8 h-8 rounded-lg bg-blue-50 text-diskominfo-blue flex items-center justify-center font-bold text-xs">ALL</span>
                </div>
                <div class="mt-3">
                    <span class="text-2xl sm:text-3xl font-extrabold text-slate-900">{{ $totalCount }}</span>
                    <span class="text-xs text-slate-500 block mt-0.5">Semua berkas masuk</span>
                </div>
            </a>

            {{-- Menunggu --}}
            <a href="{{ route('admin.registrasi.index', ['status' => 'menunggu']) }}" 
               class="bg-white p-5 rounded-2xl border {{ $status === 'menunggu' ? 'border-amber-400 ring-2 ring-amber-100' : 'border-slate-200' }} shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-700">Perlu Verifikasi</span>
                    <span class="w-3 h-3 rounded-full bg-amber-400 animate-pulse"></span>
                </div>
                <div class="mt-3">
                    <span class="text-2xl sm:text-3xl font-extrabold text-amber-600">{{ $menungguCount }}</span>
                    <span class="text-xs text-slate-500 block mt-0.5">Menunggu peninjauan</span>
                </div>
            </a>

            {{-- Diterima --}}
            <a href="{{ route('admin.registrasi.index', ['status' => 'diterima']) }}" 
               class="bg-white p-5 rounded-2xl border {{ $status === 'diterima' ? 'border-emerald-400 ring-2 ring-emerald-100' : 'border-slate-200' }} shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Telah Disetujui</span>
                    <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                </div>
                <div class="mt-3">
                    <span class="text-2xl sm:text-3xl font-extrabold text-emerald-600">{{ $diterimaCount }}</span>
                    <span class="text-xs text-slate-500 block mt-0.5">Peserta diterima</span>
                </div>
            </a>

            {{-- Ditolak --}}
            <a href="{{ route('admin.registrasi.index', ['status' => 'ditolak']) }}" 
               class="bg-white p-5 rounded-2xl border {{ $status === 'ditolak' ? 'border-rose-400 ring-2 ring-rose-100' : 'border-slate-200' }} shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold uppercase tracking-wider text-rose-700">Ditolak</span>
                    <span class="w-3 h-3 rounded-full bg-rose-500"></span>
                </div>
                <div class="mt-3">
                    <span class="text-2xl sm:text-3xl font-extrabold text-rose-600">{{ $ditolakCount }}</span>
                    <span class="text-xs text-slate-500 block mt-0.5">Tidak memenuhi syarat</span>
                </div>
            </a>
        </div>

        {{-- Filter & Search Container --}}
        <div class="bg-white p-4 sm:p-6 rounded-2xl border border-slate-200 shadow-sm">
            <form action="{{ route('admin.registrasi.index') }}" method="GET" class="flex flex-col md:flex-row gap-3">
                @if ($status)
                    <input type="hidden" name="status" value="{{ $status }}">
                @endif
                
                {{-- Search Box --}}
                <div class="relative flex-1">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" 
                           name="q" 
                           value="{{ $search ?? '' }}" 
                           placeholder="Cari nama pendaftar, NIM, instansi, atau email..."
                           class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-diskominfo-blue focus:ring-2 focus:ring-diskominfo-blue/20">
                </div>

                {{-- Status Filter Dropdown --}}
                <div class="w-full md:w-48">
                    <select name="status" 
                            onchange="this.form.submit()"
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:border-diskominfo-blue focus:ring-2 focus:ring-diskominfo-blue/20 bg-white">
                        <option value="" {{ !$status ? 'selected' : '' }}>Semua Status</option>
                        <option value="menunggu" {{ $status === 'menunggu' ? 'selected' : '' }}>Menunggu Review</option>
                        <option value="diterima" {{ $status === 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak" {{ $status === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <button type="submit" 
                        class="bg-diskominfo-blue hover:bg-diskominfo-blue-dark text-white font-semibold px-6 py-2.5 rounded-xl text-sm transition flex items-center justify-center gap-1.5 shadow-sm">
                    <span>Filter Data</span>
                </button>

                @if ($search || $status)
                    <a href="{{ route('admin.registrasi.index') }}" 
                       class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold px-4 py-2.5 rounded-xl text-sm transition flex items-center justify-center">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        {{-- Table Container Responsif --}}
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs sm:text-sm">
                    <thead class="bg-slate-50/80 text-slate-600 border-b border-slate-200 font-bold uppercase text-[11px] tracking-wider">
                        <tr>
                            <th class="px-5 py-4">Calon Peserta</th>
                            <th class="px-5 py-4">Institusi & Jurusan</th>
                            <th class="px-5 py-4">Periode Magang</th>
                            <th class="px-5 py-4">Dokumen Persyaratan</th>
                            <th class="px-5 py-4">Status</th>
                            <th class="px-5 py-4 text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($registrasis as $registrasi)
                            <tr class="hover:bg-slate-50/60 transition">
                                
                                {{-- Kolom 1: Profil --}}
                                <td class="px-5 py-4">
                                    <div class="font-bold text-slate-900 text-sm sm:text-base">{{ $registrasi->nama_lengkap }}</div>
                                    <div class="text-xs text-slate-500 mt-0.5 flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                        <span>{{ $registrasi->email }}</span>
                                    </div>
                                    <div class="text-xs text-slate-500 mt-0.5 flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                        <span>{{ $registrasi->no_hp }}</span>
                                    </div>
                                </td>

                                {{-- Kolom 2: Institusi --}}
                                <td class="px-5 py-4">
                                    <div class="font-semibold text-slate-900">{{ $registrasi->asal_instansi }}</div>
                                    <div class="text-xs text-slate-500 mt-0.5">{{ $registrasi->jurusan }}</div>
                                    <div class="text-[11px] font-mono text-slate-400 mt-0.5">NIM: {{ $registrasi->nim_nis }}</div>
                                </td>

                                {{-- Kolom 3: Periode --}}
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <div class="text-xs font-semibold text-slate-800">
                                        {{ $registrasi->tanggal_mulai->translatedFormat('d M Y') }}
                                    </div>
                                    <div class="text-xs text-slate-400">s/d</div>
                                    <div class="text-xs font-semibold text-slate-800">
                                        {{ $registrasi->tanggal_selesai->translatedFormat('d M Y') }}
                                    </div>
                                </td>

                                {{-- Kolom 4: Berkas --}}
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <div class="space-y-1.5">
                                        @if ($registrasi->surat_pengantar_path)
                                            <a href="{{ route('admin.registrasi.surat', $registrasi) }}" target="_blank"
                                               class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 text-xs font-semibold transition border border-blue-200">
                                                <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                </svg>
                                                <span>Surat Pengantar</span>
                                            </a>
                                        @else
                                            <span class="text-xs text-slate-400 italic">Surat Pengantar belum ada</span>
                                        @endif

                                        @if ($registrasi->cv_path)
                                            <a href="{{ route('admin.registrasi.cv', $registrasi) }}" target="_blank"
                                               class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-amber-50 text-amber-800 hover:bg-amber-100 text-xs font-semibold transition border border-amber-200">
                                                <svg class="w-3.5 h-3.5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                                <span>Unduh CV</span>
                                            </a>
                                        @endif
                                    </div>
                                </td>

                                {{-- Kolom 5: Status Badge --}}
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold
                                        @class([
                                            'bg-amber-100 text-amber-800' => $registrasi->status === 'menunggu',
                                            'bg-emerald-100 text-emerald-800' => $registrasi->status === 'diterima',
                                            'bg-rose-100 text-rose-800' => $registrasi->status === 'ditolak',
                                        ])">
                                        <span class="w-1.5 h-1.5 rounded-full
                                            @class([
                                                'bg-amber-500' => $registrasi->status === 'menunggu',
                                                'bg-emerald-500' => $registrasi->status === 'diterima',
                                                'bg-rose-500' => $registrasi->status === 'ditolak',
                                            ])"></span>
                                        {{ ucfirst($registrasi->status) }}
                                    </span>
                                </td>

                                {{-- Kolom 6: Aksi --}}
                                <td class="px-5 py-4 whitespace-nowrap text-center">
                                    @if ($registrasi->status === 'menunggu')
                                        <div class="flex items-center justify-center gap-2">
                                            <form action="{{ route('admin.registrasi.approve', $registrasi) }}" method="POST"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin MENYETUJUI pendaftaran an. {{ $registrasi->nama_lengkap }}? Sistem akan secara otomatis membuat akun login peserta.')">
                                                @csrf
                                                <button type="submit" 
                                                        class="inline-flex items-center gap-1 bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-3 py-1.5 rounded-lg text-xs transition shadow-sm">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                                    </svg>
                                                    <span>Setujui</span>
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.registrasi.reject', $registrasi) }}" method="POST"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin MENOLAK pendaftaran an. {{ $registrasi->nama_lengkap }}?')">
                                                @csrf
                                                <button type="submit" 
                                                        class="inline-flex items-center gap-1 bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 font-bold px-3 py-1.5 rounded-lg text-xs transition">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                                                    </svg>
                                                    <span>Tolak</span>
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="text-xs text-slate-400 italic">Selesai diproses</span>
                                    @endif
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-5 py-12 text-center text-slate-400">
                                    <div class="max-w-xs mx-auto space-y-2">
                                        <svg class="w-10 h-10 mx-auto text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2h-2z"/>
                                        </svg>
                                        <p class="font-medium text-slate-600 text-sm">Tidak ada data pendaftaran yang ditemukan.</p>
                                        <p class="text-xs text-slate-400">Coba ubah kata kunci pencarian atau bersihkan filter status.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination Links --}}
            <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50">
                {{ $registrasis->links() }}
            </div>
        </div>

    </div>
</section>
@endsection
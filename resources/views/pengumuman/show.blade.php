@extends('layouts.app')

@section('title', $pengumuman->judul)

@section('content')
<section class="py-10 md:py-16 bg-slate-50 min-h-[80vh]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        
        {{-- Breadcrumb & Back button --}}
        <div class="flex items-center justify-between gap-4 mb-6">
            <a href="{{ route('pengumuman.index') }}" 
               class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-diskominfo-blue hover:text-diskominfo-blue-dark transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Kembali ke Semua Pengumuman</span>
            </a>

            <span class="text-xs text-slate-400">
                Kategori: <strong class="text-slate-700">Warta Magang</strong>
            </span>
        </div>

        {{-- Article Card --}}
        <article class="bg-white rounded-3xl border border-slate-200 shadow-lg shadow-slate-200/50 p-6 sm:p-12 space-y-6">
            
            <header class="space-y-4 pb-6 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-diskominfo-blue border border-blue-100">
                        Pengumuman Resmi
                    </span>
                    <span class="text-xs text-slate-400">
                        Diterbitkan: {{ $pengumuman->tanggal_terbit->translatedFormat('l, d F Y') }}
                    </span>
                </div>

                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight leading-snug">
                    {{ $pengumuman->judul }}
                </h1>
            </header>

            {{-- Body --}}
            <div class="prose prose-slate max-w-none text-slate-700 text-sm sm:text-base leading-relaxed space-y-4">
                {!! nl2br(e($pengumuman->isi)) !!}
            </div>

            {{-- Footer info --}}
            <div class="pt-8 mt-8 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                <div>
                    Dinas Komunikasi dan Informatika Pemerintah Kabupaten Tegal
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('registrasi.create') }}" 
                       class="bg-diskominfo-blue hover:bg-diskominfo-blue-dark text-white font-bold px-5 py-2.5 rounded-xl transition text-xs">
                        Daftar Magang Sekarang
                    </a>
                </div>
            </div>

        </article>

    </div>
</section>
@endsection

@extends('layouts.app')

@section('title', 'Pengumuman & Warta')

@section('content')
{{-- Header Hero --}}
<section class="bg-gradient-to-r from-diskominfo-navy to-diskominfo-blue text-white py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-xs text-blue-200 mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li><a href="{{ route('beranda') }}" class="hover:text-white transition">Beranda</a></li>
                <li><span>&rsaquo;</span></li>
                <li class="text-white font-medium">Pengumuman</li>
            </ol>
        </nav>
        <span class="text-xs font-bold uppercase tracking-wider text-diskominfo-gold bg-white/10 px-3 py-1 rounded-full">
            Informasi Terkini
        </span>
        <h1 class="text-3xl sm:text-4xl font-extrabold mt-3 tracking-tight">
            Pengumuman & Warta Magang
        </h1>
        <p class="text-blue-100 text-sm sm:text-base mt-2 max-w-2xl">
            Informasi resmi seputar gelombang penerimaan, jadwal seleksi berkas, dan pengumuman hasil magang di Diskominfo Kab. Tegal.
        </p>
    </div>
</section>

<section class="py-12 md:py-16 bg-slate-50 min-h-[75vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($pengumuman as $item)
                <a href="{{ route('pengumuman.show', $item) }}"
                   class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-3">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-blue-50 text-diskominfo-blue border border-blue-100">
                                Warta Resmi
                            </span>
                            <span class="text-xs text-slate-400">
                                {{ $item->tanggal_terbit->translatedFormat('d F Y') }}
                            </span>
                        </div>
                        <h2 class="font-bold text-base sm:text-lg text-slate-900 group-hover:text-diskominfo-blue transition line-clamp-2">
                            {{ $item->judul }}
                        </h2>
                        <p class="mt-2.5 text-xs sm:text-sm text-slate-500 leading-relaxed line-clamp-3">
                            {{ Str::limit(strip_tags($item->isi), 140) }}
                        </p>
                    </div>
                    
                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-diskominfo-blue">
                        <span>Baca Selengkapnya</span>
                        <span class="group-hover:translate-x-1 transition">&rarr;</span>
                    </div>
                </a>
            @empty
                <div class="col-span-full bg-white rounded-3xl p-12 text-center border border-slate-200 shadow-sm max-w-md mx-auto">
                    <div class="w-14 h-14 rounded-2xl bg-blue-50 text-diskominfo-blue flex items-center justify-center mx-auto mb-3">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-slate-900 text-base">Belum Ada Pengumuman</h3>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">
                        Pengumuman terbaru akan dipublikasikan di halaman ini secara berkala.
                    </p>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $pengumuman->links() }}
        </div>

    </div>
</section>
@endsection

@extends('layouts.app')

@section('title', 'Pengumuman')

@section('content')
<section class="max-w-5xl mx-auto px-6 py-16">
    <h1 class="text-3xl font-bold text-slate-900 mb-8">Pengumuman</h1>

    @forelse ($pengumuman as $item)
        <a href="{{ route('pengumuman.show', $item) }}"
           class="block border-b border-slate-100 py-6 hover:bg-slate-50 -mx-4 px-4 rounded-lg transition">
            <span class="text-xs text-slate-400">{{ $item->tanggal_terbit->translatedFormat('d F Y') }}</span>
            <h2 class="mt-1 text-lg font-semibold text-slate-900">{{ $item->judul }}</h2>
            <p class="mt-2 text-sm text-slate-500">{{ Str::limit(strip_tags($item->isi), 160) }}</p>
        </a>
    @empty
        <p class="text-slate-500">Belum ada pengumuman yang tersedia saat ini.</p>
    @endforelse

    <div class="mt-8">
        {{ $pengumuman->links() }}
    </div>
</section>
@endsection

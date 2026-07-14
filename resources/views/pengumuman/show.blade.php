@extends('layouts.app')

@section('title', $pengumuman->judul)

@section('content')
<section class="max-w-3xl mx-auto px-6 py-16">
    <a href="{{ route('pengumuman.index') }}" class="text-sm text-diskominfo-blue hover:underline">&larr; Kembali ke Pengumuman</a>

    <span class="block mt-4 text-xs text-slate-400">{{ $pengumuman->tanggal_terbit->translatedFormat('d F Y') }}</span>
    <h1 class="mt-2 text-3xl font-bold text-slate-900">{{ $pengumuman->judul }}</h1>

    <div class="mt-6 prose prose-slate max-w-none text-slate-600">
        {!! $pengumuman->isi !!}
    </div>
</section>
@endsection

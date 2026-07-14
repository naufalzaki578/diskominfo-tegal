@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="max-w-5xl mx-auto px-6 py-16">
    <h1 class="text-2xl font-bold text-slate-900">Selamat datang, {{ auth()->user()->name }}</h1>
    <p class="mt-2 text-slate-500">Ini adalah halaman dashboard setelah Anda berhasil masuk.</p>
</section>
@endsection

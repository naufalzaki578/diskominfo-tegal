@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<section class="max-w-5xl mx-auto px-6 py-16">
    <h1 class="text-3xl font-bold text-slate-900">Profil Dinas Komunikasi dan Informatika</h1>
    <p class="mt-1 text-slate-500">Kabupaten Tegal</p>

    <div class="mt-8 grid md:grid-cols-2 gap-8">
        <div>
            <h2 class="font-semibold text-diskominfo-blue mb-2">Visi</h2>
            <p class="text-slate-600 leading-relaxed">
                Mewujudkan tata kelola pemerintahan yang transparan, akuntabel, dan responsif melalui
                pemanfaatan teknologi informasi dan komunikasi yang inovatif.
            </p>
        </div>
        <div>
            <h2 class="font-semibold text-diskominfo-blue mb-2">Misi</h2>
            <ul class="list-disc list-inside text-slate-600 space-y-1">
                <li>Meningkatkan kualitas infrastruktur teknologi informasi daerah.</li>
                <li>Mendorong keterbukaan informasi publik yang mudah diakses masyarakat.</li>
                <li>Membina generasi muda melalui program magang dan pelatihan digital.</li>
            </ul>
        </div>
    </div>

    <div class="mt-12">
        <h2 class="font-semibold text-diskominfo-blue mb-2">Tentang Program Magang</h2>
        <p class="text-slate-600 leading-relaxed max-w-3xl">
            Program magang Diskominfo Kabupaten Tegal terbuka bagi mahasiswa dan siswa SMK/SMA
            yang ingin mengembangkan kemampuan di bidang teknologi informasi, kehumasan, dan
            layanan publik digital. Peserta akan dibimbing langsung oleh staf profesional di
            lingkungan dinas.
        </p>
    </div>
</section>
@endsection

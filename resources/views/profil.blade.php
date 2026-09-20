@extends('layouts.app')

@section('title', 'Profil Dinas')

@section('content')
{{-- ============ HEADER HERO ============ --}}
<section class="bg-gradient-to-r from-diskominfo-navy to-diskominfo-blue text-white py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-xs text-blue-200 mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li><a href="{{ route('beranda') }}" class="hover:text-white transition">Beranda</a></li>
                <li><span>&rsaquo;</span></li>
                <li class="text-white font-medium">Profil Dinas</li>
            </ol>
        </nav>
        <span class="text-xs font-bold uppercase tracking-wider text-diskominfo-gold bg-white/10 px-3 py-1 rounded-full">
            Tentang Kami
        </span>
        <h1 class="text-3xl sm:text-4xl font-extrabold mt-3 tracking-tight">
            Dinas Komunikasi dan Informatika
        </h1>
        <p class="text-blue-100 text-sm sm:text-base mt-2 max-w-2xl">
            Pemerintah Kabupaten Tegal - Mewujudkan tata kelola pemerintahan berbasis elektronik (SPBE) yang terintegrasi, transparan, dan berdaya saing.
        </p>
    </div>
</section>

{{-- ============ VISI & MISI ============ --}}
<section class="py-12 md:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-8 items-stretch">
            
            {{-- Visi --}}
            <div class="bg-gradient-to-br from-blue-50 to-white p-8 rounded-3xl border border-blue-100 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-diskominfo-blue text-white flex items-center justify-center mb-5 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <span class="text-xs font-bold uppercase tracking-wider text-diskominfo-blue">Arah Masa Depan</span>
                    <h2 class="text-2xl font-extrabold text-slate-900 mt-1 mb-4">Visi Dinas</h2>
                    <p class="text-slate-700 text-base leading-relaxed italic">
                        &ldquo;Mewujudkan tata kelola pemerintahan daerah yang transparan, akuntabel, dan responsif melalui pemanfaatan teknologi informasi dan komunikasi yang inovatif serta inklusif di Kabupaten Tegal.&rdquo;
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-blue-100 text-xs text-slate-500">
                    RPJMD Kabupaten Tegal Bidang Komunikasi, Informatika, dan Persandian.
                </div>
            </div>

            {{-- Misi --}}
            <div class="bg-gradient-to-br from-amber-50/50 to-white p-8 rounded-3xl border border-amber-100 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-amber-500 text-white flex items-center justify-center mb-5 shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-700">Langkah Nyata</span>
                    <h2 class="text-2xl font-extrabold text-slate-900 mt-1 mb-4">Misi Strategis</h2>
                    <ul class="space-y-3 text-slate-700 text-sm leading-relaxed">
                        <li class="flex items-start gap-2.5">
                            <span class="w-5 h-5 rounded-full bg-amber-100 text-amber-800 flex items-center justify-center shrink-0 font-bold text-xs mt-0.5">1</span>
                            <span>Mengembangkan infrastruktur jaringan dan pusat data terpadu di seluruh instansi Pemkab Tegal.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="w-5 h-5 rounded-full bg-amber-100 text-amber-800 flex items-center justify-center shrink-0 font-bold text-xs mt-0.5">2</span>
                            <span>Meningkatkan keterbukaan informasi publik dan layanan komunikasi interaktif kepada masyarakat.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="w-5 h-5 rounded-full bg-amber-100 text-amber-800 flex items-center justify-center shrink-0 font-bold text-xs mt-0.5">3</span>
                            <span>Membina dan memfasilitasi talenta digital muda melalui program magang dan riset teknologi terapan.</span>
                        </li>
                    </ul>
                </div>
                <div class="mt-6 pt-4 border-t border-amber-100 text-xs text-slate-500">
                    Mendukung transformasi digital Kabupaten Tegal Menuju Smart City.
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ============ STRUKTUR BIDANG OPERASIONAL ============ --}}
<section class="py-12 md:py-16 bg-slate-50 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                Bidang & Divisi Kerja
            </h2>
            <p class="text-slate-600 text-sm mt-2">
                Struktur organisasi teknis yang menjadi tempat pembinaan peserta magang:
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <div class="w-10 h-10 rounded-xl bg-blue-100 text-diskominfo-blue flex items-center justify-center font-bold mb-4">
                    01
                </div>
                <h3 class="font-bold text-base text-slate-900">Bidang Tata Kelola E-Gov & SPBE</h3>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                    Bertanggung jawab atas arsitektur SPBE, pengembangan sistem informasi pelayanan publik terpadu, dan pengelolaan cloud server daerah.
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center font-bold mb-4">
                    02
                </div>
                <h3 class="font-bold text-base text-slate-900">Bidang Statistik & Persandian</h3>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                    Mengelola metadata statistik sektoral daerah (Satu Data Tegal) serta pengamanan jaringan, kriptografi, dan mitigasi ancaman siber (CSIRT).
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <div class="w-10 h-10 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center font-bold mb-4">
                    03
                </div>
                <h3 class="font-bold text-base text-slate-900">Bidang Informasi & Komunikasi Publik</h3>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                    Penyebarluasan warta daerah, pengelolaan media sosial resmi, penyelenggaraan konferensi pers, serta layanan Pejabat Pengelola Informasi dan Dokumentasi (PPID).
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ============ FASILITAS & BENEFIT MAGANG ============ --}}
<section class="py-12 md:py-16 bg-white border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                Fasilitas Peserta Magang
            </h2>
            <p class="text-slate-600 text-sm mt-2">
                Dukungan fasilitas lingkungan kerja modern di kantor Diskominfo Slawi:
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100">
                <div class="w-12 h-12 rounded-xl bg-blue-100 text-diskominfo-blue flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="font-bold text-slate-900 text-sm">Ruang Kerja Ber-AC</h3>
                <p class="text-xs text-slate-500 mt-1">Meja dan koneksi Wi-Fi berkecepatan tinggi.</p>
            </div>

            <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100">
                <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <h3 class="font-bold text-slate-900 text-sm">Mentor Berpengalaman</h3>
                <p class="text-xs text-slate-500 mt-1">Bimbingan harian dari staf ASN teknis.</p>
            </div>

            <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100">
                <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138z"/></svg>
                </div>
                <h3 class="font-bold text-slate-900 text-sm">Sertifikat Resmi</h3>
                <p class="text-xs text-slate-500 mt-1">Sertifikat terakreditasi Pemkab Tegal.</p>
            </div>

            <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100">
                <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h3 class="font-bold text-slate-900 text-sm">Portofolio Nyata</h3>
                <p class="text-xs text-slate-500 mt-1">Pengalaman di proyek ril pemerintahan.</p>
            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('registrasi.create') }}" 
               class="inline-flex items-center gap-2 bg-diskominfo-blue hover:bg-diskominfo-blue-dark text-white font-bold px-8 py-3.5 rounded-full transition shadow">
                <span>Daftar Sebagai Peserta Magang</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>
</section>
@endsection

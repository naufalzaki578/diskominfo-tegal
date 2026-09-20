@extends('layouts.app')

@section('title', 'Formulir Registrasi Magang')

@section('content')
{{-- Header Hero --}}
<section class="bg-gradient-to-r from-diskominfo-navy to-diskominfo-blue text-white py-12 md:py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <nav class="flex text-xs text-blue-200 mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li><a href="{{ route('beranda') }}" class="hover:text-white transition">Beranda</a></li>
                <li><span>&rsaquo;</span></li>
                <li class="text-white font-medium">Formulir Pendaftaran</li>
            </ol>
        </nav>
        <span class="text-xs font-bold uppercase tracking-wider text-diskominfo-gold bg-white/10 px-3 py-1 rounded-full">
            Registrasi Online
        </span>
        <h1 class="text-3xl sm:text-4xl font-extrabold mt-3 tracking-tight">
            Pendaftaran Magang Diskominfo Kab. Tegal
        </h1>
        <p class="text-blue-100 text-sm sm:text-base mt-2">
            Isi formulir berikut dengan teliti dan unggah Surat Pengantar resmi dari sekolah atau universitas Anda.
        </p>
    </div>
</section>

<section class="py-12 md:py-16 bg-slate-50 min-h-[80vh]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">

        {{-- Petunjuk Singkat --}}
        <div class="bg-blue-50/80 border border-blue-200/80 rounded-2xl p-5 sm:p-6 mb-8 flex items-start gap-4 text-sm text-blue-900 shadow-sm">
            <div class="w-8 h-8 rounded-xl bg-diskominfo-blue text-white flex items-center justify-center shrink-0 mt-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="leading-relaxed">
                <p class="font-bold text-diskominfo-blue">Sebelum mengisi, siapkan dokumen berikut:</p>
                <ul class="list-disc list-inside mt-1 space-y-0.5 text-xs sm:text-sm text-blue-800">
                    <li>Surat Pengantar resmi dari Dekan / Kepala Program Studi / Kepala Sekolah (format PDF, maks. 2MB).</li>
                    <li>Curriculum Vitae / Resume portofolio (opsional, format PDF).</li>
                    <li>Pastikan nomor WhatsApp dan email aktif untuk konfirmasi penerimaan.</li>
                </ul>
            </div>
        </div>

        {{-- Error Alerts --}}
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-800 px-5 py-4 rounded-2xl text-sm mb-8 shadow-sm">
                <div class="flex items-center gap-2 font-bold mb-2 text-red-900">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Terdapat beberapa data yang perlu diperbaiki:</span>
                </div>
                <ul class="list-disc list-inside space-y-1 text-xs sm:text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Container --}}
        <div class="bg-white rounded-3xl border border-slate-200 shadow-xl shadow-slate-200/50 p-6 sm:p-10">
            <form action="{{ route('registrasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                @csrf

                {{-- SECTION 1: DATA DIRI --}}
                <div>
                    <div class="flex items-center gap-3 pb-3 mb-6 border-b border-slate-100">
                        <span class="w-7 h-7 rounded-lg bg-blue-100 text-diskominfo-blue flex items-center justify-center font-extrabold text-xs">1</span>
                        <h2 class="text-lg font-bold text-slate-900">Identitas Pribadi</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="nama_lengkap" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Nama Lengkap Sesuai KTP / KTM <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}"
                                   placeholder="Contoh: Muhammad Budi Santoso"
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-diskominfo-blue focus:ring-2 focus:ring-diskominfo-blue/20 transition" required>
                        </div>

                        <div>
                            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Alamat Email Aktif <span class="text-rose-500">*</span>
                            </label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                   placeholder="nama@email.com"
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-diskominfo-blue focus:ring-2 focus:ring-diskominfo-blue/20 transition" required>
                            <span class="text-[11px] text-slate-400 mt-1 block">Digunakan untuk login dan pelacakan status.</span>
                        </div>

                        <div>
                            <label for="no_hp" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Nomor WhatsApp / HP <span class="text-rose-500">*</span>
                            </label>
                            <input type="tel" name="no_hp" id="no_hp" value="{{ old('no_hp') }}"
                                   placeholder="08xxxxxxxxxx"
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-diskominfo-blue focus:ring-2 focus:ring-diskominfo-blue/20 transition" required>
                            <span class="text-[11px] text-slate-400 mt-1 block">Pastikan nomor aktif dan terhubung WhatsApp.</span>
                        </div>
                    </div>
                </div>

                {{-- SECTION 2: DATA PENDIDIKAN --}}
                <div>
                    <div class="flex items-center gap-3 pb-3 mb-6 border-b border-slate-100">
                        <span class="w-7 h-7 rounded-lg bg-blue-100 text-diskominfo-blue flex items-center justify-center font-extrabold text-xs">2</span>
                        <h2 class="text-lg font-bold text-slate-900">Institusi & Bidang Studi</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="nim_nis" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                NIM / NIS <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="nim_nis" id="nim_nis" value="{{ old('nim_nis') }}"
                                   placeholder="Nomor Induk Mahasiswa/Siswa"
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-diskominfo-blue focus:ring-2 focus:ring-diskominfo-blue/20 transition" required>
                        </div>

                        <div>
                            <label for="asal_instansi" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Asal Kampus / Sekolah <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="asal_instansi" id="asal_instansi" value="{{ old('asal_instansi') }}"
                                   placeholder="Contoh: Politeknik Harapan Bersama"
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-diskominfo-blue focus:ring-2 focus:ring-diskominfo-blue/20 transition" required>
                        </div>

                        <div>
                            <label for="jurusan" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Program Studi / Jurusan <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan') }}"
                                   placeholder="Contoh: D4 Teknik Informatika"
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-diskominfo-blue focus:ring-2 focus:ring-diskominfo-blue/20 transition" required>
                        </div>
                    </div>
                </div>

                {{-- SECTION 3: PERIODE MAGANG --}}
                <div>
                    <div class="flex items-center gap-3 pb-3 mb-6 border-b border-slate-100">
                        <span class="w-7 h-7 rounded-lg bg-blue-100 text-diskominfo-blue flex items-center justify-center font-extrabold text-xs">3</span>
                        <h2 class="text-lg font-bold text-slate-900">Rencana Periode Magang</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="tanggal_mulai" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Tanggal Mulai Magang <span class="text-rose-500">*</span>
                            </label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ old('tanggal_mulai') }}"
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-diskominfo-blue focus:ring-2 focus:ring-diskominfo-blue/20 transition" required>
                        </div>

                        <div>
                            <label for="tanggal_selesai" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Tanggal Selesai Magang <span class="text-rose-500">*</span>
                            </label>
                            <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{ old('tanggal_selesai') }}"
                                   class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-diskominfo-blue focus:ring-2 focus:ring-diskominfo-blue/20 transition" required>
                        </div>
                    </div>
                    <span class="text-[11px] text-slate-400 mt-2 block">
                        Jadwal dapat disesuaikan kembali pada saat konfirmasi penerimaan oleh dinas.
                    </span>
                </div>

                {{-- SECTION 4: UNGGAH BERKAS --}}
                <div>
                    <div class="flex items-center gap-3 pb-3 mb-6 border-b border-slate-100">
                        <span class="w-7 h-7 rounded-lg bg-blue-100 text-diskominfo-blue flex items-center justify-center font-extrabold text-xs">4</span>
                        <h2 class="text-lg font-bold text-slate-900">Unggah Dokumen Persyaratan</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        {{-- Surat Pengantar Box --}}
                        <div class="border-2 border-dashed border-slate-300 hover:border-diskominfo-blue rounded-2xl p-5 text-center transition bg-slate-50/50 group">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 text-diskominfo-blue flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                            </div>
                            <label for="surat_pengantar" class="block text-xs font-bold uppercase tracking-wider text-slate-800 mb-1 cursor-pointer">
                                Surat Pengantar Instansi <span class="text-rose-500">*</span>
                            </label>
                            <p class="text-[11px] text-slate-500 mb-3">Format PDF resmi, ukuran maksimal 2MB.</p>
                            <input type="file" name="surat_pengantar" id="surat_pengantar" accept="application/pdf"
                                   class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-diskominfo-blue file:text-white hover:file:bg-diskominfo-blue-dark cursor-pointer" required>
                        </div>

                        {{-- CV Box --}}
                        <div class="border-2 border-dashed border-slate-300 hover:border-diskominfo-blue rounded-2xl p-5 text-center transition bg-slate-50/50 group">
                            <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <label for="cv" class="block text-xs font-bold uppercase tracking-wider text-slate-800 mb-1 cursor-pointer">
                                Curriculum Vitae / Resume <span class="text-slate-400 font-normal">(Opsional)</span>
                            </label>
                            <p class="text-[11px] text-slate-500 mb-3">Format PDF, sertakan portofolio/link proyek.</p>
                            <input type="file" name="cv" id="cv" accept="application/pdf"
                                   class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-slate-700 file:text-white hover:file:bg-slate-900 cursor-pointer">
                        </div>

                    </div>
                </div>

                {{-- Persetujuan Pernyataan --}}
                <div class="pt-4 border-t border-slate-100">
                    <label class="flex items-start gap-3 text-xs sm:text-sm text-slate-600 cursor-pointer">
                        <input type="checkbox" required class="w-4 h-4 mt-0.5 rounded border-slate-300 text-diskominfo-blue focus:ring-diskominfo-blue">
                        <span>
                            Saya menyatakan bahwa data dan dokumen yang saya unggah adalah benar dan dapat dipertanggungjawabkan keasliannya. Saya bersedia menaati seluruh tata tertib dan peraturan selama magang di lingkungan Diskominfo Kab. Tegal.
                        </span>
                    </label>
                </div>

                {{-- Submit Button --}}
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4">
                    <p class="text-xs text-slate-400 text-center sm:text-left">
                        Setelah mengirim, Anda akan diarahkan ke halaman pelacakan status.
                    </p>
                    <button type="submit"
                            class="w-full sm:w-auto bg-diskominfo-blue hover:bg-diskominfo-blue-dark text-white font-bold px-10 py-4 rounded-xl transition shadow-lg shadow-blue-900/10 flex items-center justify-center gap-2">
                        <span>Kirim Pendaftaran Magang</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </div>

            </form>
        </div>

    </div>
</section>
@endsection
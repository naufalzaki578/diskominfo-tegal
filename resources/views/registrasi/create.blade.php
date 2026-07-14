@extends('layouts.app')

@section('title', 'Registrasi Magang')

@section('content')
<section class="max-w-3xl mx-auto px-6 py-16">
    <h1 class="text-3xl font-bold text-slate-900 mb-2">Formulir Pendaftaran Magang</h1>
    <p class="text-slate-500 mb-8">Lengkapi seluruh data di bawah ini dengan benar sebelum mengirimkan pendaftaran.</p>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm mb-6">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('registrasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="nama_lengkap" class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-diskominfo-blue focus:ring-diskominfo-blue" required>
            </div>
            <div>
                <label for="nim_nis" class="block text-sm font-medium text-slate-700 mb-1">NIM / NIS</label>
                <input type="text" name="nim_nis" id="nim_nis" value="{{ old('nim_nis') }}"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-diskominfo-blue focus:ring-diskominfo-blue" required>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="asal_instansi" class="block text-sm font-medium text-slate-700 mb-1">Asal Sekolah / Kampus</label>
                <input type="text" name="asal_instansi" id="asal_instansi" value="{{ old('asal_instansi') }}"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-diskominfo-blue focus:ring-diskominfo-blue" required>
            </div>
            <div>
                <label for="jurusan" class="block text-sm font-medium text-slate-700 mb-1">Jurusan / Program Studi</label>
                <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan') }}"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-diskominfo-blue focus:ring-diskominfo-blue" required>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-diskominfo-blue focus:ring-diskominfo-blue" required>
            </div>
            <div>
                <label for="no_hp" class="block text-sm font-medium text-slate-700 mb-1">Nomor HP / WhatsApp</label>
                <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-diskominfo-blue focus:ring-diskominfo-blue" required>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="tanggal_mulai" class="block text-sm font-medium text-slate-700 mb-1">Tanggal Mulai Magang</label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ old('tanggal_mulai') }}"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-diskominfo-blue focus:ring-diskominfo-blue" required>
            </div>
            <div>
                <label for="tanggal_selesai" class="block text-sm font-medium text-slate-700 mb-1">Tanggal Selesai Magang</label>
                <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{ old('tanggal_selesai') }}"
                       class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-diskominfo-blue focus:ring-diskominfo-blue" required>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="surat_pengantar" class="block text-sm font-medium text-slate-700 mb-1">
                    Surat Pengantar Instansi (PDF, maks 2MB)
                </label>
                <input type="file" name="surat_pengantar" id="surat_pengantar" accept="application/pdf"
                       class="w-full text-sm border border-slate-300 rounded-lg px-3 py-2" required>
            </div>
            <div>
                <label for="cv" class="block text-sm font-medium text-slate-700 mb-1">CV (opsional, PDF)</label>
                <input type="file" name="cv" id="cv" accept="application/pdf"
                       class="w-full text-sm border border-slate-300 rounded-lg px-3 py-2">
            </div>
        </div>

        <button type="submit"
                class="bg-diskominfo-blue hover:bg-diskominfo-blue-dark text-white font-semibold px-8 py-3 rounded-full transition">
            Kirim Pendaftaran
        </button>
    </form>
</section>
@endsection
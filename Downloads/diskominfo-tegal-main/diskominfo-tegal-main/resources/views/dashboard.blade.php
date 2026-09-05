@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="max-w-3xl mx-auto px-6 py-16">
    <h1 class="text-2xl font-bold text-slate-900">Selamat datang, {{ auth()->user()->name }}</h1>

    @if (auth()->user()->role === 'admin')
        <p class="mt-2 text-slate-500">Anda login sebagai admin.</p>
        <a href="{{ route('admin.registrasi.index') }}"
           class="inline-block mt-6 bg-diskominfo-blue text-white font-semibold px-6 py-3 rounded-full">
            Kelola Pendaftaran Magang
        </a>
    @elseif ($registrasi)
        <p class="mt-2 text-slate-500">Berikut status pendaftaran magang Anda.</p>

        <div class="mt-8 bg-white border border-slate-200 rounded-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-slate-900">Status Pendaftaran</h2>
                <span class="px-3 py-1 rounded-full text-sm font-medium
                    @class([
                        'bg-yellow-100 text-yellow-700' => $registrasi->status === 'menunggu',
                        'bg-green-100 text-green-700' => $registrasi->status === 'diterima',
                        'bg-red-100 text-red-700' => $registrasi->status === 'ditolak',
                    ])">
                    {{ ucfirst($registrasi->status) }}
                </span>
            </div>

            <dl class="grid grid-cols-2 gap-4 text-sm">
                <div>
                    <dt class="text-slate-500">Nama Lengkap</dt>
                    <dd class="font-medium text-slate-900">{{ $registrasi->nama_lengkap }}</dd>
                </div>
                <div>
                    <dt class="text-slate-500">Asal Instansi</dt>
                    <dd class="font-medium text-slate-900">{{ $registrasi->asal_instansi }}</dd>
                </div>
                <div>
                    <dt class="text-slate-500">Jurusan</dt>
                    <dd class="font-medium text-slate-900">{{ $registrasi->jurusan }}</dd>
                </div>
                <div>
                    <dt class="text-slate-500">Email</dt>
                    <dd class="font-medium text-slate-900">{{ $registrasi->email }}</dd>
                </div>
                <div>
                    <dt class="text-slate-500">Tanggal Mulai</dt>
                    <dd class="font-medium text-slate-900">{{ $registrasi->tanggal_mulai->format('d M Y') }}</dd>
                </div>
                <div>
                    <dt class="text-slate-500">Tanggal Selesai</dt>
                    <dd class="font-medium text-slate-900">{{ $registrasi->tanggal_selesai->format('d M Y') }}</dd>
                </div>
            </dl>

            @if ($registrasi->status === 'menunggu')
                <p class="mt-4 text-sm text-slate-500">Pendaftaran Anda sedang ditinjau oleh admin.</p>
            @elseif ($registrasi->status === 'diterima')
                <p class="mt-4 text-sm text-green-700">Selamat, pendaftaran Anda diterima!</p>
            @elseif ($registrasi->status === 'ditolak')
                <p class="mt-4 text-sm text-red-700">Mohon maaf, pendaftaran Anda belum bisa diterima kali ini.</p>
            @endif
        </div>
    @else
        <p class="mt-2 text-slate-500">Tidak ada data pendaftaran yang terhubung dengan akun ini.</p>
    @endif
</section>
@endsection
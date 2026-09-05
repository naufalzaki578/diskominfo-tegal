@extends('layouts.app')

@section('title', 'Kelola Pendaftaran Magang')

@section('content')
<section class="max-w-5xl mx-auto px-6 py-16">
    <h1 class="text-3xl font-bold text-slate-900 mb-8">Kelola Pendaftaran Magang</h1>

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if (session('password_baru'))
        <div class="bg-amber-50 border border-amber-200 text-amber-800 px-4 py-3 rounded-lg text-sm mb-6">
            <p class="font-semibold mb-1">Akun baru berhasil dibuat. Sampaikan info ini ke peserta:</p>
            <p>Email: <span class="font-mono">{{ session('email_baru') }}</span></p>
            <p>Password: <span class="font-mono">{{ session('password_baru') }}</span></p>
            <p class="mt-1 text-xs">Password ini hanya ditampilkan sekali dan tidak disimpan dalam bentuk asli.</p>
        </div>
    @endif

    <div class="bg-white border border-slate-200 rounded-lg overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Asal Instansi</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($registrasis as $registrasi)
                    <tr>
                        <td class="px-4 py-3">{{ $registrasi->nama_lengkap }}</td>
                        <td class="px-4 py-3">{{ $registrasi->asal_instansi }}</td>
                        <td class="px-4 py-3">{{ $registrasi->email }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                @class([
                                    'bg-yellow-100 text-yellow-700' => $registrasi->status === 'menunggu',
                                    'bg-green-100 text-green-700' => $registrasi->status === 'diterima',
                                    'bg-red-100 text-red-700' => $registrasi->status === 'ditolak',
                                ])">
                                {{ ucfirst($registrasi->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 space-x-2">
                            @if ($registrasi->status === 'menunggu')
                                <form action="{{ route('admin.registrasi.approve', $registrasi) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-green-600 hover:underline text-sm">Terima</button>
                                </form>
                                <form action="{{ route('admin.registrasi.reject', $registrasi) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-red-600 hover:underline text-sm">Tolak</button>
                                </form>
                            @else
                                <span class="text-slate-400 text-sm">-</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-slate-400">Belum ada pendaftaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $registrasis->links() }}
    </div>
</section>
@endsection
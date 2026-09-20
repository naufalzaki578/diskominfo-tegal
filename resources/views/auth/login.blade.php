@extends('layouts.app')

@section('title', 'Masuk ke Akun')

@section('content')
<section class="py-12 md:py-20 bg-gradient-to-b from-blue-50/60 via-slate-50 to-white min-h-[80vh] flex items-center justify-center px-4">
    <div class="w-full max-w-md">
        
        {{-- Card Container --}}
        <div class="bg-white rounded-3xl border border-slate-200 shadow-xl shadow-slate-200/60 p-6 sm:p-10 space-y-6">
            
            {{-- Header --}}
            <div class="text-center space-y-2">
                <div class="w-14 h-14 rounded-2xl bg-diskominfo-blue/10 text-diskominfo-blue flex items-center justify-center mx-auto mb-2 border border-blue-100">
                    <img src="{{ asset('images/logo-tegal.svg') }}" alt="Logo Kab. Tegal" class="w-8 h-8 object-contain">
                </div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Masuk ke Akun</h1>
                <p class="text-xs sm:text-sm text-slate-500">
                    Gunakan email dan kata sandi Anda untuk mengakses portal Diskominfo Kab. Tegal.
                </p>
            </div>

            {{-- Error Message --}}
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-xs sm:text-sm flex items-start gap-2.5">
                    <svg class="w-4 h-4 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            {{-- Form Login --}}
            <form action="{{ route('login.attempt') }}" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Alamat Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                               placeholder="nama@email.com"
                               class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-300 text-sm focus:border-diskominfo-blue focus:ring-2 focus:ring-diskominfo-blue/20 transition" required autofocus>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Kata Sandi
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input type="password" name="password" id="password"
                               placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;"
                               class="w-full pl-10 pr-12 py-3 rounded-xl border border-slate-300 text-sm focus:border-diskominfo-blue focus:ring-2 focus:ring-diskominfo-blue/20 transition" required>
                        <button type="button" id="toggle-password" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600">
                            <svg id="eye-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 text-slate-600 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-diskominfo-blue focus:ring-diskominfo-blue">
                        <span>Ingat saya</span>
                    </label>
                    <a href="{{ route('registrasi.status') }}" class="text-diskominfo-blue hover:underline font-semibold">
                        Lacak Berkas Saya
                    </a>
                </div>

                <button type="submit"
                        class="w-full bg-diskominfo-blue hover:bg-diskominfo-blue-dark text-white font-bold py-3.5 rounded-xl transition shadow-md shadow-blue-900/10 text-sm flex items-center justify-center gap-2">
                    <span>Masuk ke Akun</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>
            </form>

            {{-- Demo Helper Box --}}
            <div class="pt-4 border-t border-slate-100">
                <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400 text-center mb-2">
                    Akses Cepat Pengujian (Demo):
                </p>
                <div class="grid grid-cols-2 gap-2">
                    <button type="button" 
                            onclick="fillCredentials('admin@diskominfo.tegalkab.go.id', 'password')"
                            class="p-2 rounded-xl bg-slate-50 hover:bg-amber-50 border border-slate-200 text-[11px] text-slate-700 hover:text-amber-900 transition text-center font-medium">
                        Akun Admin
                    </button>
                    <button type="button" 
                            onclick="fillCredentials('budi@mahasiswa.ac.id', 'password')"
                            class="p-2 rounded-xl bg-slate-50 hover:bg-blue-50 border border-slate-200 text-[11px] text-slate-700 hover:text-blue-900 transition text-center font-medium">
                        Akun Peserta
                    </button>
                </div>
            </div>

            <div class="text-center text-xs text-slate-500 pt-2">
                Belum mendaftar magang?
                <a href="{{ route('registrasi.create') }}" class="text-diskominfo-blue font-bold hover:underline ml-1">
                    Daftar di sini &rarr;
                </a>
            </div>

        </div>

    </div>
</section>

@push('scripts')
<script>
    function fillCredentials(email, password) {
        document.getElementById('email').value = email;
        document.getElementById('password').value = password;
    }

    const togglePassword = document.getElementById('toggle-password');
    const passwordInput = document.getElementById('password');

    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        });
    }
</script>
@endpush
@endsection

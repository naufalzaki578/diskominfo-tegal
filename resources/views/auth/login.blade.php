@extends('layouts.app')

@section('title', 'Login')

@section('content')
<section class="max-w-md mx-auto px-6 py-20">
    <h1 class="text-2xl font-bold text-slate-900 mb-1">Masuk</h1>
    <p class="text-slate-500 mb-8 text-sm">Masuk untuk memantau status pendaftaran magang Anda.</p>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm mb-6">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.attempt') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="w-full rounded-lg border-slate-300 focus:border-diskominfo-blue focus:ring-diskominfo-blue" required autofocus>
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Kata Sandi</label>
            <input type="password" name="password" id="password"
                   class="w-full rounded-lg border-slate-300 focus:border-diskominfo-blue focus:ring-diskominfo-blue" required>
        </div>
        <label class="flex items-center gap-2 text-sm text-slate-600">
            <input type="checkbox" name="remember" class="rounded border-slate-300 text-diskominfo-blue">
            Ingat saya
        </label>
        <button type="submit"
                class="w-full bg-diskominfo-blue hover:bg-diskominfo-blue-dark text-white font-semibold py-3 rounded-full transition">
            Masuk
        </button>
    </form>
</section>
@endsection

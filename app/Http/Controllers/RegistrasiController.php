<?php

namespace App\Http\Controllers;

use App\Models\Registrasi;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function create()
    {
        return view('registrasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'   => ['required', 'string', 'max:255'],
            'nim_nis'        => ['required', 'string', 'max:50'],
            'asal_instansi'  => ['required', 'string', 'max:255'],
            'jurusan'        => ['required', 'string', 'max:255'],
            'email'          => ['required', 'email', 'max:255'],
            'no_hp'          => ['required', 'string', 'max:20'],
            'tanggal_mulai'  => ['required', 'date'],
            'tanggal_selesai'=> ['required', 'date', 'after_or_equal:tanggal_mulai'],
            'surat_pengantar'=> ['required', 'file', 'mimes:pdf', 'max:2048'],
            'cv'             => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
        ]);

        if ($request->hasFile('surat_pengantar')) {
            $validated['surat_pengantar_path'] = $request->file('surat_pengantar')
                ->store('berkas/surat-pengantar', 'public');
        }

        if ($request->hasFile('cv')) {
            $validated['cv_path'] = $request->file('cv')->store('berkas/cv', 'public');
        }

        $validated['status'] = 'menunggu';

        Registrasi::create($validated);

        return redirect()
            ->route('registrasi.create')
            ->with('success', 'Pendaftaran magang berhasil dikirim. Silakan tunggu konfirmasi melalui email.');
    }
}
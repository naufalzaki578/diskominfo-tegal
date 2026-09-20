<?php

namespace App\Http\Controllers;

use App\Models\Registrasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RegistrasiController extends Controller
{
    public function create()
    {
        return view('registrasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'    => ['required', 'string', 'max:255'],
            'nim_nis'         => ['required', 'string', 'max:50'],
            'asal_instansi'   => ['required', 'string', 'max:255'],
            'jurusan'         => ['required', 'string', 'max:255'],
            'email'           => ['required', 'email', 'max:255'],
            'no_hp'           => ['required', 'string', 'max:20'],
            'tanggal_mulai'   => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date', 'after_or_equal:tanggal_mulai'],
            'surat_pengantar' => ['required', 'file', 'mimes:pdf', 'max:2048'],
            'cv'              => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
        ]);

        if ($request->hasFile('surat_pengantar')) {
            $validated['surat_pengantar_path'] = $request->file('surat_pengantar')
                ->store('berkas/surat-pengantar', 'public');
        }

        if ($request->hasFile('cv')) {
            $validated['cv_path'] = $request->file('cv')->store('berkas/cv', 'public');
        }

        $validated['status'] = 'menunggu';

        $registrasi = Registrasi::create($validated);

        return redirect()
            ->route('registrasi.status', ['search' => $registrasi->email])
            ->with('success', 'Pendaftaran magang berhasil dikirim! Silakan simpan email atau NIM/NIS Anda untuk memantau status seleksi berkas secara berkala.');
    }

    public function checkStatusForm(Request $request)
    {
        $search = $request->query('search');
        $registrasi = null;
        $searched = false;

        if ($search) {
            $searched = true;
            $registrasi = Registrasi::where('email', $search)
                ->orWhere('nim_nis', $search)
                ->latest()
                ->first();
        }

        return view('registrasi.status', compact('registrasi', 'searched', 'search'));
    }

    public function checkStatus(Request $request)
    {
        $request->validate([
            'keyword' => ['required', 'string', 'max:255'],
        ]);

        $keyword = trim($request->input('keyword'));

        return redirect()->route('registrasi.status', ['search' => $keyword]);
    }

    public function index(Request $request)
    {
        $query = Registrasi::query();

        // Filter status
        $status = $request->query('status');
        if ($status && in_array($status, ['menunggu', 'diterima', 'ditolak'])) {
            $query->where('status', $status);
        }

        // Search query
        $search = $request->query('q');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('nim_nis', 'like', "%{$search}%")
                  ->orWhere('asal_instansi', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $registrasis = $query->latest()->paginate(10)->withQueryString();

        // Hitung statistik untuk summary card
        $totalCount = Registrasi::count();
        $menungguCount = Registrasi::where('status', 'menunggu')->count();
        $diterimaCount = Registrasi::where('status', 'diterima')->count();
        $ditolakCount = Registrasi::where('status', 'ditolak')->count();

        return view('registrasi.admin.index', compact(
            'registrasis',
            'totalCount',
            'menungguCount',
            'diterimaCount',
            'ditolakCount',
            'status',
            'search'
        ));
    }

    public function approve(Registrasi $registrasi)
    {
        if ($registrasi->status === 'diterima') {
            return back()->with('error', 'Pendaftaran ini sudah disetujui sebelumnya.');
        }

        $passwordAcak = Str::random(10);

        // Jika user dengan email ini sudah ada, gunakan akun tersebut
        $user = User::where('email', $registrasi->email)->first();
        if (!$user) {
            $user = User::create([
                'name'     => $registrasi->nama_lengkap,
                'email'    => $registrasi->email,
                'password' => Hash::make($passwordAcak),
                'role'     => 'peserta',
            ]);
        } else {
            $user->update([
                'role' => 'peserta',
            ]);
        }

        $registrasi->update([
            'status'  => 'diterima',
            'user_id' => $user->id,
        ]);

        return back()->with([
            'success'       => "Pendaftaran an. {$registrasi->nama_lengkap} berhasil disetujui!",
            'password_baru' => $passwordAcak,
            'email_baru'    => $user->email,
        ]);
    }

    public function reject(Registrasi $registrasi)
    {
        $registrasi->update(['status' => 'ditolak']);
        return back()->with('success', "Pendaftaran an. {$registrasi->nama_lengkap} ditolak.");
    }

    public function downloadSuratPengantar(Registrasi $registrasi)
    {
        if (!$registrasi->surat_pengantar_path || !Storage::disk('public')->exists($registrasi->surat_pengantar_path)) {
            return back()->with('error', 'File surat pengantar belum diunggah atau tidak ditemukan.');
        }

        return Storage::disk('public')->response($registrasi->surat_pengantar_path);
    }

    public function downloadCv(Registrasi $registrasi)
    {
        if (!$registrasi->cv_path || !Storage::disk('public')->exists($registrasi->cv_path)) {
            return back()->with('error', 'File CV tidak ditemukan.');
        }

        return Storage::disk('public')->response($registrasi->cv_path);
    }
}
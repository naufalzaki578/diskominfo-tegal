<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PengumumanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Pembukaan Pendaftaran Magang Periode Agustus 2026',
                'isi' => 'Dinas Komunikasi dan Informatika Kabupaten Tegal membuka pendaftaran magang bagi mahasiswa dan siswa SMK/SMA untuk periode Agustus 2026. Pendaftaran dibuka melalui website ini.',
                'tanggal_terbit' => now()->subDays(2),
            ],
            [
                'judul' => 'Perpanjangan Batas Waktu Unggah Berkas',
                'isi' => 'Batas waktu unggah surat pengantar diperpanjang hingga akhir bulan untuk memberi kesempatan lebih luas bagi calon peserta magang.',
                'tanggal_terbit' => now()->subDays(6),
            ],
            [
                'judul' => 'Jadwal Wawancara Calon Peserta Magang',
                'isi' => 'Wawancara calon peserta magang akan dilaksanakan secara daring. Jadwal akan dikirimkan melalui email masing-masing pendaftar.',
                'tanggal_terbit' => now()->subDays(10),
            ],
        ];

        foreach ($data as $item) {
            Pengumuman::create([
                'judul' => $item['judul'],
                'slug' => Str::slug($item['judul']),
                'isi' => $item['isi'],
                'tanggal_terbit' => $item['tanggal_terbit'],
            ]);
        }
    }
}

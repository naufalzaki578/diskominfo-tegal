<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name'     => 'Admin Diskominfo Tegal',
            'email'    => 'admin@diskominfo.tegalkab.go.id',
            'password' => bcrypt('password'),
            'role'     => 'admin',
        ]);

        $peserta = User::create([
            'name'     => 'Budi Santoso',
            'email'    => 'budi@mahasiswa.ac.id',
            'password' => bcrypt('password'),
            'role'     => 'peserta',
        ]);

        $this->call([
            PengumumanSeeder::class,
        ]);

        \App\Models\Registrasi::create([
            'user_id'              => $peserta->id,
            'nama_lengkap'         => 'Budi Santoso',
            'nim_nis'              => '22090123',
            'asal_instansi'        => 'Politeknik Harapan Bersama Tegal',
            'jurusan'              => 'D4 Teknik Informatika',
            'email'                => 'budi@mahasiswa.ac.id',
            'no_hp'                => '081234567890',
            'tanggal_mulai'        => now()->addDays(7)->toDateString(),
            'tanggal_selesai'      => now()->addMonths(3)->toDateString(),
            'surat_pengantar_path' => null,
            'cv_path'              => null,
            'status'               => 'diterima',
        ]);

        \App\Models\Registrasi::create([
            'user_id'              => null,
            'nama_lengkap'         => 'Siti Aisyah',
            'nim_nis'              => '2211500456',
            'asal_instansi'        => 'Universitas Pancasakti Tegal',
            'jurusan'              => 'S1 Sistem Informasi',
            'email'                => 'siti.aisyah@student.ups.ac.id',
            'no_hp'                => '085712349999',
            'tanggal_mulai'        => now()->addDays(14)->toDateString(),
            'tanggal_selesai'      => now()->addMonths(2)->toDateString(),
            'surat_pengantar_path' => null,
            'cv_path'              => null,
            'status'               => 'menunggu',
        ]);

        \App\Models\Registrasi::create([
            'user_id'              => null,
            'nama_lengkap'         => 'Rizky Pratama',
            'nim_nis'              => '10214490',
            'asal_instansi'        => 'SMK Negeri 1 Slawi',
            'jurusan'              => 'Rekayasa Perangkat Lunak',
            'email'                => 'rizky.pratama@gmail.com',
            'no_hp'                => '087811223344',
            'tanggal_mulai'        => now()->addDays(20)->toDateString(),
            'tanggal_selesai'      => now()->addMonths(3)->toDateString(),
            'surat_pengantar_path' => null,
            'cv_path'              => null,
            'status'               => 'menunggu',
        ]);

        \App\Models\Registrasi::create([
            'user_id'              => null,
            'nama_lengkap'         => 'Dimas Maulana',
            'nim_nis'              => '21053461',
            'asal_instansi'        => 'Universitas Dian Nuswantoro',
            'jurusan'              => 'S1 Ilmu Komunikasi',
            'email'                => 'dimas.m@mhs.dinus.ac.id',
            'no_hp'                => '082199887766',
            'tanggal_mulai'        => now()->addDays(10)->toDateString(),
            'tanggal_selesai'      => now()->addMonths(2)->toDateString(),
            'surat_pengantar_path' => null,
            'cv_path'              => null,
            'status'               => 'ditolak',
        ]);
    }
}
# Portal Pendaftaran Magang - Diskominfo Kab. Tegal

<p align="center">
  <img src="public/images/logo-tegal.svg" width="100" alt="Logo Diskominfo Kabupaten Tegal" />
  <br>
  <strong>Dinas Komunikasi dan Informatika Pemerintah Kabupaten Tegal</strong>
  <br>
  <em>Portal Resmi Penerimaan & Pengelolaan Magang Mahasiswa serta Pelajar SMK/SMA</em>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 11" />
  <img src="https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS" />
  <img src="https://img.shields.io/badge/Database-SQLite%20%2F%20MySQL-003B57?style=for-the-badge&logo=sqlite&logoColor=white" alt="Database" />
  <img src="https://img.shields.io/badge/Deploy-Vercel-000000?style=for-the-badge&logo=vercel&logoColor=white" alt="Vercel" />
</p>

---

## 📌 Tentang Aplikasi

Portal Pendaftaran Magang Diskominfo Kabupaten Tegal adalah aplikasi web modern berbasis **Laravel 11** yang dirancang untuk mempermudah alur pendaftaran, seleksi berkas, dan pemantauan peserta magang/praktik kerja lapangan (PKL) di lingkungan Dinas Komunikasi dan Informatika Kabupaten Tegal secara transparan, akuntabel, dan digital.

Aplikasi telah dioptimalkan agar **100% responsif di semua perangkat** (smartphone, tablet, maupun desktop) dan siap di-deploy langsung ke **Vercel** maupun server VPS lokal.

---

## ✨ Fitur Utama

1. **Beranda Interaktif & Responsif**:
   - Hero banner informatif dengan tombol pendaftaran cepat dan pelacakan berkas.
   - Pilihan 4 bidang divisi kerja: *E-Government & SPBE*, *Keamanan Siber & Sandi*, *Informasi & Komunikasi Publik*, serta *Statistik & Analisis Data*.
   - Alur pendaftaran 4 langkah dan FAQ accordion seputar persyaratan.
2. **Formulir Pendaftaran Terstruktur**:
   - Pengelompokan data diri, data institusi (kampus/sekolah), periode magang, dan unggah berkas.
   - Box unggah PDF kustom untuk Surat Pengantar Instansi (wajib) dan Curriculum Vitae (opsional) dengan batas maksimal 2MB.
3. **Lacak Berkas Mandiri (`/cek-status`)**:
   - Calon peserta dapat memantau progres verifikasi berkas secara *real-time* cukup dengan memasukkan Email atau NIM/NIS tanpa perlu login.
   - Menampilkan tahapan pendaftaran dan instruksi lanjutan jika dinyatakan diterima.
4. **Panel Administrator (`/admin/registrasi`)**:
   - Statistik pendaftar: Total, Perlu Verifikasi (*Menunggu*), Disetujui (*Diterima*), dan Ditolak.
   - Pencarian berdasarkan nama, NIM, instansi, atau email.
   - Tabel responsif ramah seluler dilengkapi tautan pratinjau & unduh Surat Pengantar dan CV peserta.
   - Tombol persetujuan/penolakan instan beserta pembuatan akun otomatis untuk peserta yang lolos.
5. **Dashboard Pengguna (`/dashboard`)**:
   - Dashboard peserta magang yang memuat informasi jadwal hari pertama, seragam, dan berkas fisik yang harus dibawa.
   - Dashboard ringkas khusus staf administrator.
6. **Warta & Pengumuman Dinas (`/pengumuman`)**:
   - Publikasi informasi resmi seputar pembukaan gelombang, jadwal wawancara, dan hasil seleksi.

---

## 👥 Kredensial Akun Pengujian (Demo)

Gunakan kredensial berikut pada halaman [Login](/login) (tersedia tombol cepat *Akses Cepat Pengujian*):

| Role | Email | Password | Hak Akses |
| :--- | :--- | :--- | :--- |
| **Administrator** | `admin@diskominfo.tegalkab.go.id` | `password` | Kelola pendaftar di `/admin/registrasi` |
| **Peserta Magang** | `budi@mahasiswa.ac.id` | `password` | Lihat status & panduan di `/dashboard` |

---

## 🚀 Panduan Menjalankan Secara Lokal

### Prasyarat
- PHP >= 8.2 (dengan ekstensi `pdo_sqlite` / `pdo_mysql`, `fileinfo`, `mbstring`, `openssl`)
- Composer
- Node.js (opsional untuk pengembangan aset Vite)

### Langkah-langkah:
1. **Clone repositori**:
   ```bash
   git clone https://github.com/naufalzaki578/diskominfo-tegal.git
   cd diskominfo-tegal
   ```

2. **Install Dependensi PHP**:
   ```bash
   composer install
   ```

3. **Pengaturan Environment**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *(Secara default, aplikasi telah dikonfigurasi menggunakan SQLite siap pakai).*

4. **Migrasi Database & Seeder**:
   ```bash
   php artisan migrate --seed
   ```

5. **Hubungkan Storage Link**:
   ```bash
   php artisan storage:link
   ```

6. **Jalankan Web Server**:
   ```bash
   php artisan serve
   ```
   Akses website di browser: **[http://127.0.0.1:8000](http://127.0.0.1:8000)**

---

## ☁️ Panduan Deploy ke Vercel

Repositori ini telah dilengkapi dengan konfigurasi `vercel.json` dan `api/index.php` yang disesuaikan khusus untuk arsitektur *Serverless Function* Vercel.

### Cara 1: Deploy Otomatis via GitHub (Direkomendasikan)
1. Buka dashboard [Vercel](https://vercel.com) dan klik **"Add New..."** &rarr; **"Project"**.
2. Pilih repositori **`naufalzaki578/diskominfo-tegal`** dan klik **Import**.
3. Di bagian **Environment Variables**, tambahkan:
   - `APP_KEY`: `base64:MM5tc+YRHz+p0u/8PcWQCJnz6GkQuLHVFGYTid74T0I=` *(atau generate baru)*
   - `APP_ENV`: `production`
   - `APP_DEBUG`: `false`
   - `DB_CONNECTION`: `sqlite`
4. Klik tombol **Deploy**. Vercel akan secara otomatis membangun aplikasi dan memberikan URL publik resmi.

### Cara 2: Deploy via Vercel CLI
1. Login ke Vercel CLI di terminal:
   ```bash
   vercel login
   ```
2. Jalankan perintah deploy ke production:
   ```bash
   vercel --prod
   ```

---

## 🏢 Struktur Direktori

```text
├── api/
│   └── index.php           # Entry point serverless untuk Vercel
├── app/
│   ├── Http/Controllers/  # Controller (Home, Registrasi, Pengumuman, Profil, Auth)
│   └── Models/             # Model Eloquent (User, Registrasi, Pengumuman)
├── database/
│   ├── database.sqlite     # Database SQLite bawaan dengan data contoh
│   ├── migrations/         # Skema tabel database
│   └── seeders/            # Seeder data admin, peserta, dan pengumuman
├── public/
│   ├── images/logo-tegal.svg # Logo resmi vektor Diskominfo Kab. Tegal
│   └── index.php           # Entry point standar PHP
├── resources/
│   └── views/              # Blade template responsif (layout, home, status, admin, dsb.)
├── routes/
│   └── web.php             # Rute URL aplikasi
├── vercel.json             # Konfigurasi runtime serverless Vercel
└── README.md
```

---

## 📞 Kontak & Sekretariat

- **Instansi**: Dinas Komunikasi dan Informatika Kabupaten Tegal
- **Alamat**: Jl. DR. Soetomo No.1, Dukuh Ringin, Dukuhwringin, Kec. Slawi, Kabupaten Tegal, Jawa Tengah 52415
- **Provinsi**: Jawa Tengah
- **Lama Perjalanan**: ±3 menit dari Alun-Alun Hanggawana Slawi
- **Telepon**: [(0283) 4561555](tel:02834561555)
- **Jam Operasional**: Buka Senin – Jumat pukul 07.15 WIB (Sabtu, Minggu & Libur Nasional: Tutup)
- **Email**: `magang@diskominfo.tegalkab.go.id`

---
&copy; 2026 Dinas Komunikasi dan Informatika Kabupaten Tegal. Seluruh Hak Cipta Dilindungi.

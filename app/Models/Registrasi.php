<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;

    protected $table = 'registrasis';

    protected $fillable = [
        'nama_lengkap',
        'nim_nis',
        'asal_instansi',
        'jurusan',
        'email',
        'no_hp',
        'tanggal_mulai',
        'tanggal_selesai',
        'surat_pengantar_path',
        'cv_path',
        'status',
    ];

    protected $casts = [
        'tanggal_mulai'   => 'date',
        'tanggal_selesai' => 'date',
    ];
}

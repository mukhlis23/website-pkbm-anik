<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi_singkat',
        'banner',
        'tentang',
        'foto_profil',
        'status_akreditasi',
        'nomor_sk',
        'tahun',
        'gambar_akreditasi',
        'visi',
        'misi',
        'tujuan',
        'struktur_organisasi',
    ];

    protected $casts = [
        'banner' => 'array',
    ];
}
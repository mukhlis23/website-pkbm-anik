<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeris';

    protected $fillable = [
        'judul_foto',
        'kategori',
        'foto',
        'keterangan',
        'tanggal_upload',
    ];

    protected $casts = [
        'foto' => 'array',
        'tanggal_upload' => 'date',
    ];

    /**
     * Relasi ke foto-foto dalam album.
     */
    public function fotos()
    {
        return $this->hasMany(GaleriFoto::class, 'galeri_id');
    }
}
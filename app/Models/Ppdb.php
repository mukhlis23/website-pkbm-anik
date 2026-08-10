<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    protected $fillable = [

        'judul',

        'tahun_ajaran',

        'banner',

        'deskripsi',

        'persyaratan',

        'alur',

        'jadwal',

        'link_form',

        'whatsapp',

        'status',

    ];
}
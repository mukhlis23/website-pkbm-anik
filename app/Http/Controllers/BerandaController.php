<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Program;
use App\Models\Informasi;
use App\Models\Galeri;
use App\Models\Ppdb;

class BerandaController extends Controller
{
    public function index()
    {
        // Profil
        $profil = Profil::first();

        // Program
        $programs = Program::orderBy('nama_program', 'asc')->get();

        // Informasi terbaru
        $informasis = Informasi::orderBy('tanggal', 'desc')
            ->take(3)
            ->get();

        // Galeri terbaru
        $galeris = Galeri::with('fotos')
            ->orderBy('tanggal_upload', 'desc')
            ->take(6)
            ->get();

        // PPDB
        // Ambil data PPDB tanpa memfilter status.
        // Jadi status Buka maupun Tutup tetap dikirim ke Beranda.
        $ppdb = Ppdb::latest()->first();

        return view('website.beranda.index', compact(
            'profil',
            'programs',
            'informasis',
            'galeris',
            'ppdb'
        ));
    }
}
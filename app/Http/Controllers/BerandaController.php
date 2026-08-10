<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Program;
use App\Models\Informasi;
use App\Models\Galeri;

class BerandaController extends Controller
{
    public function index()
    {
        // Profil
        $profil = Profil::first();

        // Program
        $programs = Program::orderBy('nama_program', 'asc')->get();

        // Informasi terbaru berdasarkan tanggal informasi
        $informasis = Informasi::orderBy('tanggal', 'desc')
            ->take(3)
            ->get();

        // Galeri terbaru berdasarkan tanggal upload
        // Mengambil relasi foto dalam setiap album
        $galeris = Galeri::with('fotos')
            ->orderBy('tanggal_upload', 'desc')
            ->take(6)
            ->get();

        return view('website.beranda.index', compact(
            'profil',
            'programs',
            'informasis',
            'galeris'
        ));
    }
}
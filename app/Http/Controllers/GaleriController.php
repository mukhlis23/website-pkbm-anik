<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    /**
     * Menampilkan semua album galeri.
     */
    public function index()
    {
        $galeris = Galeri::with('fotos')
            ->orderBy('tanggal_upload', 'desc')
            ->get();

        return view('website.galeri.index', compact('galeris'));
    }


    /**
     * Menampilkan galeri berdasarkan kategori.
     */
    public function kategori($kategori)
    {
        $galeris = Galeri::with('fotos')
            ->where('kategori', $kategori)
            ->orderBy('tanggal_upload', 'desc')
            ->get();

        return view('website.galeri.index', compact(
            'galeris',
            'kategori'
        ));
    }


    /**
     * Menampilkan detail album galeri.
     */
    public function show($id)
    {
        $galeri = Galeri::with('fotos')
            ->findOrFail($id);

        return view('website.galeri.detail', compact('galeri'));
    }
}
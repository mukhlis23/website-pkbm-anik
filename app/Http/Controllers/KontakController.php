<?php

namespace App\Http\Controllers;

use App\Models\Kontak;

class KontakController extends Controller
{
    /**
     * Menampilkan halaman kontak website.
     */
    public function index()
    {
        $kontak = Kontak::first();

        return view(
            'website.kontak.index',
            compact('kontak')
        );
    }
}
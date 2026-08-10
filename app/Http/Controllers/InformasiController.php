<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    /**
     * Menampilkan semua informasi
     */
    public function index(Request $request)
    {
        $query = Informasi::orderBy('tanggal', 'desc');

        // Pencarian
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('isi', 'like', '%' . $search . '%');

            });
        }

        $informasis = $query
            ->paginate(2)
            ->withQueryString();

        $kategori = null;

        return view(
            'website.informasi.index',
            compact('informasis', 'kategori')
        );
    }


    /**
     * Menampilkan informasi berdasarkan kategori
     */
    public function kategori(Request $request, $kategori)
    {
        $query = Informasi::where('kategori', $kategori)
            ->orderBy('tanggal', 'desc');

        // Pencarian dalam kategori
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('isi', 'like', '%' . $search . '%');

            });
        }

        $informasis = $query
            ->paginate(2)
            ->withQueryString();

        return view(
            'website.informasi.index',
            compact('informasis', 'kategori')
        );
    }


    /**
     * Menampilkan detail informasi
     */
    public function show($id)
    {
        $informasi = Informasi::findOrFail($id);

        return view(
            'website.informasi.detail',
            compact('informasi')
        );
    }
}
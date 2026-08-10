<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\GaleriFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Menampilkan daftar album galeri.
     */
    public function index()
    {
        $galeris = Galeri::with('fotos')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.galeri.index', compact('galeris'));
    }


    /**
     * Menampilkan form tambah album galeri.
     */
    public function create()
    {
        return view('admin.galeri.create');
    }


    /**
     * Menyimpan album galeri beserta banyak foto.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_foto' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'tanggal_upload' => 'required|date',

            'foto' => 'required|array|min:1',
            'foto.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Simpan data album
        |--------------------------------------------------------------------------
        */

        $galeri = Galeri::create([
            'judul_foto' => $request->judul_foto,
            'kategori' => $request->kategori,
            'keterangan' => $request->keterangan,
            'tanggal_upload' => $request->tanggal_upload,

            // Kolom lama dikosongkan.
            // Foto disimpan di tabel galeri_fotos.
            'foto' => null,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Simpan banyak foto
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto')) {

            foreach ($request->file('foto') as $file) {

                $path = $file->store('galeri', 'public');

                $galeri->fotos()->create([
                    'foto' => basename($path),
                ]);
            }
        }


        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Album galeri berhasil ditambahkan.');
    }


    /**
     * Menampilkan detail album beserta seluruh foto.
     */
    public function show(string $id)
    {
        $galeri = Galeri::with('fotos')
            ->findOrFail($id);

        return view('admin.galeri.show', compact('galeri'));
    }


    /**
     * Menampilkan form edit album galeri.
     */
    public function edit(string $id)
    {
        $galeri = Galeri::with('fotos')
            ->findOrFail($id);

        return view('admin.galeri.edit', compact('galeri'));
    }


    /**
     * Mengupdate album galeri dan menambahkan foto baru.
     */
    public function update(Request $request, string $id)
    {
        $galeri = Galeri::with('fotos')
            ->findOrFail($id);


        $request->validate([
            'judul_foto' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'tanggal_upload' => 'required|date',

            'foto' => 'nullable|array',
            'foto.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Update data album
        |--------------------------------------------------------------------------
        */

        $galeri->update([
            'judul_foto' => $request->judul_foto,
            'kategori' => $request->kategori,
            'keterangan' => $request->keterangan,
            'tanggal_upload' => $request->tanggal_upload,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Tambahkan foto baru jika ada
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto')) {

            foreach ($request->file('foto') as $file) {

                $path = $file->store('galeri', 'public');

                $galeri->fotos()->create([
                    'foto' => basename($path),
                ]);
            }
        }


        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Album galeri berhasil diperbarui.');
    }


    /**
     * Menghapus seluruh album beserta semua foto.
     */
    public function destroy(string $id)
    {
        $galeri = Galeri::with('fotos')
            ->findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Hapus semua file foto dari storage
        |--------------------------------------------------------------------------
        */

        foreach ($galeri->fotos as $foto) {

            if ($foto->foto) {

                Storage::disk('public')->delete(
                    'galeri/' . $foto->foto
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Hapus data album
        |--------------------------------------------------------------------------
        |
        | Data galeri_fotos akan ikut terhapus apabila
        | foreign key menggunakan cascadeOnDelete().
        |
        */

        $galeri->delete();


        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Album galeri berhasil dihapus.');
    }


    /**
     * Menghapus satu foto dari album.
     */
    public function destroyFoto(string $id)
    {
        $foto = GaleriFoto::findOrFail($id);

        $galeriId = $foto->galeri_id;


        /*
        |--------------------------------------------------------------------------
        | Hapus file foto dari storage
        |--------------------------------------------------------------------------
        */

        if ($foto->foto) {

            Storage::disk('public')->delete(
                'galeri/' . $foto->foto
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Hapus data foto
        |--------------------------------------------------------------------------
        */

        $foto->delete();


        return redirect()
            ->route('admin.galeri.show', $galeriId)
            ->with('success', 'Foto berhasil dihapus.');
    }
}
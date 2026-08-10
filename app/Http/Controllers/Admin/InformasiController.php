<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    /**
     * Menampilkan semua informasi
     */
    public function index()
    {
        $informasis = Informasi::orderBy('id', 'desc')
            ->get();

        return view(
            'admin.informasi.index',
            compact('informasis')
        );
    }


    /**
     * Menampilkan form tambah informasi
     */
    public function create()
    {
        return view(
            'admin.informasi.create'
        );
    }


    /**
     * Menyimpan informasi baru
     */
    public function store(Request $request)
    {
        $request->validate([

            'judul' => 'required',

            'kategori' => 'required',

            'isi' => 'required',

            'tanggal' => 'required|date',

            'gambar' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',

        ]);


        $gambar = null;


        /*
        |--------------------------------------------------------------------------
        | Gambar Utama
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            $file = $request
                ->file('gambar')
                ->store('informasi', 'public');

            $gambar = basename($file);
        }


        /*
        |--------------------------------------------------------------------------
        | Simpan Informasi
        |--------------------------------------------------------------------------
        */

        Informasi::create([

            'judul' => $request->judul,

            'kategori' => $request->kategori,

            'isi' => $request->isi,

            'tanggal' => $request->tanggal,

            'gambar' => $gambar,

        ]);


        return redirect()
            ->route('admin.informasi.index')
            ->with(
                'success',
                'Informasi berhasil ditambahkan'
            );
    }


    /**
     * Menampilkan form edit
     */
    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);

        return view(
            'admin.informasi.edit',
            compact('informasi')
        );
    }


    /**
     * Update informasi
     */
    public function update(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);


        $request->validate([

            'judul' => 'required',

            'kategori' => 'required',

            'isi' => 'required',

            'tanggal' => 'required|date',

            'gambar' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',

        ]);


        $gambar = $informasi->gambar;


        /*
        |--------------------------------------------------------------------------
        | Jika upload gambar utama baru
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            // Hapus gambar utama lama
            if ($gambar) {

                Storage::disk('public')
                    ->delete(
                        'informasi/' . $gambar
                    );
            }


            // Simpan gambar utama baru
            $file = $request
                ->file('gambar')
                ->store(
                    'informasi',
                    'public'
                );

            $gambar = basename($file);
        }


        /*
        |--------------------------------------------------------------------------
        | Update Informasi
        |--------------------------------------------------------------------------
        */

        $informasi->update([

            'judul' => $request->judul,

            'kategori' => $request->kategori,

            'isi' => $request->isi,

            'tanggal' => $request->tanggal,

            'gambar' => $gambar,

        ]);


        return redirect()
            ->route('admin.informasi.index')
            ->with(
                'success',
                'Informasi berhasil diperbarui'
            );
    }


    /**
     * Upload gambar dari Summernote
     *
     * Gambar yang dimasukkan melalui editor
     * akan disimpan di:
     *
     * storage/app/public/informasi/editor
     */
    public function uploadImage(Request $request)
    {
        try {

            $request->validate([

                'file' => [
                    'required',
                    'image',
                    'mimes:jpeg,jpg,png,webp',
                    'max:5120',
                ],

            ]);


            $file = $request->file('file');


            /*
            |--------------------------------------------------------------------------
            | Nama file dibuat unik
            |--------------------------------------------------------------------------
            */

            $filename = time()
                . '_'
                . uniqid()
                . '.'
                . $file->getClientOriginalExtension();


            /*
            |--------------------------------------------------------------------------
            | Simpan gambar editor
            |--------------------------------------------------------------------------
            */

            $path = $file->storeAs(
                'informasi/editor',
                $filename,
                'public'
            );


            /*
            |--------------------------------------------------------------------------
            | Kembalikan URL ke Summernote
            |--------------------------------------------------------------------------
            */

            return response()->json([

                'success' => true,

                'url' => asset(
                    'storage/' . $path
                ),

            ]);


        } catch (\Illuminate\Validation\ValidationException $e) {

            return response()->json([

                'success' => false,

                'message' => $e->validator
                    ->errors()
                    ->first(),

            ], 422);


        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' => $e->getMessage(),

            ], 500);
        }
    }


    /**
     * Menghapus informasi
     */
    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Hapus gambar utama
        |--------------------------------------------------------------------------
        */

        if ($informasi->gambar) {

            Storage::disk('public')
                ->delete(
                    'informasi/' . $informasi->gambar
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Hapus data dari database
        |--------------------------------------------------------------------------
        */

        $informasi->delete();


        return redirect()
            ->route('admin.informasi.index')
            ->with(
                'success',
                'Informasi berhasil dihapus'
            );
    }
}
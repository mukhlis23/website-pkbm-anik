<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Menampilkan daftar profil
     */
    public function index()
    {
        $profils = Profil::latest()->get();

        return view('admin.profil.index', compact('profils'));
    }


    /**
     * Form tambah profil
     */
    public function create()
    {
        return view('admin.profil.create');
    }


    /**
     * Simpan profil
     */
    public function store(Request $request)
    {
        $request->validate([

            'judul' => [
                'required',
                'max:255'
            ],

            'deskripsi_singkat' => [
                'required'
            ],

            'tentang' => [
                'required'
            ],

            'visi' => [
                'required'
            ],

            'misi' => [
                'required'
            ],

            'tujuan' => [
                'required'
            ],

            'tahun' => [
                'nullable',
                'integer'
            ],

            'banner.*' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'foto_profil' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'gambar_akreditasi' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'struktur_organisasi' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ]

        ],
        [

            'judul.required' =>
            'Judul profil wajib diisi.',

            'deskripsi_singkat.required' =>
            'Deskripsi singkat wajib diisi.',

            'tentang.required' =>
            'Tentang PKBM wajib diisi.',

            'visi.required' =>
            'Visi wajib diisi.',

            'misi.required' =>
            'Misi wajib diisi.',

            'tujuan.required' =>
            'Tujuan wajib diisi.',

            'banner.*.image' =>
            'Banner harus berupa gambar.',

            'banner.*.max' =>
            'Ukuran banner maksimal 2 MB.'

        ]);


        $data = $request->except('_token');


        // Upload Banner Multiple

        if ($request->hasFile('banner')) {

            $bannerPaths = [];

            foreach ($request->file('banner') as $file) {

                $bannerPaths[] =
                $file->store('profil', 'public');

            }

            $data['banner'] = $bannerPaths;
        }



        // Upload Foto Profil

        if ($request->hasFile('foto_profil')) {

            $data['foto_profil'] =
            $request->file('foto_profil')
            ->store('profil', 'public');

        }



        // Upload Gambar Akreditasi

        if ($request->hasFile('gambar_akreditasi')) {

            $data['gambar_akreditasi'] =
            $request->file('gambar_akreditasi')
            ->store('profil', 'public');

        }



        // Upload Struktur Organisasi

        if ($request->hasFile('struktur_organisasi')) {

            $data['struktur_organisasi'] =
            $request->file('struktur_organisasi')
            ->store('profil', 'public');

        }



        Profil::create($data);


        return redirect()
            ->route('admin.profil.index')
            ->with('success',
            'Profil berhasil ditambahkan.');

    }



    /**
     * Form edit profil
     */
    public function edit(Profil $profil)
    {
        return view('admin.profil.edit', compact('profil'));
    }




    /**
     * Update profil
     */
    public function update(Request $request, Profil $profil)
    {

        $request->validate([

            'judul' =>
            'required|max:255',

            'deskripsi_singkat' =>
            'required',

            'tentang' =>
            'required',

            'visi' =>
            'required',

            'misi' =>
            'required',

            'tujuan' =>
            'required',


            'banner.*' =>
            'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'foto_profil' =>
            'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'gambar_akreditasi' =>
            'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'struktur_organisasi' =>
            'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);



        $data = $request->except([
            '_token',
            '_method'
        ]);



        // Update Banner

        if ($request->hasFile('banner')) {


            if ($profil->banner) {

                foreach ($profil->banner as $banner) {

                    Storage::disk('public')
                    ->delete($banner);

                }

            }



            $bannerPaths = [];


            foreach ($request->file('banner') as $file) {

                $bannerPaths[] =
                $file->store('profil','public');

            }


            $data['banner'] = $bannerPaths;

        }



        // Update Foto Profil

        if ($request->hasFile('foto_profil')) {


            if ($profil->foto_profil) {

                Storage::disk('public')
                ->delete($profil->foto_profil);

            }


            $data['foto_profil'] =
            $request->file('foto_profil')
            ->store('profil','public');

        }



        // Update Akreditasi

        if ($request->hasFile('gambar_akreditasi')) {


            if ($profil->gambar_akreditasi) {

                Storage::disk('public')
                ->delete($profil->gambar_akreditasi);

            }


            $data['gambar_akreditasi'] =
            $request->file('gambar_akreditasi')
            ->store('profil','public');

        }



        // Update Struktur

        if ($request->hasFile('struktur_organisasi')) {


            if ($profil->struktur_organisasi) {

                Storage::disk('public')
                ->delete($profil->struktur_organisasi);

            }


            $data['struktur_organisasi'] =
            $request->file('struktur_organisasi')
            ->store('profil','public');

        }



        $profil->update($data);



        return redirect()
            ->route('admin.profil.index')
            ->with('success',
            'Profil berhasil diperbarui.');

    }





    /**
     * Hapus profil
     */
    public function destroy(Profil $profil)
    {

        if ($profil->banner) {

            foreach ($profil->banner as $banner) {

                Storage::disk('public')
                ->delete($banner);

            }

        }



        if ($profil->foto_profil) {

            Storage::disk('public')
            ->delete($profil->foto_profil);

        }



        if ($profil->gambar_akreditasi) {

            Storage::disk('public')
            ->delete($profil->gambar_akreditasi);

        }



        if ($profil->struktur_organisasi) {

            Storage::disk('public')
            ->delete($profil->struktur_organisasi);

        }



        $profil->delete();



        return redirect()
            ->route('admin.profil.index')
            ->with('success',
            'Profil berhasil dihapus.');

    }
}
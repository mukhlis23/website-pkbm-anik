<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PpdbController extends Controller
{
    /**
     * Menampilkan data PPDB
     */
    public function index()
    {
        $ppdb = Ppdb::first();

        return view('admin.ppdb.index', compact('ppdb'));
    }

    /**
     * Form tambah PPDB
     */
    public function create()
    {
        return view('admin.ppdb.create');
    }

    /**
     * Simpan data PPDB
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'          => 'required',
            'tahun_ajaran'   => 'required',
            'banner'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi'      => 'required',
            'persyaratan'    => 'required',
            'alur'           => 'required',
            'jadwal'         => 'required',
            'link_form'      => 'nullable|url',
            'whatsapp'       => 'nullable',
            'status'         => 'required',
        ]);

        $banner = null;

        if ($request->hasFile('banner')) {
            $banner = $request->file('banner')->store('ppdb', 'public');
        }

        Ppdb::create([
            'judul'          => $request->judul,
            'tahun_ajaran'   => $request->tahun_ajaran,
            'banner'         => $banner,
            'deskripsi'      => $request->deskripsi,
            'persyaratan'    => $request->persyaratan,
            'alur'           => $request->alur,
            'jadwal'         => $request->jadwal,
            'link_form'      => $request->link_form,
            'whatsapp'       => $request->whatsapp,
            'status'         => $request->status,
        ]);

        return redirect()
            ->route('admin.ppdb.index')
            ->with('success', 'Data PPDB berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail PPDB
     */
    public function show(string $id)
    {
        $ppdb = Ppdb::findOrFail($id);

        return view('admin.ppdb.show', compact('ppdb'));
    }

    /**
     * Form edit PPDB
     */
    public function edit(string $id)
    {
        $ppdb = Ppdb::findOrFail($id);

        return view('admin.ppdb.edit', compact('ppdb'));
    }

    /**
     * Update data PPDB
     */
    public function update(Request $request, string $id)
    {
        $ppdb = Ppdb::findOrFail($id);

        $request->validate([
            'judul'          => 'required',
            'tahun_ajaran'   => 'required',
            'banner'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi'      => 'required',
            'persyaratan'    => 'required',
            'alur'           => 'required',
            'jadwal'         => 'required',
            'link_form'      => 'nullable|url',
            'whatsapp'       => 'nullable',
            'status'         => 'required',
        ]);

        $banner = $ppdb->banner;

        if ($request->hasFile('banner')) {

            if ($ppdb->banner && Storage::disk('public')->exists($ppdb->banner)) {
                Storage::disk('public')->delete($ppdb->banner);
            }

            $banner = $request->file('banner')->store('ppdb', 'public');
        }

        $ppdb->update([
            'judul'          => $request->judul,
            'tahun_ajaran'   => $request->tahun_ajaran,
            'banner'         => $banner,
            'deskripsi'      => $request->deskripsi,
            'persyaratan'    => $request->persyaratan,
            'alur'           => $request->alur,
            'jadwal'         => $request->jadwal,
            'link_form'      => $request->link_form,
            'whatsapp'       => $request->whatsapp,
            'status'         => $request->status,
        ]);

        return redirect()
            ->route('admin.ppdb.index')
            ->with('success', 'Data PPDB berhasil diperbarui.');
    }

    /**
     * Hapus data PPDB
     */
    public function destroy(string $id)
    {
        $ppdb = Ppdb::findOrFail($id);

        if ($ppdb->banner && Storage::disk('public')->exists($ppdb->banner)) {
            Storage::disk('public')->delete($ppdb->banner);
        }

        $ppdb->delete();

        return redirect()
            ->route('admin.ppdb.index')
            ->with('success', 'Data PPDB berhasil dihapus.');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Menampilkan data kontak.
     */
    public function index()
    {
        $kontak = Kontak::first();

        return view('admin.kontak.index', compact('kontak'));
    }

    /**
     * Menampilkan form tambah kontak.
     */
    public function create()
    {
        return view('admin.kontak.create');
    }

    /**
     * Menyimpan data kontak.
     */
    public function store(Request $request)
    {
        $request->validate([
            'alamat'  => 'required',
            'email'   => 'required|email',
            'telepon' => 'required',
            'maps'    => 'nullable',
        ]);

        Kontak::create([
            'alamat'  => $request->alamat,
            'email'   => $request->email,
            'telepon' => $request->telepon,
            'maps'    => $request->maps,
        ]);

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Data kontak berhasil disimpan.');
    }

    /**
     * Tidak digunakan.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.kontak.index');
    }

    /**
     * Menampilkan form edit.
     */
    public function edit(string $id)
    {
        $kontak = Kontak::findOrFail($id);

        return view('admin.kontak.edit', compact('kontak'));
    }

    /**
     * Mengupdate data kontak.
     */
    public function update(Request $request, string $id)
    {
        $kontak = Kontak::findOrFail($id);

        $request->validate([
            'alamat'  => 'required',
            'email'   => 'required|email',
            'telepon' => 'required',
            'jam_operasional' => 'required',
            'maps'    => 'nullable',
        ]);

        $kontak->update([
            'alamat'  => $request->alamat,
            'email'   => $request->email,
            'telepon' => $request->telepon,
            'jam_operasional' => $request->jam_operasional,
            'maps'    => $request->maps,
        ]);

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Data kontak berhasil diperbarui.');
    }

    /**
     * Menghapus data kontak.
     */
    public function destroy(string $id)
    {
        $kontak = Kontak::findOrFail($id);

        $kontak->delete();

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Data kontak berhasil dihapus.');
    }
}
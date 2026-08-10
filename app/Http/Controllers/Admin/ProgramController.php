<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\ProgramKeunggulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{

    /**
     * Menampilkan semua program
     */
    public function index()
    {
        $programs = Program::latest()->get();

        return view(
            'admin.program.index',
            compact('programs')
        );
    }




    /**
     * Form tambah program
     */
    public function create()
    {
        return view('admin.program.create');
    }




    /**
     * Simpan program baru
     */
    public function store(Request $request)
    {

        $data = $request->validate([


            'nama_program' => 'required|string|max:255',

            'deskripsi' => 'required',

            'tentang' => 'required',


            'materi' => 'nullable',

            'jadwal' => 'nullable',


            'keunggulan' => 'nullable|array',

            'keunggulan.*.icon' => 'nullable|string',

            'keunggulan.*.judul' => 'nullable|string',


            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);





        $keunggulan = $data['keunggulan'] ?? [];


        unset($data['keunggulan']);





        if ($request->hasFile('gambar')) {


            $data['gambar'] = $request
                ->file('gambar')
                ->store(
                    'program',
                    'public'
                );

        }





        $program = Program::create($data);






        foreach ($keunggulan as $item) {


            if (
                !empty($item['icon']) &&
                !empty($item['judul'])
            ) {


                ProgramKeunggulan::create([

                    'program_id' => $program->id,

                    'icon' => $item['icon'],

                    'judul' => $item['judul'],

                ]);

            }

        }





        return redirect()

            ->route('admin.program.index')

            ->with(
                'success',
                'Program berhasil ditambahkan.'
            );

    }







    /**
     * Detail program
     */
    public function show(Program $program)
    {
        return redirect()
            ->route('admin.program.index');
    }







    /**
     * Form edit program
     */
    public function edit(Program $program)
    {

        $program->load('keunggulans');


        return view(
            'admin.program.edit',
            compact('program')
        );

    }








    /**
     * Update program
     */
    public function update(Request $request, Program $program)
    {

        $data = $request->validate([


            'nama_program' => 'required|string|max:255',

            'deskripsi' => 'required',

            'tentang' => 'required',


            'materi' => 'nullable',

            'jadwal' => 'nullable',


            'keunggulan' => 'nullable|array',

            'keunggulan.*.icon' => 'nullable|string',

            'keunggulan.*.judul' => 'nullable|string',


            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);






        $keunggulan = $data['keunggulan'] ?? [];


        unset($data['keunggulan']);








        if ($request->hasFile('gambar')) {


            if (

                $program->gambar &&

                Storage::disk('public')
                    ->exists($program->gambar)

            ) {


                Storage::disk('public')
                    ->delete($program->gambar);

            }





            $data['gambar'] = $request
                ->file('gambar')
                ->store(
                    'program',
                    'public'
                );

        }







        $program->update($data);








        /*
        |--------------------------------------------------------------------------
        | Update Keunggulan
        |--------------------------------------------------------------------------
        */


        $program
            ->keunggulans()
            ->delete();






        foreach ($keunggulan as $item) {


            if (

                !empty($item['icon']) &&

                !empty($item['judul'])

            ) {


                ProgramKeunggulan::create([


                    'program_id' => $program->id,


                    'icon' => $item['icon'],


                    'judul' => $item['judul'],


                ]);

            }

        }







        return redirect()

            ->route('admin.program.index')

            ->with(
                'success',
                'Program berhasil diperbarui.'
            );

    }








    /**
     * Hapus program
     */
    public function destroy(Program $program)
    {



        if (

            $program->gambar &&

            Storage::disk('public')
                ->exists($program->gambar)

        ) {


            Storage::disk('public')
                ->delete($program->gambar);

        }





        $program->delete();






        return redirect()

            ->route('admin.program.index')

            ->with(
                'success',
                'Program berhasil dihapus.'
            );

    }


}
<?php

namespace App\Http\Controllers;

use App\Models\Program;

class ProgramController extends Controller
{
    /**
     * Halaman Program Paket B
     */
    public function paketB()
    {
        $program = Program::with('keunggulans')
            ->where('nama_program', 'Paket B')
            ->first();

        return view('website.program.paket-b', compact('program'));
    }


    /**
     * Halaman Program Paket C
     */
    public function paketC()
    {
        $program = Program::with('keunggulans')
            ->where('nama_program', 'Paket C')
            ->first();

        return view('website.program.paket-c', compact('program'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;

class PpdbController extends Controller
{
    public function index()
    {
        $ppdb = Ppdb::first();

        return view('website.ppdb.index', compact('ppdb'));
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProgramKeunggulan;

class Program extends Model
{
    use HasFactory;


    protected $table = 'programs';



    protected $fillable = [

        'nama_program',

        'deskripsi',

        'tentang',

        'materi',

        'jadwal',

        'gambar',

    ];



    public function keunggulans()
    {
        return $this->hasMany(ProgramKeunggulan::class);
    }

}
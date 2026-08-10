<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramKeunggulan extends Model
{
    protected $fillable = [
        'program_id',
        'icon',
        'judul',
    ];


    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
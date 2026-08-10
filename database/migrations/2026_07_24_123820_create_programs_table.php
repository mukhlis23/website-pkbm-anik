<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Informasi Program
            |--------------------------------------------------------------------------
            */

            $table->string('nama_program');

            // Ringkasan Program (Hero)
            $table->text('deskripsi');

            // Penjelasan Lengkap
            $table->longText('tentang')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Detail Program
            |--------------------------------------------------------------------------
            */

            $table->longText('materi')->nullable();

            $table->text('jadwal')->nullable();

            $table->longText('keunggulan')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Gambar Program
            |--------------------------------------------------------------------------
            */

            $table->string('gambar')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
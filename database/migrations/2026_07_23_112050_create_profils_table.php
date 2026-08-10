<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profils', function (Blueprint $table) {

            $table->id();

            // Hero Profil
            $table->string('judul');
            $table->text('deskripsi_singkat');
            $table->string('banner')->nullable();

            // Tentang PKBM
            $table->text('tentang');
            $table->string('foto_profil')->nullable();

            // Akreditasi
            $table->string('status_akreditasi')->nullable();
            $table->string('nomor_sk')->nullable();
            $table->string('tahun')->nullable();
            $table->string('gambar_akreditasi')->nullable();

            // Visi Misi
            $table->text('visi')->nullable();
            $table->longText('misi')->nullable();
            $table->text('tujuan')->nullable();

            // Struktur Organisasi
            $table->string('struktur_organisasi')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
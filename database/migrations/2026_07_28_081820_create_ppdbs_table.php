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
        Schema::create('ppdbs', function (Blueprint $table) {

            $table->id();

            $table->string('judul');

            $table->string('tahun_ajaran');

            $table->string('banner')->nullable();

            $table->text('deskripsi');

            $table->longText('persyaratan');

            $table->longText('alur');

            $table->text('jadwal');

            $table->string('link_form')->nullable();

            $table->string('whatsapp')->nullable();

            $table->enum('status', [
                'Buka',
                'Tutup'
            ])->default('Buka');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppdbs');
    }
};
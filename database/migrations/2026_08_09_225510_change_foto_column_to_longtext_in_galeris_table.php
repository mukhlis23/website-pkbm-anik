<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        // Ubah kolom foto menjadi LONGTEXT
        Schema::table('galeris', function (Blueprint $table) {
            $table->longText('foto')->nullable()->change();
        });

        // Ubah foto lama menjadi JSON array
        $galeris = DB::table('galeris')->get();

        foreach ($galeris as $galeri) {

            if (!empty($galeri->foto)) {

                // Jika belum berupa JSON array
                $decoded = json_decode($galeri->foto, true);

                if (!is_array($decoded)) {

                    DB::table('galeris')
                        ->where('id', $galeri->id)
                        ->update([
                            'foto' => json_encode([$galeri->foto]),
                        ]);
                }
            }
        }
    }

    /**
     * Kembalikan perubahan migration.
     */
    public function down(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->string('foto')->nullable()->change();
        });
    }
};
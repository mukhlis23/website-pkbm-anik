<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PpdbController;

use App\Http\Controllers\Admin\InformasiController as AdminInformasiController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\ProfilController as AdminProfilController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Admin\KontakController as AdminKontakController;
use App\Http\Controllers\Admin\PpdbController as AdminPpdbController;

/*
|--------------------------------------------------------------------------
| Website PKBM ANIK (Publik)
|--------------------------------------------------------------------------
*/

// Beranda
Route::get('/', [BerandaController::class, 'index'])
    ->name('beranda');


// Profil
Route::get('/profil', function () {

    $profil = \App\Models\Profil::first();

    return view('website.profil.index', compact('profil'));

})->name('profil');


// Program
Route::get('/program', [ProgramController::class, 'index'])
    ->name('program');


// Program Paket B
Route::get('/program/paket-b', [ProgramController::class, 'paketB'])
    ->name('program.paket-b');


// Program Paket C
Route::get('/program/paket-c', [ProgramController::class, 'paketC'])
    ->name('program.paket-c');


/*
|--------------------------------------------------------------------------
| Informasi Publik
|--------------------------------------------------------------------------
*/

// Semua Informasi
Route::get('/informasi', [InformasiController::class, 'index'])
    ->name('informasi');


// Filter Kategori
Route::get('/informasi/kategori/{kategori}', [InformasiController::class, 'kategori'])
    ->name('informasi.kategori');


// Detail Informasi
Route::get('/informasi/detail/{id}', [InformasiController::class, 'show'])
    ->name('informasi.detail');


/*
|--------------------------------------------------------------------------
| Galeri Publik
|--------------------------------------------------------------------------
*/

// Semua Galeri
Route::get('/galeri', [GaleriController::class, 'index'])
    ->name('galeri');


// Filter Kategori Galeri
Route::get('/galeri/kategori/{kategori}', [GaleriController::class, 'kategori'])
    ->name('galeri.kategori');


// Detail Galeri
Route::get('/galeri/detail/{id}', [GaleriController::class, 'show'])
    ->name('galeri.detail');


/*
|--------------------------------------------------------------------------
| Kontak
|--------------------------------------------------------------------------
*/

Route::get('/kontak', [KontakController::class, 'index'])
    ->name('kontak');


/*
|--------------------------------------------------------------------------
| PPDB
|--------------------------------------------------------------------------
*/

Route::get('/ppdb', [PpdbController::class, 'index'])
    ->name('ppdb');
    
/*
|--------------------------------------------------------------------------
| Dashboard Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    Route::get('/dashboard', function () {

        return view('dashboard');

    })->name('dashboard');

});


/*
|--------------------------------------------------------------------------
| CRUD Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])

    ->prefix('admin')

    ->name('admin.')

    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Informasi
        |--------------------------------------------------------------------------
        */

        // Upload gambar untuk editor artikel//
        Route::post(
            '/informasi/upload-image',
            [AdminInformasiController::class, 'uploadImage']
            )->name('informasi.uploadImage');

        // CRUD Informasi
        Route::resource(
            'informasi',
            AdminInformasiController::class
        );

        /*
        |--------------------------------------------------------------------------
        | Galeri
        |--------------------------------------------------------------------------
        */

        // Daftar Album
        Route::get('/galeri', [AdminGaleriController::class, 'index'])
            ->name('galeri.index');

        // Form Tambah Album
        Route::get('/galeri/create', [AdminGaleriController::class, 'create'])
            ->name('galeri.create');

        // Simpan Album
        Route::post('/galeri', [AdminGaleriController::class, 'store'])
            ->name('galeri.store');

        // Lihat Album
        Route::get('/galeri/{id}', [AdminGaleriController::class, 'show'])
            ->name('galeri.show');

        // Form Edit Album
        Route::get('/galeri/{id}/edit', [AdminGaleriController::class, 'edit'])
            ->name('galeri.edit');

       // Update Album
       Route::put('/galeri/{id}', [AdminGaleriController::class, 'update'])
          ->name('galeri.update');

       // Hapus Album
       Route::delete('/galeri/{id}', [AdminGaleriController::class, 'destroy'])
          ->name('galeri.destroy');
          
        // Hapus satu foto
        Route::delete('/galeri/foto/{id}', [AdminGaleriController::class, 'destroyFoto'])
            ->name('galeri.foto.destroy');

        /*
        |--------------------------------------------------------------------------
        | Profil
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'profil',
            AdminProfilController::class
        );

        /*
        |--------------------------------------------------------------------------
        | Program
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'program',
            AdminProgramController::class
        );

        /*
        |--------------------------------------------------------------------------
        | Kontak
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'kontak',
            AdminKontakController::class
        );

        /*
        |--------------------------------------------------------------------------
        | PPDB
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'ppdb',
            AdminPpdbController::class
        );

    });

/*
|--------------------------------------------------------------------------
| Profile User
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


require __DIR__.'/auth.php';
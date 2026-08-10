@extends('layouts.website')

@section('content')

{{-- =========================================================
    BREADCRUMB
========================================================== --}}
<nav aria-label="breadcrumb" class="mb-4">

    <ol class="breadcrumb">

        <li class="breadcrumb-item">
            <a href="{{ route('beranda') }}" class="text-decoration-none">
                Beranda
            </a>
        </li>

        <li class="breadcrumb-item">
            <a href="{{ route('galeri') }}" class="text-decoration-none">
                Galeri
            </a>
        </li>

        <li class="breadcrumb-item active">
            {{ $galeri->judul_foto }}
        </li>

    </ol>

</nav>


{{-- =========================================================
    INFORMASI ALBUM
========================================================== --}}
<div class="card border-0 shadow-sm rounded-4 mb-5">

    <div class="card-body p-4 p-md-5">

        <span class="badge bg-primary rounded-pill px-3 py-2 mb-3">

            <i class="bi bi-folder2-open me-1"></i>

            {{ $galeri->kategori }}

        </span>

        <h1 class="fw-bold mb-3">

            {{ $galeri->judul_foto }}

        </h1>

        <div class="text-secondary mb-3">

            <i class="bi bi-calendar-event me-1"></i>

            {{ \Carbon\Carbon::parse($galeri->tanggal_upload)->translatedFormat('d F Y') }}

        </div>


        @if($galeri->keterangan)

            <div class="border-top pt-3">

                <p class="text-secondary mb-0">

                    {{ $galeri->keterangan }}

                </p>

            </div>

        @endif

    </div>

</div>


{{-- =========================================================
    HEADER FOTO
========================================================== --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h4 class="fw-bold mb-1">

            <i class="bi bi-images me-2 text-primary"></i>

            Foto Album

        </h4>

        <p class="text-secondary mb-0">

            Dokumentasi kegiatan PKBM ANIK

        </p>

    </div>


    <span class="badge bg-light text-dark border px-3 py-2">

        <i class="bi bi-image me-1"></i>

        {{ $galeri->fotos->count() }} foto

    </span>

</div>


{{-- =========================================================
    DAFTAR FOTO
========================================================== --}}
<div class="row g-4">

    @forelse($galeri->fotos as $foto)

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 galeri-detail-card">

                {{-- Foto yang bisa diklik --}}
                <div class="galeri-detail-image-wrapper"
                     data-bs-toggle="modal"
                     data-bs-target="#fotoModal{{ $foto->id }}"
                     style="cursor: pointer;">

                    <img
                        src="{{ asset('storage/galeri/' . $foto->foto) }}"
                        class="galeri-detail-image"
                        alt="{{ $galeri->judul_foto }}">

                    {{-- Overlay --}}
                    <div class="galeri-detail-overlay">

                        <div class="galeri-detail-icon">

                            <i class="bi bi-zoom-in"></i>

                        </div>

                        <span>
                            Lihat Foto
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- =================================================
            MODAL FOTO
        ================================================== --}}
        <div class="modal fade"
             id="fotoModal{{ $foto->id }}"
             tabindex="-1"
             aria-labelledby="fotoModalLabel{{ $foto->id }}"
             aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered modal-xl">

                <div class="modal-content border-0 bg-transparent">

                    <div class="modal-header border-0">

                        <h5 class="modal-title text-white fw-bold"
                            id="fotoModalLabel{{ $foto->id }}">

                            {{ $galeri->judul_foto }}

                        </h5>


                        <button type="button"
                                class="btn-close btn-close-white"
                                data-bs-dismiss="modal"
                                aria-label="Tutup">

                        </button>

                    </div>


                    <div class="modal-body text-center p-0">

                        <img
                            src="{{ asset('storage/galeri/' . $foto->foto) }}"
                            class="galeri-modal-image"
                            alt="{{ $galeri->judul_foto }}">

                    </div>

                </div>

            </div>

        </div>


    @empty

        <div class="col-12">

            <div class="alert alert-info text-center rounded-4 py-4">

                <i class="bi bi-images fs-3 d-block mb-2"></i>

                Belum ada foto dalam album ini.

            </div>

        </div>

    @endforelse

</div>


{{-- =========================================================
    TOMBOL KEMBALI
========================================================== --}}
<div class="text-center mt-5 mb-3">

    <a href="{{ route('galeri') }}"
       class="btn btn-secondary px-4 rounded-pill">

        <i class="bi bi-arrow-left me-2"></i>

        Kembali ke Galeri

    </a>

</div>

@endsection
@extends('layouts.website')

@section('content')

<div class="container py-4">

    {{-- =========================================================
        BREADCRUMB
    ========================================================== --}}
    <nav aria-label="breadcrumb" class="mb-4">

        <ol class="breadcrumb">

            <li class="breadcrumb-item">

                <a href="{{ route('beranda') }}"
                   class="text-decoration-none">

                    Beranda

                </a>

            </li>

            <li class="breadcrumb-item active">

                Galeri

            </li>

        </ol>

    </nav>


    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <div class="text-center mb-5">

        <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 mb-3">

            <i class="bi bi-images me-1"></i>

            Dokumentasi PKBM ANIK

        </span>


        <h1 class="fw-bold mb-2">

            Galeri Kegiatan

        </h1>


        <p class="text-secondary mb-0">

            Dokumentasi kegiatan, pembelajaran, dan aktivitas
            PKBM ANIK.

        </p>

    </div>


    {{-- =========================================================
        FILTER KATEGORI
    ========================================================== --}}
    <div class="d-flex justify-content-center flex-wrap gap-2 mb-5">

        {{-- Semua --}}
        <a href="{{ route('galeri') }}"
           class="btn rounded-pill px-4
           {{ !isset($kategori)
                ? 'btn-primary'
                : 'btn-outline-primary' }}">

            <i class="bi bi-grid me-1"></i>

            Semua

        </a>


        {{-- Kegiatan --}}
        <a href="{{ route('galeri.kategori', 'Kegiatan') }}"
           class="btn rounded-pill px-4
           {{ (isset($kategori) && $kategori == 'Kegiatan')
                ? 'btn-primary'
                : 'btn-outline-primary' }}">

            Kegiatan

        </a>


        {{-- Pembelajaran --}}
        <a href="{{ route('galeri.kategori', 'Pembelajaran') }}"
           class="btn rounded-pill px-4
           {{ (isset($kategori) && $kategori == 'Pembelajaran')
                ? 'btn-primary'
                : 'btn-outline-primary' }}">

            Pembelajaran

        </a>


        {{-- Lainnya --}}
        <a href="{{ route('galeri.kategori', 'Lainnya') }}"
           class="btn rounded-pill px-4
           {{ (isset($kategori) && $kategori == 'Lainnya')
                ? 'btn-primary'
                : 'btn-outline-primary' }}">

            Lainnya

        </a>

    </div>


    {{-- =========================================================
        DATA GALERI
    ========================================================== --}}
    <div class="row g-4">

        @forelse($galeris as $galeri)

            @php

                $fotoUtama = $galeri->fotos->first();

                $jumlahFoto = $galeri->fotos->count();

            @endphp


            {{-- =================================================
                CARD ALBUM
            ================================================== --}}
            <div class="col-lg-4 col-md-6">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">


                    {{-- =================================================
                        FOTO UTAMA
                    ================================================== --}}
                    @if($fotoUtama)

                        <a href="{{ route(
                            'galeri.detail',
                            $galeri->id
                        ) }}"
                           class="text-decoration-none">

                            <div class="position-relative"
                                 style="
                                    height:230px;
                                    overflow:hidden;
                                 ">


                                {{-- Gambar --}}
                                <img
                                    src="{{ asset(
                                        'storage/galeri/' .
                                        $fotoUtama->foto
                                    ) }}"
                                    alt="{{ $galeri->judul_foto }}"
                                    class="w-100 h-100 galeri-main-image"
                                    style="object-fit:cover;">


                                {{-- Overlay --}}
                                <div class="position-absolute top-0 start-0 w-100 h-100 galeri-overlay">

                                    <div class="text-center text-white">

                                        <div class="galeri-icon">

                                            <i class="bi bi-images"></i>

                                        </div>


                                        <div class="fw-semibold mt-2">

                                            Lihat Album

                                        </div>

                                    </div>

                                </div>


                                {{-- Jumlah Foto --}}
                                <span class="position-absolute top-0 end-0 m-3 badge bg-dark bg-opacity-75 rounded-pill px-3 py-2">

                                    <i class="bi bi-images me-1"></i>

                                    {{ $jumlahFoto }}

                                    {{ $jumlahFoto == 1 ? 'foto' : 'foto' }}

                                </span>


                                {{-- Kategori --}}
                                <span class="position-absolute bottom-0 start-0 m-3 badge bg-primary rounded-pill px-3 py-2">

                                    {{ $galeri->kategori }}

                                </span>

                            </div>

                        </a>


                    @else

                        {{-- Tidak ada foto --}}
                        <div class="bg-light d-flex align-items-center justify-content-center"
                             style="height:230px;">

                            <div class="text-center text-secondary">

                                <i class="bi bi-images"
                                   style="font-size:55px;">
                                </i>


                                <p class="mb-0 mt-2">

                                    Belum ada foto

                                </p>

                            </div>

                        </div>

                    @endif


                    {{-- =================================================
                        INFORMASI ALBUM
                    ================================================== --}}
                    <div class="card-body p-4">


                        {{-- Judul --}}
                        <h5 class="fw-bold mb-2">

                            {{ $galeri->judul_foto }}

                        </h5>


                        {{-- Keterangan --}}
                        <p class="text-secondary mb-3">

                            {{ \Illuminate\Support\Str::limit(
                                $galeri->keterangan,
                                100
                            ) }}

                        </p>


                        {{-- Informasi bawah --}}
                        <div class="d-flex justify-content-between align-items-center">


                            {{-- Tanggal --}}
                            <small class="text-muted">

                                <i class="bi bi-calendar-event me-1"></i>

                                {{ \Carbon\Carbon::parse(
                                    $galeri->tanggal_upload
                                )->translatedFormat('d F Y') }}

                            </small>


                            {{-- Detail --}}
                            <a href="{{ route(
                                'galeri.detail',
                                $galeri->id
                            ) }}"
                               class="text-primary text-decoration-none fw-semibold">

                                Lihat

                                <i class="bi bi-arrow-right ms-1"></i>

                            </a>

                        </div>

                    </div>

                </div>

            </div>


        @empty

            {{-- =================================================
                DATA KOSONG
            ================================================== --}}
            <div class="col-12">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body text-center py-5">


                        <i class="bi bi-images text-secondary"
                           style="font-size:60px;">
                        </i>


                        <h5 class="fw-bold mt-3">

                            Belum Ada Galeri

                        </h5>


                        <p class="text-secondary mb-0">

                            Dokumentasi kegiatan belum tersedia.

                        </p>

                    </div>

                </div>

            </div>

        @endforelse

    </div>

</div>


{{-- =========================================================
    STYLE GALERI
========================================================== --}}
<style>

    .galeri-main-image {
        transition: transform 0.3s ease;
    }


    .card:hover .galeri-main-image {
        transform: scale(1.05);
    }


    .galeri-overlay {
        background: rgba(0, 0, 0, 0.25);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    .card:hover .galeri-overlay {
        opacity: 1;
    }


    .galeri-icon {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(5px);

        display: flex;
        align-items: center;
        justify-content: center;

        margin: auto;

        font-size: 25px;
    }


    .card {
        transition:
            transform 0.25s ease,
            box-shadow 0.25s ease;
    }


    .card:hover {
        transform: translateY(-4px);
    }


    @media (max-width: 767px) {

        .galeri-overlay {
            opacity: 1;
            background: rgba(0, 0, 0, 0.15);
        }

    }

</style>

@endsection
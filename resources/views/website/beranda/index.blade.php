@extends('layouts.website')

@section('content')

<!-- =========================
     HERO
========================== -->
@if($profil)

<section class="hero-section">

    <div id="heroCarousel"
         class="carousel slide"
         data-bs-ride="carousel">

        <div class="carousel-inner">

            @php
                $banners = is_array($profil->banner)
                    ? $profil->banner
                    : json_decode($profil->banner, true);
            @endphp

            @foreach($banners as $index => $banner)

                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">

                    <div class="hero-bg"
                         style="background-image:url('{{ asset('storage/'.$banner) }}')">

                        <div class="container">

                            <div class="hero-content">

                                <h1>
                                    Selamat Datang di Website PKBM ANIK
                                </h1>

                                <p>
                                    PKBM ANIK merupakan lembaga pendidikan
                                    nonformal yang menyediakan layanan
                                    pendidikan kesetaraan dan berbagai
                                    program pembelajaran bagi masyarakat.
                                </p>

                                <a href="{{ route('profil') }}"
                                   class="btn btn-primary">

                                    Selengkapnya

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>


        <button class="carousel-control-prev"
                type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide="prev">

            <span class="carousel-control-prev-icon"></span>

        </button>


        <button class="carousel-control-next"
                type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide="next">

            <span class="carousel-control-next-icon"></span>

        </button>

    </div>

</section>

@endif


<!-- =========================
     TENTANG SINGKAT
========================== -->
<section class="py-5 bg-light">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-5 mb-4">

                @if($profil && $profil->foto_profil)

                    <img src="{{ asset('storage/'.$profil->foto_profil) }}"
                         class="img-fluid rounded shadow"
                         alt="Profil PKBM">

                @endif

            </div>


            <div class="col-lg-7">

                <h2 class="fw-bold mb-3">
                    Tentang PKBM ANIK
                </h2>

                <p class="text-secondary">

                    {{ $profil->deskripsi_singkat ?? '' }}

                </p>

                <a href="{{ route('profil') }}"
                   class="btn btn-outline-primary">

                    Selengkapnya

                </a>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     PROGRAM PENDIDIKAN
========================== -->
<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Program Pendidikan
            </h2>

            <p class="text-secondary">

                PKBM ANIK menyediakan program pendidikan kesetaraan
                untuk membantu masyarakat memperoleh pendidikan
                yang berkualitas.

            </p>

        </div>


        <div class="row g-4">

            @forelse($programs as $program)

                <div class="col-lg-6">

                    <div class="card border-0 shadow-sm h-100">

                        @if($program->gambar)

                            <img src="{{ asset('storage/'.$program->gambar) }}"
                                 class="card-img-top"
                                 style="height:250px; object-fit:cover;"
                                 alt="{{ $program->nama_program }}">

                        @endif


                        <div class="card-body d-flex flex-column">

                            <h4 class="fw-bold">

                                {{ $program->nama_program }}

                            </h4>


                            <p class="text-secondary flex-grow-1">

                                {{ Str::limit($program->deskripsi, 120) }}

                            </p>


                            @if($program->nama_program == 'Paket B')

                                <a href="{{ route('program.paket-b') }}"
                                   class="btn btn-primary">

                                    Lihat Detail

                                </a>

                            @elseif($program->nama_program == 'Paket C')

                                <a href="{{ route('program.paket-c') }}"
                                   class="btn btn-primary">

                                    Lihat Detail

                                </a>

                            @endif

                        </div>

                    </div>

                </div>


            @empty

                <div class="col-12">

                    <div class="alert alert-warning text-center">

                        Program belum tersedia.

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>


<!-- =========================
     PPDB + INFORMASI + GALERI
========================== -->
<section class="py-5 bg-light">

    <div class="container">


        <!-- =========================
             PPDB
        ========================== -->
        @if($ppdb)

            <div class="mb-5">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    <div class="row g-0 align-items-center">


                        {{-- Gambar PPDB --}}
                        <div class="col-lg-5">

                            @if($ppdb->banner)

                                <img
                                    src="{{ asset('storage/' . $ppdb->banner) }}"
                                    alt="{{ $ppdb->judul }}"
                                    class="w-100 h-100"
                                    style="
                                        min-height:300px;
                                        object-fit:cover;
                                    ">

                            @else

                                <div class="bg-light d-flex align-items-center justify-content-center"
                                     style="min-height:300px;">

                                    <i class="bi bi-image fs-1 text-secondary"></i>

                                </div>

                            @endif

                        </div>


                        {{-- Konten PPDB --}}
                        <div class="col-lg-7">

                            <div class="p-4 p-lg-5">


                                {{-- Status PPDB --}}
                                <div class="mb-3">

                                    @if($ppdb->status == 'Buka')

                                        <span class="badge bg-success rounded-pill px-3 py-2">

                                            <i class="bi bi-megaphone-fill me-1"></i>

                                            PPDB Sedang Berlangsung

                                        </span>

                                    @else

                                        <span class="badge bg-danger rounded-pill px-3 py-2">

                                            <i class="bi bi-x-circle-fill me-1"></i>

                                            PPDB Ditutup

                                        </span>

                                    @endif

                                </div>


                                {{-- Judul --}}
                                <h2 class="fw-bold mb-3">

                                    {{ $ppdb->judul }}

                                </h2>


                                {{-- Deskripsi --}}
                                <p class="text-secondary mb-3">

                                    {{ Str::limit(strip_tags($ppdb->deskripsi), 180) }}

                                </p>


                                {{-- Tahun Ajaran --}}
                                <div class="d-flex align-items-center text-muted mb-4">

                                    <i class="bi bi-calendar-check me-2"></i>

                                    <span>

                                        Tahun Ajaran {{ $ppdb->tahun_ajaran }}

                                    </span>

                                </div>


                                {{-- Tombol berdasarkan status --}}
                                @if($ppdb->status == 'Buka')


                                    @if($ppdb->link_form)

                                        <a href="{{ $ppdb->link_form }}"
                                           target="_blank"
                                           rel="noopener noreferrer"
                                           class="btn btn-primary rounded-pill px-4 py-2 fw-semibold">

                                            <i class="bi bi-person-plus-fill me-2"></i>

                                            Daftar Sekarang

                                        </a>


                                    @elseif($ppdb->whatsapp)

                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $ppdb->whatsapp) }}"
                                           target="_blank"
                                           rel="noopener noreferrer"
                                           class="btn btn-success rounded-pill px-4 py-2 fw-semibold">

                                            <i class="bi bi-whatsapp me-2"></i>

                                            Daftar Sekarang

                                        </a>

                                    @endif


                                @else


                                    <div class="alert alert-warning rounded-3 mb-0">

                                        <i class="bi bi-info-circle-fill me-2"></i>

                                        PPDB saat ini ditutup.
                                        Silakan menunggu informasi pembukaan
                                        PPDB berikutnya.

                                    </div>


                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        @endif


        <!-- =========================
             INFORMASI & GALERI
        ========================== -->
        <div class="row">


            <!-- =========================
                 INFORMASI TERBARU
            ========================== -->
            <div class="col-lg-6 mb-5">


                {{-- Header --}}
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h2 class="fw-bold mb-0">

                        Informasi Terbaru

                    </h2>


                    <a href="{{ route('informasi') }}"
                       class="text-decoration-none fw-semibold">

                        Lihat Semua

                        <i class="bi bi-chevron-right"></i>

                    </a>

                </div>


                {{-- Daftar Informasi --}}
                @forelse($informasis as $informasi)


                    <a href="{{ route('informasi.detail', $informasi->id) }}"
                       class="text-decoration-none text-dark">


                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 info-card">


                            <div class="row g-0">


                                {{-- Gambar --}}
                                <div class="col-md-5">

                                    @if($informasi->gambar)

                                        <img
                                            src="{{ asset('storage/informasi/'.$informasi->gambar) }}"
                                            alt="{{ $informasi->judul }}"
                                            class="w-100 h-100"
                                            style="
                                                min-height:180px;
                                                object-fit:cover;
                                            ">

                                    @else

                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                             style="height:180px;">

                                            <i class="bi bi-image fs-1 text-secondary"></i>

                                        </div>

                                    @endif

                                </div>


                                {{-- Konten --}}
                                <div class="col-md-7">

                                    <div class="card-body p-4">


                                        {{-- Kategori --}}
                                        @if($informasi->kategori)

                                            <span class="badge bg-primary rounded-pill mb-2 px-3 py-2">

                                                {{ $informasi->kategori }}

                                            </span>

                                        @endif


                                        {{-- Judul --}}
                                        <h5 class="fw-bold mb-2">

                                            {{ $informasi->judul }}

                                        </h5>


                                        {{-- Tanggal --}}
                                        <div class="text-muted small mb-2">

                                            <i class="bi bi-calendar-event me-1"></i>

                                            {{ \Carbon\Carbon::parse($informasi->tanggal)->format('d M Y') }}

                                        </div>


                                        {{-- Ringkasan --}}
                                        <p class="text-secondary mb-0">

                                            {{ Str::limit(strip_tags($informasi->isi), 90) }}

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </a>


                @empty


                    <div class="alert alert-warning rounded-4">

                        <i class="bi bi-info-circle me-2"></i>

                        Belum ada informasi.

                    </div>


                @endforelse

            </div>


            <!-- =========================
                 GALERI
            ========================== -->
            <div class="col-lg-6">


                <div class="d-flex justify-content-between align-items-center mb-4">


                    <h2 class="fw-bold mb-0">

                        Galeri Kegiatan

                    </h2>


                    <a href="{{ route('galeri') }}"
                       class="text-decoration-none">

                        Lihat Semua

                        <i class="bi bi-chevron-right"></i>

                    </a>


                </div>


                <div class="row g-3">


                    @forelse($galeris as $galeri)


                        @php

                            $fotoPertama = $galeri->fotos->first();

                        @endphp


                        @if($fotoPertama)


                            <div class="col-lg-4 col-md-4 col-6">


                                <a href="{{ route('galeri.detail', $galeri->id) }}">


                                    <img
                                        src="{{ asset('storage/galeri/' . $fotoPertama->foto) }}"
                                        class="img-fluid rounded shadow-sm"
                                        style="
                                            width:100%;
                                            height:120px;
                                            object-fit:cover;
                                        "
                                        alt="{{ $galeri->judul }}">


                                </a>


                            </div>


                        @endif


                    @empty


                        <div class="col-12">


                            <div class="alert alert-warning">

                                Belum ada galeri.

                            </div>


                        </div>


                    @endforelse

                </div>


            </div>

        </div>

    </div>

</section>


@endsection
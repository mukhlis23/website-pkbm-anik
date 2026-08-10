@extends('layouts.website')

@section('content')

@if($profil)

{{-- Hero Profil --}}
<section class="profil-hero-section">
    <div id="profilBannerCarousel" class="carousel slide">
        <div class="carousel-inner">
            @php
                $banners = is_array($profil->banner)
                    ? $profil->banner
                    : json_decode($profil->banner, true);

                if (is_string($banners)) {
                    $banners = json_decode($banners, true);
                }
                $banners = is_array($banners) ? $banners : [];
            @endphp

            @forelse($banners as $index => $banner)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="profil-bg"
                         style="
                         background-image:
                         linear-gradient(
                            90deg,
                            rgba(5,25,55,.82),
                            rgba(5,25,55,.45),
                            rgba(5,25,55,.25)
                         ),
                         url('{{ asset('storage/'.$banner) }}');
                         ">

                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <div class="col-lg-8">
                                    {{-- Judul --}}
                                    <h1 class="display-4 fw-bold text-white mb-4">
                                        {{ $profil->judul }}
                                    </h1>

                                    {{-- Deskripsi --}}
                                    <p class="lead text-white mb-4 profil-hero-description">
                                        {{ $profil->deskripsi_singkat }}
                                    </p>

                                    {{-- Tombol --}}
                                    <div class="d-flex flex-wrap gap-2">
                                        <a href="#tentang"
                                           class="btn btn-light btn-lg px-4">
                                            <i class="bi bi-arrow-down-circle me-2"></i>
                                            Kenali Kami
                                        </a>

                                        <a href="{{ route('program') }}"
                                           class="btn btn-outline-light btn-lg px-4">
                                            <i class="bi bi-book me-2"></i>
                                            Lihat Program
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <div class="carousel-item active">
                    <div class="profil-bg bg-dark">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <div class="col-lg-8">

                                    <div class="profil-hero-badge mb-3">
                                        <i class="bi bi-building me-2"></i>
                                        Profil PKBM ANIK
                                    </div>

                                    <h1 class="display-4 fw-bold text-white mb-4">
                                        {{ $profil->judul }}
                                    </h1>

                                    <p class="lead text-white">
                                        {{ $profil->deskripsi_singkat }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforelse
        </div>

        {{-- Tombol Slider --}}
        @if(count($banners) > 1)
            <button class="carousel-control-prev"
                    type="button"
                    data-bs-target="#profilBannerCarousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>

            </button>

            <button class="carousel-control-next"
                    type="button"
                    data-bs-target="#profilBannerCarousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        @endif
    </div>
</section>

{{-- TENTANG PKBM--}}
<section id="tentang" class="py-5 profil-section">
    <div class="container">
        <div class="row align-items-center g-5">
            {{-- Foto --}}
            <div class="col-lg-5">
                @if($profil->foto_profil)
                    <div class="profil-image-wrapper">
                        <img
                            src="{{ asset('storage/'.$profil->foto_profil) }}"
                            class="img-fluid"
                            alt="Foto Profil PKBM ANIK">

                        <div class="profil-image-badge">
                            <i class="bi bi-mortarboard-fill"></i>
                            <div>
                                <strong>PKBM ANIK</strong>
                                <small>Pusat Kegiatan Belajar Masyarakat</small>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Teks --}}
            <div class="col-lg-7">
                <div class="section-label">
                    <span>TENTANG KAMI</span>
                </div>

                <h2 class="section-title fw-bold">
                    Tentang PKBM ANIK
                </h2>

                <div class="section-line mb-4"></div>

                <p class="profil-about-text">
                    {{ $profil->tentang }}
                </p>

                {{-- Highlight --}}
                <div class="row g-3 mt-4">
                    <div class="col-sm-6">
                        <div class="profil-highlight">
                            <div class="profil-highlight-icon">
                                <i class="bi bi-book-half"></i>
                            </div>

                            <div>
                                <strong>Pendidikan</strong>
                                <span>Kesetaraan berkualitas</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="profil-highlight">
                            <div class="profil-highlight-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>

                            <div>
                                <strong>Masyarakat</strong>
                                <span>Pendidikan untuk semua</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- AKREDITASI--}}
<section class="py-5 bg-light profil-section">
    <div class="container">
        {{-- Heading --}}
        <div class="text-center section-heading mb-5">
            <div class="section-label justify-content-center">
                <span>LEGALITAS & MUTU</span>
            </div>
            <h2 class="section-title fw-bold">
                Akreditasi PKBM ANIK
            </h2>
            <p class="text-secondary">
                Informasi mengenai status akreditasi PKBM ANIK.
            </p>
        </div>

        <div class="row align-items-center g-5">
            {{-- Gambar --}}
            <div class="col-lg-5">
                @if($profil->gambar_akreditasi)
                    <div class="akreditasi-image-card">
                        <img
                            src="{{ asset('storage/'.$profil->gambar_akreditasi) }}"
                            class="img-fluid"
                            alt="Dokumen Akreditasi PKBM ANIK">

                        <div class="akreditasi-image-overlay">
                            <i class="bi bi-patch-check-fill"></i>
                            Dokumen Akreditasi
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning">
                        Gambar akreditasi belum tersedia.
                    </div>
                @endif
            </div>

            {{-- Informasi --}}
            <div class="col-lg-7">
                <div class="row g-3">
                    {{-- Status --}}
                    <div class="col-12">
                        <div class="accreditation-card accreditation-primary">
                            <div class="accreditation-icon">
                                <i class="bi bi-patch-check-fill"></i>
                            </div>

                            <div>
                                <small>
                                    STATUS AKREDITASI
                                </small>

                                <h4 class="fw-bold mb-0">
                                    {{ $profil->status_akreditasi ?: '-' }}
                                </h4>
                            </div>
                        </div>
                    </div>

                    {{-- Nomor SK --}}
                    <div class="col-md-6">
                        <div class="accreditation-card">
                            <div class="accreditation-icon text-success">
                                <i class="bi bi-file-earmark-text-fill"></i>
                            </div>

                            <div>
                                <small>
                                    NOMOR SK
                                </small>

                                <h5 class="fw-bold mb-0">
                                    {{ $profil->nomor_sk ?: '-' }}
                                </h5>
                            </div>
                        </div>
                    </div>

                    {{-- Tahun --}}
                    <div class="col-md-6">
                        <div class="accreditation-card">
                            <div class="accreditation-icon text-danger">
                                <i class="bi bi-calendar-event-fill"></i>
                            </div>

                            <div>
                                <small>
                                    TAHUN
                                </small>

                                <h5 class="fw-bold mb-0">
                                    {{ $profil->tahun ?: '-' }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- VISI MISI--}}
<section class="py-5 profil-section">
    <div class="container">
        <div class="text-center section-heading mb-5">
            <div class="section-label justify-content-center">
                <span>LANDASAN ORGANISASI</span>
            </div>

            <h2 class="section-title fw-bold">
                Visi, Misi dan Tujuan
            </h2>
            <p class="text-secondary">
                Landasan dan arah pengembangan PKBM ANIK.
            </p>
        </div>

        <div class="row g-4">
            {{-- VISI --}}
            <div class="col-lg-4">
                <div class="vision-card vision-primary h-100">
                    <div class="vision-number">
                        01
                    </div>
                    <div class="vision-icon">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <h4 class="fw-bold">
                        Visi
                    </h4>

                    <div class="vision-line"></div>
                    <p>
                        {{ $profil->visi }}
                    </p>
                </div>
            </div>

            {{-- MISI --}}
            <div class="col-lg-4">
                <div class="vision-card vision-success h-100">
                    <div class="vision-number">
                        02
                    </div>
                    <div class="vision-icon">
                        <i class="bi bi-book-half"></i>
                    </div>
                    <h4 class="fw-bold">
                        Misi
                    </h4>
                    <div class="vision-line"></div>
                    <div class="text-secondary text-start">
                        {!! nl2br(e($profil->misi)) !!}
                    </div>
                </div>
            </div>

            {{-- TUJUAN --}}
            <div class="col-lg-4">
                <div class="vision-card vision-danger h-100">
                    <div class="vision-number">
                        03
                    </div>

                    <div class="vision-icon">

                        <i class="bi bi-trophy-fill"></i>

                    </div>

                    <h4 class="fw-bold">
                        Tujuan
                    </h4>

                    <div class="vision-line"></div>

                    <p>
                        {{ $profil->tujuan }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- STRUKTUR ORGANISASI--}}
<section class="py-5 bg-light profil-section">
    <div class="container">
        <div class="text-center section-heading mb-5">
            <div class="section-label justify-content-center">
                <span>ORGANISASI</span>
            </div>

            <h2 class="section-title fw-bold">
                Struktur Organisasi
            </h2>

            <p class="text-secondary">
                Struktur organisasi PKBM ANIK.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if($profil->struktur_organisasi)
                    <div class="structure-card">
                        <div class="structure-header">
                            <div>
                                <i class="bi bi-diagram-3-fill me-2"></i>
                                Struktur Organisasi PKBM ANIK
                            </div>
                            <span>
                                PKBM ANIK
                            </span>
                        </div>

                        <div class="structure-image">
                            <img
                                src="{{ asset('storage/'.$profil->struktur_organisasi) }}"
                                class="img-fluid"
                                alt="Struktur Organisasi PKBM ANIK">
                        </div>
                    </div>
                @else

                    <div class="alert alert-warning text-center">
                        Gambar struktur organisasi belum tersedia.
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>


@else

<section class="py-5">
    <div class="container">
        <div class="alert alert-warning text-center">
            <i class="bi bi-exclamation-triangle fs-1 d-block mb-3"></i>

            <h4 class="mb-2">
                Data Profil Belum Tersedia
            </h4>

            <p class="mb-0">
                Silakan tambahkan data profil melalui halaman admin.
            </p>

        </div>
    </div>
</section>

@endif

{{-- CTA PROGRAM--}}
<section class="profil-cta-section py-5">
    <div class="container">
        <div class="profil-cta">
            <div class="profil-cta-icon">
                <i class="bi bi-mortarboard-fill"></i>
            </div>

            <h2 class="fw-bold mb-3">
                Bergabung Bersama PKBM ANIK
            </h2>

            <p class="mb-4">
                Wujudkan pendidikan yang lebih baik bersama PKBM ANIK.
                Dapatkan informasi program pendidikan dan kegiatan terbaru
                melalui website resmi kami.
            </p>

            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('program') }}"
                   class="btn btn-light btn-lg px-4">
                    <i class="bi bi-book me-2"></i>
                    Lihat Program
                </a>

                <a href="{{ route('kontak') }}"
                   class="btn btn-outline-light btn-lg px-4">

                    <i class="bi bi-envelope me-2"></i>
                    Hubungi Kami

                </a>
            </div>
        </div>
    </div>
</section>

@endsection
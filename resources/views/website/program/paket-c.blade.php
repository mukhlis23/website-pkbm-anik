@extends('layouts.website')

@section('content')

@if($program)

{{-- =========================================================
    BREADCRUMB
========================================================== --}}
<div class="container">
    <nav aria-label="breadcrumb" class="program-breadcrumb py-3">
        <ol class="breadcrumb mb-0">

            <li class="breadcrumb-item">
                <a href="{{ route('program') }}">
                    Program
                </a>
            </li>

            <li class="breadcrumb-item active" aria-current="page">
                Paket C
            </li>

        </ol>
    </nav>
</div>


{{-- =========================================================
    HERO PROGRAM
========================================================== --}}
<section class="program-hero">

    <div class="container">

        <div class="row g-4 align-items-center">

            {{-- SIDEBAR --}}
            <div class="col-lg-3">

                <div class="program-sidebar">

                    <div class="card">

                        <div class="card-header">
                            <i class="bi bi-mortarboard-fill me-2"></i>
                            Program
                        </div>

                        <div class="list-group list-group-flush">

                            {{-- PAKET B --}}
                            <a href="{{ route('program.paket-b') }}"
                               class="list-group-item list-group-item-action">

                                <i class="bi bi-book me-2"></i>
                                Paket B

                            </a>


                            {{-- PAKET C --}}
                            <a href="{{ route('program.paket-c') }}"
                               class="list-group-item list-group-item-action active">

                                <i class="bi bi-book me-2"></i>
                                Paket C

                            </a>

                        </div>

                    </div>

                </div>

            </div>


            {{-- HERO --}}
            <div class="col-lg-9">

                <div class="program-hero-card">

                    <div class="row align-items-center g-4">

                        {{-- KONTEN HERO --}}
                        <div class="col-md-7">

                            <div class="program-hero-content">

                                <div class="program-badge">

                                    <i class="bi bi-mortarboard-fill"></i>

                                    Program Pendidikan Kesetaraan

                                </div>


                                <h1 class="program-hero-title">

                                    Program {{ $program->nama_program }}

                                </h1>


                                <div class="program-hero-line"></div>


                                <p class="program-hero-description">

                                    {{ $program->deskripsi }}

                                </p>


                                {{-- INFORMASI SINGKAT --}}
                                <div class="program-hero-buttons">

                                    <span class="badge rounded-pill text-bg-light border">

                                        <i class="bi bi-mortarboard-fill me-1"></i>

                                        Setara SMA

                                    </span>


                                    <span class="badge rounded-pill text-bg-light border">

                                        <i class="bi bi-person-workspace me-1"></i>

                                        Pendampingan Tutor

                                    </span>

                                </div>


                                {{-- TOMBOL --}}
                                <div class="program-hero-buttons mt-3">

                                    <a href="{{ route('ppdb') }}"
                                       class="btn btn-primary">

                                        <i class="bi bi-pencil-square me-2"></i>

                                        Daftar Sekarang

                                    </a>

                                </div>

                            </div>

                        </div>


                        {{-- GAMBAR --}}
                        <div class="col-md-5">

                            <div class="program-hero-image">

                                @if($program->gambar)

                                    <img
                                        src="{{ asset('storage/'.$program->gambar) }}"
                                        alt="{{ $program->nama_program }}">

                                @else

                                    <div class="program-image-placeholder">

                                        <i class="bi bi-image"></i>

                                        <span>
                                            Gambar Program
                                        </span>

                                    </div>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    QUICK INFO
========================================================== --}}
<section class="program-quick-info">

    <div class="container">

        <div class="row g-3">


            {{-- SETARA SMA --}}
            <div class="col-md-4">

                <div class="program-quick-card">

                    <div class="program-quick-icon">

                        <i class="bi bi-mortarboard-fill"></i>

                    </div>

                    <div>

                        <strong>
                            Setara SMA
                        </strong>

                        <span>
                            Program pendidikan kesetaraan yang setara
                            dengan jenjang Sekolah Menengah Atas.
                        </span>

                    </div>

                </div>

            </div>


            {{-- PEMBELAJARAN FLEKSIBEL --}}
            <div class="col-md-4">

                <div class="program-quick-card">

                    <div class="program-quick-icon">

                        <i class="bi bi-calendar-check-fill"></i>

                    </div>

                    <div>

                        <strong>
                            Pembelajaran Fleksibel
                        </strong>

                        <span>
                            Kegiatan belajar disesuaikan dengan kondisi
                            dan kebutuhan warga belajar.
                        </span>

                    </div>

                </div>

            </div>


            {{-- PENDAMPINGAN TUTOR --}}
            <div class="col-md-4">

                <div class="program-quick-card">

                    <div class="program-quick-icon">

                        <i class="bi bi-person-workspace"></i>

                    </div>

                    <div>

                        <strong>
                            Pendampingan Tutor
                        </strong>

                        <span>
                            Warga belajar mendapatkan pendampingan
                            selama proses pembelajaran.
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    TENTANG PROGRAM
========================================================== --}}
<section class="program-about-section">

    <div class="container">

        <div class="program-section-heading">

            <div class="program-section-label">

                <i class="bi bi-info-circle-fill"></i>

                Tentang Program

            </div>


            <h2 class="program-section-title">

                Mengenal Program {{ $program->nama_program }}

            </h2>


            <p class="program-section-description">

                Informasi mengenai program pendidikan kesetaraan
                yang diselenggarakan oleh PKBM ANIK.

            </p>

        </div>


        <div class="program-about-card">

            <div class="row align-items-center g-4">


                {{-- GAMBAR --}}
                <div class="col-lg-5">

                    <div class="program-about-image">

                        @if($program->gambar)

                            <img
                                src="{{ asset('storage/'.$program->gambar) }}"
                                alt="{{ $program->nama_program }}">


                            <div class="program-about-image-label">

                                <i class="bi bi-mortarboard-fill"></i>

                                <span>
                                    Program {{ $program->nama_program }}
                                </span>

                            </div>

                        @else

                            <div class="program-image-placeholder">

                                <i class="bi bi-image"></i>

                                <span>
                                    Gambar Program
                                </span>

                            </div>

                        @endif

                    </div>

                </div>


                {{-- TENTANG --}}
                <div class="col-lg-7">

                    <div class="program-about-content">

                        <div class="program-content-label">

                            Tentang Program

                        </div>


                        <h3>

                            {{ $program->nama_program }}

                        </h3>


                        <div class="program-content-line"></div>


                        <p>

                            {!! nl2br(e($program->tentang)) !!}

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    MATERI & JADWAL
========================================================== --}}
<section class="program-detail-section">

    <div class="container">

        <div class="row g-4">


            {{-- MATERI --}}
            <div class="col-lg-7">

                <div class="program-detail-card h-100">

                    <div class="program-detail-header">

                        <div class="program-detail-icon blue">

                            <i class="bi bi-journal-bookmark-fill"></i>

                        </div>


                        <div>

                            <span>
                                PEMBELAJARAN
                            </span>

                            <h3>
                                Materi Pembelajaran
                            </h3>

                        </div>

                    </div>


                    <div class="program-detail-body">

                        <p>

                            {!! nl2br(e($program->materi)) !!}

                        </p>

                    </div>

                </div>

            </div>


            {{-- JADWAL --}}
            <div class="col-lg-5">

                <div class="program-detail-card program-schedule-card h-100">

                    <div class="program-detail-header">

                        <div class="program-detail-icon green">

                            <i class="bi bi-calendar-event-fill"></i>

                        </div>


                        <div>

                            <span>
                                WAKTU PEMBELAJARAN
                            </span>

                            <h3>
                                Jadwal Belajar
                            </h3>

                        </div>

                    </div>


                    <div class="program-detail-body">

                        <p>

                            {!! nl2br(e($program->jadwal)) !!}

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    KEUNGGULAN PROGRAM
========================================================== --}}
<section class="program-advantages-section">

    <div class="container">

        <div class="program-section-heading">

            <div class="program-section-label">

                <i class="bi bi-stars"></i>

                Keunggulan Program

            </div>


            <h2 class="program-section-title">

                Mengapa Memilih Program
                {{ $program->nama_program }}?

            </h2>


            <p class="program-section-description">

                Beberapa keunggulan yang mendukung proses pembelajaran
                warga belajar di PKBM ANIK.

            </p>

        </div>


        @if($program->keunggulans->count())

            <div class="row g-4">

                @foreach($program->keunggulans as $item)

                    <div class="col-md-6 col-lg-4">

                        <div class="program-feature-card h-100">

                            <div class="program-feature-icon">

                                <i class="bi {{ $item->icon }}"></i>

                            </div>


                            <h4>

                                {{ $item->judul }}

                            </h4>


                            <div class="program-feature-line"></div>


                            <p>

                                Keunggulan Program
                                {{ $program->nama_program }}
                                PKBM ANIK.

                            </p>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="program-empty">

                <i class="bi bi-info-circle"></i>

                <p class="mb-0">

                    Belum ada data keunggulan program.

                </p>

            </div>

        @endif

    </div>

</section>


{{-- =========================================================
    CTA PROGRAM
========================================================== --}}
<div class="container">

    <div class="program-cta">


        {{-- DEKORASI --}}
        <div class="program-cta-circle program-cta-circle-one"></div>

        <div class="program-cta-circle program-cta-circle-two"></div>


        {{-- CONTENT --}}
        <div class="program-cta-content">


            {{-- LABEL --}}
            <div class="program-cta-label">

                <i class="bi bi-mortarboard-fill"></i>

                <span>
                    PKBM ANIK
                </span>

            </div>


            {{-- JUDUL --}}
            <h2 class="program-cta-title">

                Yuk, Mulai Pendidikan Anda Sekarang!

            </h2>


            {{-- DESKRIPSI --}}
            <p class="program-cta-description">

                Bergabunglah bersama PKBM ANIK melalui
                Program {{ $program->nama_program }}.
                Informasi pendaftaran tersedia melalui halaman PPDB.

            </p>


            {{-- FEATURES --}}
            <div class="program-cta-features">

                <span>

                    <i class="bi bi-check-circle-fill"></i>

                    Setara SMA

                </span>


                <span>

                    <i class="bi bi-person-check-fill"></i>

                    Pendampingan Tutor

                </span>


                <span>

                    <i class="bi bi-shield-check"></i>

                    Pembelajaran Fleksibel

                </span>

            </div>


            {{-- BUTTON --}}
            <div class="program-cta-action">

                <a href="{{ route('ppdb') }}"
                   class="program-cta-button">

                    <span class="program-cta-button-icon">

                        <i class="bi bi-arrow-right"></i>

                    </span>

                    <span>
                        Daftar Sekarang
                    </span>

                </a>

            </div>

        </div>

    </div>

</div>


@else

{{-- =========================================================
    DATA TIDAK TERSEDIA
========================================================== --}}
<section class="program-empty-section">

    <div class="container">

        <div class="program-empty">

            <i class="bi bi-exclamation-circle"></i>

            <h3>
                Data Program Belum Tersedia
            </h3>

            <p>
                Data Program Paket C belum tersedia.
            </p>

            <a href="{{ route('program') }}"
               class="btn btn-primary">

                <i class="bi bi-arrow-left me-2"></i>

                Kembali ke Program

            </a>

        </div>

    </div>

</section>

@endif

@endsection
@extends('layouts.website')

@section('content')

<!-- HERO PPDB -->
@if($ppdb)

<section class="position-relative overflow-hidden"
    style="
        background-image:url('{{ asset('storage/'.$ppdb->banner) }}');
        background-size:cover;
        background-position:center;
        min-height:650px;
    ">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="background:rgba(0,0,0,.55);"></div>

    <div class="container position-relative">
        <div class="row align-items-center"
             style="min-height:650px;">

            <div class="col-lg-7 text-white">

                <span class="badge bg-warning text-dark px-3 py-2 mb-3 fs-6">
                    🎓 Tahun Ajaran {{ $ppdb->tahun_ajaran }}
                </span>

                <h1 class="display-3 fw-bold mb-4">
                    {{ $ppdb->judul }}
                </h1>

                <p class="lead mb-4">
                    Bergabunglah bersama PKBM ANIK untuk memperoleh pendidikan
                    kesetaraan yang berkualitas, fleksibel, dan sesuai kebutuhan masyarakat.
                </p>

                @if($ppdb->status == 'Buka')

                    <span class="badge bg-success fs-6 px-4 py-2 mb-4">
                        PPDB DIBUKA
                    </span>

                @else

                    <span class="badge bg-danger fs-6 px-4 py-2 mb-4">
                        PPDB DITUTUP
                    </span>

                @endif

                <div class="mt-4">

                    @if($ppdb->status == 'Buka')

                        @if($ppdb->link_form)

                            <a href="{{ $ppdb->link_form }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="btn btn-warning btn-lg rounded-pill px-4 me-3">

                                <i class="bi bi-pencil-square"></i>
                                Daftar Sekarang

                            </a>

                        @endif

                        @if($ppdb->whatsapp)

                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$ppdb->whatsapp) }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="btn btn-success btn-lg rounded-pill px-4">

                                <i class="bi bi-whatsapp"></i>
                                Hubungi Admin

                            </a>

                        @endif

                    @endif

                </div>

            </div>

        </div>
    </div>

</section>

@endif


<!-- INFORMASI SINGKAT -->
<section class="py-5 bg-light">

    <div class="container">

        <div class="row g-4">

            <!-- Tahun Ajaran -->
            <div class="col-md-3">

                <div class="card border-0 shadow-sm text-center h-100">

                    <div class="card-body">

                        <div class="fs-1 mb-3">
                            🎓
                        </div>

                        <h6 class="text-muted">
                            Tahun Ajaran
                        </h6>

                        <h4 class="fw-bold text-primary">
                            {{ $ppdb->tahun_ajaran }}
                        </h4>

                    </div>

                </div>

            </div>


            <!-- Status -->
            <div class="col-md-3">

                <div class="card border-0 shadow-sm text-center h-100">

                    <div class="card-body">

                        <div class="fs-1 mb-3">
                            📢
                        </div>

                        <h6 class="text-muted">
                            Status
                        </h6>

                        @if($ppdb->status == 'Buka')

                            <span class="badge bg-success fs-6 px-3 py-2">
                                PPDB Dibuka
                            </span>

                        @else

                            <span class="badge bg-danger fs-6 px-3 py-2">
                                PPDB Ditutup
                            </span>

                        @endif

                    </div>

                </div>

            </div>


            <!-- Google Form -->
            <div class="col-md-3">

                <div class="card border-0 shadow-sm text-center h-100">

                    <div class="card-body">

                        <div class="fs-1 mb-3">
                            📝
                        </div>

                        <h6 class="text-muted">
                            Formulir
                        </h6>

                        @if($ppdb->status == 'Buka' && $ppdb->link_form)

                            <a href="{{ $ppdb->link_form }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="btn btn-primary">

                                Isi Form

                            </a>

                        @else

                            <button
                                class="btn btn-secondary"
                                onclick="ppdbTutup()">

                                Isi Form

                            </button>

                        @endif

                    </div>

                </div>

            </div>


            <!-- WhatsApp -->
            <div class="col-md-3">

                <div class="card border-0 shadow-sm text-center h-100">

                    <div class="card-body">

                        <div class="fs-1 mb-3">
                            📱
                        </div>

                        <h6 class="text-muted">
                            WhatsApp
                        </h6>

                        @if($ppdb->whatsapp)

                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$ppdb->whatsapp) }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="btn btn-success">

                                Hubungi Admin

                            </a>

                        @else

                            <span class="text-muted">
                                Belum tersedia
                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


@if($ppdb)


<!-- BANNER PPDB -->
<section class="py-5 bg-light">

    <div class="container">

        @if($ppdb->banner)

            <img
                src="{{ asset('storage/'.$ppdb->banner) }}"
                alt="{{ $ppdb->judul }}"
                class="img-fluid rounded shadow w-100"
                style="max-height:450px;object-fit:cover;">

        @endif

    </div>

</section>


<!-- DESKRIPSI -->
<section class="py-5">

    <div class="container">

        <div class="card shadow-sm border-0">

            <div class="card-body p-4">

                <h2 class="fw-bold mb-3">
                    Tentang PPDB
                </h2>

                <p class="mb-0">
                    {!! nl2br(e($ppdb->deskripsi)) !!}
                </p>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     ALUR PENDAFTARAN
========================== -->
<section class="py-5 bg-light">

    <div class="container">

        <!-- Judul -->
        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Alur Pendaftaran
            </h2>

            <p class="text-muted">
                Ikuti langkah berikut untuk menjadi peserta didik PKBM ANIK.
            </p>

        </div>


        @php

            $alur = preg_split(
                '/\r\n|\r|\n/',
                trim($ppdb->alur)
            );

            $alur = array_values(
                array_filter(
                    $alur,
                    fn($item) => trim($item) != ''
                )
            );

        @endphp


        <!-- Diagram Alur -->
        <div class="ppdb-flow">

            @foreach($alur as $key => $item)

                <div class="ppdb-flow-item">

                    <!-- Nomor -->
                    <div class="ppdb-flow-number">

                        {{ $key + 1 }}

                    </div>


                    <!-- Card -->
                    <div class="ppdb-flow-card">

                        <div class="ppdb-flow-icon">

                            @if($key == 0)

                                <i class="bi bi-pencil-square"></i>

                            @elseif($key == 1)

                                <i class="bi bi-file-earmark-text"></i>

                            @elseif($key == 2)

                                <i class="bi bi-person-check"></i>

                            @elseif($key == 3)

                                <i class="bi bi-mortarboard-fill"></i>

                            @else

                                <i class="bi bi-check-circle-fill"></i>

                            @endif

                        </div>


                        <h5 class="fw-bold mb-0">

                            {{ trim($item) }}

                        </h5>

                    </div>


                    <!-- Panah -->
                    @if(!$loop->last)

                        <div class="ppdb-flow-arrow">

                            <i class="bi bi-arrow-right"></i>

                        </div>

                    @endif

                </div>

            @endforeach

        </div>

    </div>

</section>


<!-- =========================
     PERSYARATAN PENDAFTARAN
========================== -->
@php

    $persyaratan = preg_split(
        '/\r\n|\r|\n/',
        trim($ppdb->persyaratan)
    );

    $persyaratan = array_filter(
        $persyaratan,
        fn($item) => trim($item) != ''
    );

@endphp


<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Persyaratan Pendaftaran
            </h2>

            <p class="text-muted">
                Siapkan dokumen berikut sebelum melakukan pendaftaran.
            </p>

        </div>


        <div class="row g-4">

            @foreach($persyaratan as $item)

                <div class="col-lg-4 col-md-6">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body d-flex">

                            <div class="me-3">

                                <div
                                    class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center"
                                    style="width:45px;height:45px;">

                                    <i class="bi bi-check-lg"></i>

                                </div>

                            </div>


                            <div>

                                <p class="mb-0">

                                    {{ trim($item) }}

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


<!-- =========================
     JADWAL PPDB
========================== -->
@php

    $jadwal = preg_split(
        '/\r\n|\r|\n/',
        trim($ppdb->jadwal)
    );

    $jadwal = array_values(
        array_filter(
            $jadwal,
            fn($item) => trim($item) != ''
        )
    );

@endphp


<section class="py-5 bg-light">

    <div class="container">

        <!-- Judul -->
        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Jadwal Penerimaan Peserta Didik Baru
            </h2>

            <p class="text-muted">
                Perhatikan setiap tahapan dan tanggal penting dalam proses PPDB PKBM ANIK.
            </p>

        </div>


        <!-- Timeline Jadwal -->
        <div class="ppdb-timeline">

            @foreach($jadwal as $key => $item)

                @php

                    $bagian = explode('|', $item);

                    $tanggal = trim(
                        $bagian[0] ?? ''
                    );

                    $kegiatan = trim(
                        $bagian[1] ?? ''
                    );

                @endphp


                <div class="ppdb-timeline-item">

                    <!-- Nomor -->
                    <div class="ppdb-timeline-marker">

                        <span>
                            {{ $key + 1 }}
                        </span>

                    </div>


                    <!-- Card Jadwal -->
                    <div class="ppdb-timeline-card">

                        <div class="d-flex align-items-center">

                            <!-- Icon Jadwal -->
                            <div class="ppdb-timeline-icon">

                                <i class="bi bi-calendar-event"></i>

                            </div>


                            <!-- Informasi Jadwal -->
                            <div>

                                <!-- Tanggal -->
                                <div class="small text-primary fw-semibold mb-1">

                                    <i class="bi bi-calendar3 me-1"></i>

                                    {{ $tanggal }}

                                </div>


                                <!-- Nama Kegiatan -->
                                <h5 class="fw-bold mb-0">

                                    {{ $kegiatan }}

                                </h5>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


<!-- =========================
     CALL TO ACTION
========================== -->
<section class="ppdb-cta py-5"
    style="background-image:url('{{ asset('storage/'.$ppdb->banner) }}');">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8 text-center">

                <span class="badge bg-warning text-dark mb-4">

                    🎓 PPDB {{ $ppdb->tahun_ajaran }}

                </span>


                <h2 class="mb-5">

                    Siap Menjadi Peserta Didik PKBM ANIK?

                </h2>


                @if($ppdb->status == 'Buka')

                    @if($ppdb->link_form)

                        <a href="{{ $ppdb->link_form }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn btn-warning btn-lg mb-3">

                            <i class="bi bi-pencil-square"></i>

                            Daftar Sekarang

                        </a>

                    @endif


                    <br>


                    @if($ppdb->whatsapp)

                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$ppdb->whatsapp) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn btn-success btn-lg">

                            <i class="bi bi-whatsapp"></i>

                            Hubungi Admin

                        </a>

                    @endif


                @else

                    <div class="alert alert-warning d-inline-block px-4 py-3 shadow-sm rounded-3">

                        <h5 class="mb-2">

                            <i class="bi bi-lock-fill me-2"></i>

                            PPDB Saat Ini Ditutup

                        </h5>

                        <p class="mb-0">

                            Silakan menunggu informasi pembukaan PPDB berikutnya.

                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>

</section>


@endif

@endsection
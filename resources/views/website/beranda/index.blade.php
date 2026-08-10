@extends('layouts.website')

@section('content')

<!-- Hero -->
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

<!-- Tentang Singkat -->
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

<!-- Program Pendidikan -->
<section class="py-5">

    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">
                Program Pendidikan
            </h2>

            <p class="text-secondary">
                PKBM ANIK menyediakan program pendidikan kesetaraan untuk membantu
                masyarakat memperoleh pendidikan yang berkualitas.
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

<!-- Informasi & Galeri -->
<section class="py-5 bg-light">

    <div class="container">
        <div class="row">

            <!-- =========================
                 INFORMASI TERBARU
            ========================== -->
            <div class="col-lg-6 mb-5">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h2 class="fw-bold mb-0">
                        Informasi Terbaru
                    </h2>

                    <a href="{{ route('informasi') }}"
                       class="text-decoration-none">

                        Lihat Semua
                        <i class="bi bi-chevron-right"></i>

                    </a>

                </div>

                @forelse($informasis as $informasi)

                    <a href="{{ route('informasi.detail', $informasi->id) }}"
                       class="text-decoration-none text-dark">

                        <div class="d-flex align-items-start mb-4 p-2 rounded info-item border-bottom">

                            <div class="me-3 flex-shrink-0">

                                @if($informasi->gambar)

                                    <img
                                        src="{{ asset('storage/informasi/'.$informasi->gambar) }}"
                                        alt="{{ $informasi->judul }}"
                                        class="rounded shadow-sm"
                                        style="width:120px;height:90px;object-fit:cover;">

                                @else

                                    <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                         style="width:120px;height:90px;">

                                        <i class="bi bi-image fs-2 text-secondary"></i>

                                    </div>

                                @endif

                            </div>

                            <div class="flex-grow-1">

                                <h5 class="fw-bold mb-2">

                                    {{ $informasi->judul }}

                                </h5>

                                <small class="text-muted">

                                    <i class="bi bi-calendar-event"></i>

                                    {{ \Carbon\Carbon::parse($informasi->tanggal)->format('d M Y') }}

                                </small>

                                <p class="text-secondary mt-2 mb-0">

                                    {{ Str::limit(strip_tags($informasi->isi), 70) }}

                                </p>

                            </div>

                        </div>

                    </a>

                @empty

                    <div class="alert alert-warning">

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
                           $fotoPertama = $galeri->fotos->first()
                        @endphp
                        
                        @if($fotoPertama)
                           <div class="col-lg-4 col-md-4 col-6">
                              <a href="{{ route('galeri.detail', $galeri->id) }}">
                                <img
                                    src="{{ asset('storage/galeri/' . $fotoPertama->foto) }}"
                                    class="img-fluid rounded shadow-sm"
                                    style="width:100%;height:120px;object-fit:cover;"
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
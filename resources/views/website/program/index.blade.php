@extends('layouts.website')

@section('content')

<!-- Hero / Header Program -->
<section class="py-5 border-bottom">

    <div class="container">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-4">

            <ol class="breadcrumb">

                <li class="breadcrumb-item">

                    <a href="{{ route('beranda') }}"
                       class="text-decoration-none">

                        Beranda

                    </a>

                </li>

                <li class="breadcrumb-item active">

                    Program

                </li>

            </ol>

        </nav>


        {{-- Judul Program --}}
        <div class="text-center">

            <h1 class="fw-bold mb-3">
                Program Pendidikan
            </h1>

            <p class="text-secondary mb-0">

                PKBM ANIK menyediakan program pendidikan kesetaraan
                untuk membantu masyarakat memperoleh layanan pendidikan
                yang berkualitas.

            </p>

        </div>

    </div>

</section>


<!-- Program Pendidikan Kesetaraan -->
<section class="py-5">

    <div class="container">

        {{-- Heading --}}
        <div class="text-center mb-5">

            <h2 class="fw-bold mb-2">
                Program Pendidikan Kesetaraan
            </h2>

            <p class="text-secondary mb-0">

                Informasi program pendidikan yang tersedia di PKBM ANIK.

            </p>

        </div>


        {{-- Daftar Program --}}
        <div class="row g-4">

            @forelse($programs as $program)

                <div class="col-md-6">

                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">

                        {{-- Gambar --}}
                        @if($program->gambar)

                            <img
                                src="{{ asset('storage/'.$program->gambar) }}"
                                class="card-img-top"
                                style="height:250px; object-fit:cover;"
                                alt="{{ $program->nama_program }}">

                        @else

                            <div
                                class="bg-light d-flex align-items-center justify-content-center"
                                style="height:250px;">

                                <div class="text-center">

                                    <i class="bi bi-image text-secondary"
                                       style="font-size:3rem;">
                                    </i>

                                    <p class="text-muted mb-0 mt-2">

                                        Gambar belum tersedia

                                    </p>

                                </div>

                            </div>

                        @endif


                        {{-- Isi Card --}}
                        <div class="card-body p-4 d-flex flex-column">

                            {{-- Nama Program --}}
                            <h3 class="fw-bold mb-3">

                                Program {{ $program->nama_program }}

                            </h3>


                            {{-- Deskripsi --}}
                            <p class="text-secondary mb-4">

                                {{ $program->deskripsi }}

                            </p>


                            {{-- Tombol Detail --}}
                            <div class="mt-auto">

                                @if($program->nama_program == 'Paket B')

                                    <a href="{{ route('program.paket-b') }}"
                                       class="btn btn-primary rounded-3 px-4">

                                        Lihat Detail

                                        <i class="bi bi-arrow-right ms-1"></i>

                                    </a>

                                @elseif($program->nama_program == 'Paket C')

                                    <a href="{{ route('program.paket-c') }}"
                                       class="btn btn-success rounded-3 px-4">

                                        Lihat Detail

                                        <i class="bi bi-arrow-right ms-1"></i>

                                    </a>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-warning text-center rounded-4">

                        <i class="bi bi-exclamation-circle me-2"></i>

                        Belum ada data program.

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection
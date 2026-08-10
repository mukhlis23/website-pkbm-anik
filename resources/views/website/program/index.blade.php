@extends('layouts.website')

@section('content')


<!-- Hero -->
<section class="py-5 border-bottom">
    <div class="container">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('beranda') }}">
                        Beranda
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    Program
                </li>
            </ol>
        </nav>

        <div class="text-center">
            <h1 class="fw-bold mb-3">
                Program Pendidikan
            </h1>

            <p class="text-secondary">

                PKBM ANIK menyediakan program pendidikan kesetaraan
                untuk membantu masyarakat memperoleh layanan pendidikan
                yang berkualitas.

            </p>
        </div>
    </div>
</section>

<!-- Daftar Program -->
<section class="py-5">
<div class="container">
<div class="row">

@forelse($programs as $program)

<div class="col-md-6 mb-4">

<div class="card h-100 shadow-sm border-0">

    @if($program->gambar)

    <img 
        src="{{ asset('storage/'.$program->gambar) }}"
        class="card-img-top"
        style="height:250px; object-fit:cover;"
        alt="{{ $program->nama_program }}">

    @else

    <div class="bg-light py-5 text-center">
        <p class="text-muted mb-0">
            Belum ada gambar
        </p>
    </div>
    @endif

    <div class="card-body text-center">
        <h3 class="fw-bold">
            Program {{ $program->nama_program }}

        </h3>

        <p class="text-secondary">
            {{ $program->deskripsi }}

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
    Belum ada data program.

</div>
</div>

@endforelse

</div>
</div>
</section>
@endsectiosn
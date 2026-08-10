@extends('layouts.website')

@section('content')

<!-- Hero -->
<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <h1 class="fw-bold">
            Hubungi Kami
        </h1>

        <p class="mb-0">
            Silakan hubungi PKBM ANIK apabila membutuhkan informasi lebih lanjut.
        </p>
    </div>
</section>

<!-- Kontak -->
<section class="py-5">
    <div class="container">

        @if($kontak)

        <div class="row g-5 align-items-start">
            <!-- Informasi Kontak -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">

                        <h3 class="fw-bold mb-4">

                            Informasi Kontak

                        </h3>

                        <div class="mb-4">

                            <h5>
                                <i class="bi bi-geo-alt-fill text-danger"></i>
                                Alamat
                            </h5>

                            <p class="text-secondary">

                                {{ $kontak->alamat }}

                            </p>

                        </div>

                        <div class="mb-4">

                            <h5>
                                <i class="bi bi-envelope-fill text-primary"></i>
                                Email
                            </h5>

                            <p class="text-secondary">

                                {{ $kontak->email }}

                            </p>
                        </div>

                        <div class="mb-4">

                            <h5>
                                <i class="bi bi-telephone-fill text-success"></i>
                                Telepon / WhatsApp
                            </h5>

                            <p class="text-secondary">

                                {{ $kontak->telepon }}

                            </p>
                        </div>

                        <div class="mb-4">
                            <h5>
                                🕒 Jam Operasional
                            </h5>
                            
                            <p class="text-muted mb-0">
                                 {{ $kontak->jam_operasional }}
                            </p>
                        </div>

                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$kontak->telepon) }}"
                           target="_blank"
                           class="btn btn-success">

                            <i class="bi bi-whatsapp"></i>

                            Chat WhatsApp

                        </a>
                    </div>
                </div>
            </div>

            <!-- Google Maps -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="fw-bold mb-4">

                            Lokasi PKBM ANIK

                        </h3>

                        @if($kontak->maps)

                            {!! $kontak->maps !!}

                        @else

                            <div class="alert alert-warning">

                                Google Maps belum tersedia.

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @else

        <div class="alert alert-warning text-center">

            Data kontak belum tersedia.

        </div>

        @endif

    </div>

</section>

@endsection
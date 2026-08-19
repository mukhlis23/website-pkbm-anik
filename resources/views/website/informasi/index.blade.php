@extends('layouts.website')

@section('content')

<div class="container py-4">

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
                Informasi
                @if(isset($kategori) && $kategori)
                    - {{ $kategori }}
                @endif
            </li>

        </ol>

    </nav>

    <div class="row g-4">

        {{-- SIDEBAR Kategori--}}
        <div class="col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                <div class="card-header bg-primary text-white fw-bold py-3">
                    <i class="bi bi-grid me-2"></i>
                    Kategori Informasi
                </div>

                <div class="list-group list-group-flush">
                    {{-- Semua Informasi --}}
                    <a href="{{ url('/informasi') }}"
                       class="list-group-item list-group-item-action py-3
                       {{ !isset($kategori) || !$kategori ? 'active' : '' }}">

                        <i class="bi bi-collection me-2"></i>
                        Semua Informasi
                    </a>

                    {{-- Pengumuman --}}
                    <a href="{{ route('informasi.kategori','Pengumuman') }}"
                       class="list-group-item list-group-item-action py-3
                       {{ isset($kategori) && $kategori == 'Pengumuman' ? 'active' : '' }}">

                        <i class="bi bi-megaphone me-2"></i>
                        Pengumuman

                    </a>


                    {{-- Kegiatan --}}
                    <a href="{{ route('informasi.kategori','Kegiatan') }}"
                       class="list-group-item list-group-item-action py-3
                       {{ isset($kategori) && $kategori == 'Kegiatan' ? 'active' : '' }}">

                        <i class="bi bi-calendar-event me-2"></i>
                        Kegiatan

                    </a>


                    {{-- Berita --}}
                    <a href="{{ route('informasi.kategori','Berita') }}"
                       class="list-group-item list-group-item-action py-3
                       {{ isset($kategori) && $kategori == 'Berita' ? 'active' : '' }}">

                        <i class="bi bi-newspaper me-2"></i>
                        Berita

                    </a>

                </div>

            </div>

        </div>


        {{-- ISI INFORMASI--}}
        <div class="col-lg-9">

            {{-- Judul halaman --}}
            <div class="mb-4">
                <div class="row align-items-center g-3">

            {{-- Judul --}}
            <div class="col-lg-7">

            <h1 class="fw-bold mb-2">
                @if(isset($kategori) && $kategori)
                     {{ $kategori }}
                @else
                    Informasi PKBM ANIK
                @endif
            </h1>
            <p class="text-secondary mb-0">
                Temukan informasi, pengumuman, kegiatan,
                dan berita terbaru dari PKBM ANIK.
            </p>
        </div>
            {{-- Search --}}
            <div class="col-lg-5">
            <form
                action="{{ isset($kategori) && $kategori
                    ? route('informasi.kategori', $kategori)
                    : url('/informasi') }}"
                method="GET"
            >
                <div class="input-group">
                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari informasi..."
                        value="{{ request('search') }}"
                    >
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-search me-1"></i>
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


            {{-- Garis --}}
            <hr class="mb-4">


            {{-- DATA INFORMASI--}}

            @if($informasis->count() > 0)

                <div class="row g-4">

                    @foreach($informasis as $informasi)

                        <div class="col-md-6">

                            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                                {{-- Gambar --}}
                                @if($informasi->gambar)

                                    <img
                                        src="{{ asset('storage/informasi/'.$informasi->gambar) }}"
                                        class="card-img-top"
                                        style="height: 210px; object-fit: cover;"
                                        alt="{{ $informasi->judul }}"
                                    >

                                @else

                                    <div
                                        class="d-flex align-items-center justify-content-center bg-light"
                                        style="height:210px;"
                                    >

                                        <i class="bi bi-image text-secondary"
                                           style="font-size: 3rem;">
                                        </i>

                                    </div>

                                @endif


                                {{-- Isi Card --}}
                                <div class="card-body p-4 d-flex flex-column">

                                    {{-- Kategori & tanggal --}}
                                    <div class="mb-2">

                                        @if($informasi->kategori == 'Pengumuman')

                                            <span class="badge bg-success-subtle text-success">
                                                <i class="bi bi-megaphone me-1"></i>
                                                Pengumuman
                                            </span>

                                        @elseif($informasi->kategori == 'Kegiatan')

                                            <span class="badge bg-warning-subtle text-dark">
                                                <i class="bi bi-calendar-event me-1"></i>
                                                Kegiatan
                                            </span>

                                        @else

                                            <span class="badge bg-primary-subtle text-primary">
                                                <i class="bi bi-newspaper me-1"></i>
                                                Berita
                                            </span>

                                        @endif

                                        <small class="text-secondary ms-2">

                                            <i class="bi bi-calendar3 me-1"></i>

                                            {{ \Carbon\Carbon::parse($informasi->tanggal)->format('d M Y') }}

                                        </small>

                                    </div>


                                    {{-- Judul --}}
                                    <h4 class="fw-bold mb-3">

                                        {{ $informasi->judul }}

                                    </h4>


                                    {{-- Cuplikan --}}
                                    <p class="text-secondary mb-4">

                                        {{ Str::limit(strip_tags($informasi->isi), 120) }}

                                    </p>


                                    {{-- Tombol --}}
                                    <div class="mt-auto">

                                        <a
                                            href="{{ route('informasi.detail', $informasi->id) }}"
                                            class="btn btn-primary rounded-3 px-3"
                                        >

                                            Baca Selengkapnya
                                            <i class="bi bi-arrow-right ms-1"></i>

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>


                {{-- PAGINATION--}}

                @if($informasis->hasPages())

                    <div class="pagination-wrapper d-flex justify-content-center mt-4 mb-5">

                        {{ $informasis->links('pagination::bootstrap-5') }}

                    </div>

                @endif


            @else

                {{-- Tidak ada informasi --}}
                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body text-center py-5">

                        <i class="bi bi-newspaper text-secondary"
                           style="font-size: 3.5rem;">
                        </i>

                        <h4 class="fw-bold mt-3">
                            Belum Ada Informasi
                        </h4>

                        <p class="text-secondary mb-0">

                            Belum ada informasi pada kategori ini.

                        </p>

                    </div>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection
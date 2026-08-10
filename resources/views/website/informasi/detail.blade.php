@extends('layouts.website')

@section('content')

<div class="container py-5">

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('beranda') }}"
                   class="text-decoration-none">

                    Beranda

                </a>
            </li>

            <li class="breadcrumb-item">
                <a href="{{ route('informasi') }}"
                   class="text-decoration-none">

                    Informasi

                </a>
            </li>

            <li class="breadcrumb-item active"
                aria-current="page">

                Detail

            </li>
        </ol>
    </nav>


    {{-- Artikel --}}
    <article class="article-detail bg-white rounded-4 shadow-sm overflow-hidden">

        {{-- Gambar Utama --}}
        @if($informasi->gambar)
            <div class="article-cover">
                <img
                    src="{{ asset('storage/informasi/'.$informasi->gambar) }}"
                    alt="{{ $informasi->judul }}"
                    class="img-fluid w-100">
            </div>
        @endif


        {{-- Isi Artikel --}}
        <div class="p-4 p-lg-5">

            {{-- Judul --}}
            <h1 class="fw-bold mb-3">
                {{ $informasi->judul }}

            </h1>


            {{-- Metadata --}}
            <div class="d-flex flex-wrap align-items-center gap-2 mb-4">

                @if($informasi->kategori == 'Berita')
                    <span class="badge bg-primary px-3 py-2">

                        <i class="bi bi-newspaper me-1"></i>

                        Berita

                    </span>

                @elseif($informasi->kategori == 'Pengumuman')
                    <span class="badge bg-success px-3 py-2">

                        <i class="bi bi-megaphone me-1"></i>

                        Pengumuman

                    </span>

                @else

                    <span class="badge bg-warning text-dark px-3 py-2">
                        <i class="bi bi-calendar-event me-1"></i>

                        Kegiatan

                    </span>
                @endif


                <span class="text-muted">
                    <i class="bi bi-calendar3 me-1"></i>

                    {{ \Carbon\Carbon::parse($informasi->tanggal)->translatedFormat('d F Y') }}

                </span>
            </div>


            <hr class="mb-4">


            {{-- Isi Artikel dari Summernote --}}
            <div class="article-content">
                {!! $informasi->isi !!}
            </div>

        </div>
    </article>


    {{-- Tombol Kembali --}}
    <div class="mt-4">
        <a href="{{ route('informasi') }}"
           class="btn btn-outline-primary rounded-pill px-4">
            <i class="bi bi-arrow-left me-1"></i>

            Kembali ke Informasi

        </a>
    </div>

</div>


{{-- Style Artikel --}}
<style>
    .article-detail {
        max-width: 1000px;
        margin: 0 auto;
    }

    /* Gambar utama */

    .article-cover {
        width: 100%;
        max-height: 500px;
        overflow: hidden;
    }

    .article-cover img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        display: block;
    }


    /* Isi artikel */

    .article-content {
        font-size: 17px;
        line-height: 1.9;
        color: #333;
        word-wrap: break-word;
    }


    /* Paragraf */

    .article-content p {
        margin-bottom: 1.3rem;
    }


    /* Heading dalam artikel */

    .article-content h1,
    .article-content h2,
    .article-content h3,
    .article-content h4,
    .article-content h5,
    .article-content h6 {
        font-weight: 700;
        margin-top: 2rem;
        margin-bottom: 1rem;
        line-height: 1.4;
    }


    /* Semua gambar dari Summernote */

    .article-content img {
        max-width: 100%;
        height: auto !important;
        display: block;
        margin: 25px auto;
        border-radius: 12px;
    }


    /* Link */

    .article-content a {
        color: #0d6efd;
        text-decoration: underline;
    }

    /* List */

    .article-content ul,
    .article-content ol {
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }


    .article-content li {
        margin-bottom: .5rem;
    }

    /* Tabel dari Summernote */

    .article-content table {
        width: 100%;
        margin: 25px 0;
        border-collapse: collapse;
    }


    .article-content table th,
    .article-content table td {
        border: 1px solid #dee2e6;
        padding: 10px;
    }


    .article-content table th {
        font-weight: 600;
    }


    /* Garis */

    .article-content hr {
        margin: 2rem 0;
    }


    /* Blockquote */

    .article-content blockquote {
        margin: 25px 0;
        padding: 15px 20px;
        border-left: 4px solid #0d6efd;
        background: #f8f9fa;
        border-radius: 5px;
    }


    /* Mobile */

    @media (max-width: 768px) {

        .article-detail {
            border-radius: 15px;
        }


        .article-cover img {
            height: 280px;
        }


        .article-content {
            font-size: 16px;
            line-height: 1.8;
        }


        .article-content img {
            margin: 20px auto;
            border-radius: 8px;
        }

    }

</style>
@endsection
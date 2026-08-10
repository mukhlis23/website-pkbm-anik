<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold">
            Kelola Profil PKBM ANIK
        </h2>
    </x-slot>

    <div class="container py-4">

        {{-- Tombol Tambah --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h4 class="mb-0 fw-bold">
                Data Profil
            </h4>

            <a href="{{ route('admin.profil.create') }}"
               class="btn btn-primary">

                <i class="bi bi-plus-circle"></i>
                Tambah Profil

            </a>

        </div>

        {{-- Validasi --}}
        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        {{-- Jika belum ada data --}}
        @forelse($profils as $profil)

        <div class="card shadow border-0 rounded-4 mb-4">

            <div class="card-header bg-primary text-white rounded-top-4">

                <h5 class="mb-0">

                    <i class="bi bi-building"></i>

                    {{ $profil->judul }}

                </h5>

            </div>

            <div class="card-body">

                {{-- Deskripsi --}}
                <div class="mb-4">

                    <h6 class="fw-bold">

                        Deskripsi Singkat

                    </h6>

                    <p class="text-muted mb-0">

                        {{ $profil->deskripsi_singkat }}

                    </p>

                </div>

                {{-- Banner --}}
                <div class="mb-4">

                    <h6 class="fw-bold mb-3">

                        Banner Website

                    </h6>

                    <div class="row">

                        @php
                            $banners = is_array($profil->banner)
                                ? $profil->banner
                                : json_decode($profil->banner, true);
                        @endphp

                        @if($banners)

                            @foreach($banners as $banner)

                                <div class="col-md-3 mb-3">

                                    <img src="{{ asset('storage/'.$banner) }}"
                                         class="img-fluid rounded shadow-sm border"
                                         style="height:170px;width:100%;object-fit:cover;">

                                </div>

                            @endforeach

                        @else

                            <div class="col">

                                <div class="alert alert-light border">

                                    Belum ada banner.

                                </div>

                            </div>

                        @endif

                    </div>

                </div>

                {{-- Informasi Akreditasi --}}
                <div class="row mb-4">

                    <div class="col-md-4">

                        <div class="card border-0 bg-light h-100">

                            <div class="card-body text-center">

                                <i class="bi bi-award-fill fs-2 text-primary"></i>

                                <h6 class="mt-2 fw-bold">

                                    Status Akreditasi

                                </h6>

                                <p class="mb-0">

                                    {{ $profil->status_akreditasi ?? '-' }}

                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="card border-0 bg-light h-100">

                            <div class="card-body text-center">

                                <i class="bi bi-file-earmark-text fs-2 text-success"></i>

                                <h6 class="mt-2 fw-bold">

                                    Nomor SK

                                </h6>

                                <p class="mb-0">

                                    {{ $profil->nomor_sk ?? '-' }}

                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="card border-0 bg-light h-100">

                            <div class="card-body text-center">

                                <i class="bi bi-calendar-event fs-2 text-warning"></i>

                                <h6 class="mt-2 fw-bold">

                                    Tahun

                                </h6>

                                <p class="mb-0">

                                    {{ $profil->tahun ?? '-' }}

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Foto --}}
                <h6 class="fw-bold mb-3">

                    Dokumentasi Profil

                </h6>

                <div class="row">

                    @if($profil->foto_profil)

                        <div class="col-md-4 mb-3">

                            <div class="card shadow-sm border-0">

                                <img src="{{ asset('storage/'.$profil->foto_profil) }}"
                                     class="card-img-top"
                                     style="height:220px;object-fit:cover;">

                                <div class="card-footer text-center">

                                    Foto Profil

                                </div>

                            </div>

                        </div>

                    @endif

                    @if($profil->gambar_akreditasi)

                        <div class="col-md-4 mb-3">

                            <div class="card shadow-sm border-0">

                                <img src="{{ asset('storage/'.$profil->gambar_akreditasi) }}"
                                     class="card-img-top"
                                     style="height:220px;object-fit:cover;">

                                <div class="card-footer text-center">

                                    Sertifikat Akreditasi

                                </div>

                            </div>

                        </div>

                    @endif

                    @if($profil->struktur_organisasi)

                        <div class="col-md-4 mb-3">

                            <div class="card shadow-sm border-0">

                                <img src="{{ asset('storage/'.$profil->struktur_organisasi) }}"
                                     class="card-img-top"
                                     style="height:220px;object-fit:contain;background:#fff;">

                                <div class="card-footer text-center">

                                    Struktur Organisasi

                                </div>

                            </div>

                        </div>

                    @endif

                </div>

                {{-- Tombol --}}
                <div class="text-end mt-4">

                    <a href="{{ route('admin.profil.edit',$profil->id) }}"
                       class="btn btn-warning">

                        <i class="bi bi-pencil-square"></i>

                        Edit

                    </a>

                    <form action="{{ route('admin.profil.destroy',$profil->id) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirmDelete(event)">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger">

                            <i class="bi bi-trash"></i>

                            Hapus

                        </button>

                    </form>

                </div>

            </div>

        </div>

        @empty

            <div class="card shadow border-0 rounded-4">

                <div class="card-body text-center py-5">

                    <i class="bi bi-folder-x display-4 text-secondary"></i>

                    <h4 class="mt-3">

                        Belum ada data Profil

                    </h4>

                    <p class="text-muted">

                        Silakan tambahkan profil PKBM terlebih dahulu.

                    </p>

                    <a href="{{ route('admin.profil.create') }}"
                       class="btn btn-primary">

                        <i class="bi bi-plus-circle"></i>

                        Tambah Profil

                    </a>

                </div>

            </div>

        @endforelse

    </div>

    <script>

        function confirmDelete(event){

            event.preventDefault();

            Swal.fire({

                title:'Hapus Profil?',

                text:'Data profil akan dihapus permanen.',

                icon:'warning',

                showCancelButton:true,

                confirmButtonText:'Ya, Hapus',

                cancelButtonText:'Batal'

            }).then((result)=>{

                if(result.isConfirmed){

                    event.target.submit();

                }

            });

        }

    </script>

</x-app-layout>
<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data PPDB PKBM ANIK
        </h2>
    </x-slot>

    <div class="container py-4">

        @if($ppdb)

            <div class="card shadow">

                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">
                        <i class="bi bi-mortarboard-fill me-2"></i>
                        Informasi PPDB
                    </h5>

                    @if($ppdb->status=='Buka')

                        <span class="badge bg-success">
                            PPDB Dibuka
                        </span>

                    @else

                        <span class="badge bg-danger">
                            PPDB Ditutup
                        </span>

                    @endif

                </div>

                <div class="card-body">

                    <table class="table table-bordered align-middle">

                        <tr>
                            <th width="250">
                                Judul PPDB
                            </th>

                            <td>
                                {{ $ppdb->judul }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Tahun Ajaran
                            </th>

                            <td>
                                {{ $ppdb->tahun_ajaran }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Status PPDB
                            </th>

                            <td>

                                @if($ppdb->status=='Buka')

                                    <span class="badge bg-success">
                                        PPDB Dibuka
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        PPDB Ditutup
                                    </span>

                                @endif

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Google Form
                            </th>

                            <td>

                                @if($ppdb->link_form)

                                    <a href="{{ $ppdb->link_form }}"
                                       target="_blank">

                                        {{ $ppdb->link_form }}

                                    </a>

                                @else

                                    <span class="text-danger">

                                        Belum diisi

                                    </span>

                                @endif

                            </td>

                        </tr>

                        <tr>

                            <th>
                                WhatsApp Admin
                            </th>

                            <td>

                                {{ $ppdb->whatsapp }}

                            </td>

                        </tr>

                    </table>

                    @if($ppdb->banner)

                        <hr>

                        <h5 class="fw-bold mb-3">

                            <i class="bi bi-image-fill me-2"></i>

                            Banner PPDB

                        </h5>

                        <div class="text-center">

                            <img src="{{ asset('storage/'.$ppdb->banner) }}"
                                 class="img-fluid rounded shadow border"
                                 style="max-height:350px;">

                        </div>

                    @endif

                    <hr>

                    <div class="mb-4">

                        <h5 class="fw-bold">
                            Deskripsi
                        </h5>

                        <p class="mb-0">
                            {!! nl2br(e($ppdb->deskripsi)) !!}
                        </p>

                    </div>

                    <div class="mb-4">

                        <h5 class="fw-bold">
                            Persyaratan
                        </h5>

                        <p class="mb-0">
                            {!! nl2br(e($ppdb->persyaratan)) !!}
                        </p>

                    </div>

                    <div class="mb-4">

                        <h5 class="fw-bold">
                            Alur Pendaftaran
                        </h5>

                        <p class="mb-0">
                            {!! nl2br(e($ppdb->alur)) !!}
                        </p>

                    </div>

                    <div>

                        <h5 class="fw-bold">
                            Jadwal PPDB
                        </h5>

                        <p class="mb-0">
                            {!! nl2br(e($ppdb->jadwal)) !!}
                        </p>

                    </div>

                    <div class="text-end mt-4">

                        <a href="{{ route('admin.ppdb.edit',$ppdb->id) }}"
                           class="btn btn-warning">

                            <i class="bi bi-pencil-square"></i>

                            Edit PPDB

                        </a>

                    </div>

                </div>

            </div>

        @else

            <div class="card shadow">

                <div class="card-body text-center py-5">

                    <i class="bi bi-mortarboard display-3 text-secondary"></i>

                    <h4 class="mt-3">

                        Data PPDB Belum Tersedia

                    </h4>

                    <p class="text-muted">

                        Silakan tambahkan informasi PPDB terlebih dahulu.

                    </p>

                    <a href="{{ route('admin.ppdb.create') }}"
                       class="btn btn-primary">

                        <i class="bi bi-plus-circle"></i>

                        Tambah PPDB

                    </a>

                </div>

            </div>

        @endif

    </div>

</x-app-layout>
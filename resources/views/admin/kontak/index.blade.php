<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Kontak PKBM ANIK
        </h2>
    </x-slot>

    <div class="container py-4">

        @if($kontak)

            <div class="card shadow">

                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">
                        <i class="bi bi-telephone-fill me-2"></i>
                        Informasi Kontak
                    </h5>

                </div>

                <div class="card-body">

                    <table class="table table-bordered align-middle">

                        <tr>
                            <th width="230">
                                <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                                Alamat
                            </th>
                            <td>
                                {{ $kontak->alamat }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                <i class="bi bi-envelope-fill text-primary me-2"></i>
                                Email
                            </th>
                            <td>
                                {{ $kontak->email }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                <i class="bi bi-telephone-fill text-success me-2"></i>
                                Telepon / WhatsApp
                            </th>
                            <td>
                                {{ $kontak->telepon }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                <i class="bi bi-clock-fill text-warning me-2"></i>
                                Jam Operasional
                            </th>
                            <td>
                                {{ $kontak->jam_operasional }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                <i class="bi bi-map-fill text-info me-2"></i>
                                Google Maps
                            </th>

                            <td>

                                @if($kontak->maps)

                                    <span class="badge bg-success">
                                        Sudah Ditambahkan
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Belum Ditambahkan
                                    </span>

                                @endif

                            </td>

                        </tr>

                    </table>

                    @if($kontak->maps)

                        <hr>

                        <h5 class="fw-bold mb-3">

                            <i class="bi bi-map"></i>

                            Preview Google Maps

                        </h5>

                        <div class="ratio ratio-16x9 rounded overflow-hidden border shadow-sm">

                            {!! $kontak->maps !!}

                        </div>

                    @endif

                    <div class="text-end mt-4">

                        <a href="{{ route('admin.kontak.edit',$kontak->id) }}"
                           class="btn btn-warning">

                            <i class="bi bi-pencil-square"></i>

                            Edit Kontak

                        </a>

                    </div>

                </div>

            </div>

        @else

            <div class="card shadow">

                <div class="card-body text-center py-5">

                    <i class="bi bi-telephone-x display-3 text-secondary"></i>

                    <h4 class="mt-3">
                        Data Kontak Belum Tersedia
                    </h4>

                    <p class="text-muted">
                        Silakan tambahkan informasi kontak PKBM ANIK terlebih dahulu.
                    </p>

                    <a href="{{ route('admin.kontak.create') }}"
                       class="btn btn-primary">

                        <i class="bi bi-plus-circle"></i>

                        Tambah Kontak

                    </a>

                </div>

            </div>

        @endif

    </div>

</x-app-layout>
<x-app-layout>

    <x-slot name="header">
    <h2 class="fw-bold">
        Kelola Galeri PKBM ANIK
    </h2>
</x-slot>

<div class="container py-4">

    {{-- Judul --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="fw-bold mb-0">
            Data Album Galeri
        </h4>

        <a href="{{ route('admin.galeri.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle me-1"></i>

            Tambah Album

        </a>

    </div>


    {{-- Card --}}
    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-primary text-white rounded-top-4">

            <h5 class="mb-0">

                <i class="bi bi-images me-2"></i>

                Daftar Album Galeri PKBM ANIK

            </h5>

        </div>


        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="70">
                                No
                            </th>

                            <th width="190">
                                Foto
                            </th>

                            <th>
                                Judul Album
                            </th>

                            <th width="150">
                                Kategori
                            </th>

                            <th width="170">
                                Tanggal Kegiatan
                            </th>

                            <th width="220" class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($galeris as $galeri)

                            <tr>

                                {{-- No --}}
                                <td>

                                    {{ $loop->iteration }}

                                </td>


                                {{-- Foto Album --}}
                                <td>

                                    @if($galeri->fotos->count() > 0)

                                        <div class="position-relative d-inline-block">

                                            <img
                                                src="{{ asset('storage/galeri/'.$galeri->fotos->first()->foto) }}"
                                                class="rounded shadow-sm border"
                                                style="width:150px;height:95px;object-fit:cover;"
                                                alt="{{ $galeri->judul_foto }}">

                                            {{-- Jumlah Foto --}}
                                            <span class="position-absolute top-0 end-0 badge bg-dark m-1">

                                                <i class="bi bi-images me-1"></i>

                                                {{ $galeri->fotos->count() }}

                                            </span>

                                        </div>

                                    @else

                                        <div
                                            class="bg-light border rounded d-flex align-items-center justify-content-center"
                                            style="width:150px;height:95px;">

                                            <span class="text-muted small">

                                                Tidak ada foto

                                            </span>

                                        </div>

                                    @endif

                                </td>


                                {{-- Judul Album --}}
                                <td>

                                    <strong class="d-block">

                                        {{ $galeri->judul_foto }}

                                    </strong>

                                    <small class="text-muted">

                                        {{ $galeri->fotos->count() }}
                                        foto dalam album

                                    </small>

                                </td>


                                {{-- Kategori --}}
                                <td>

                                    <span class="badge bg-primary">

                                        {{ $galeri->kategori }}

                                    </span>

                                </td>


                                {{-- Tanggal --}}
                                <td>

                                    {{ \Carbon\Carbon::parse($galeri->tanggal_upload)->translatedFormat('d F Y') }}

                                </td>


                                {{-- Aksi --}}
                                <td class="text-center">

                                    {{-- Lihat Album --}}
                                    <a
                                        href="{{ route('admin.galeri.show', $galeri->id) }}"
                                        class="btn btn-info btn-sm text-white">

                                        <i class="bi bi-images me-1"></i>

                                        Lihat Album

                                    </a>


                                    {{-- Edit --}}
                                    <a
                                        href="{{ route('admin.galeri.edit', $galeri->id) }}"
                                        class="btn btn-warning btn-sm">

                                        <i class="bi bi-pencil-square"></i>

                                        Edit

                                    </a>


                                    {{-- Hapus --}}
                                    <form
                                        action="{{ route('admin.galeri.destroy', $galeri->id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus album {{ $galeri->judul_foto }} beserta seluruh fotonya?')">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm">

                                            <i class="bi bi-trash"></i>

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6">

                                    <div class="text-center py-5">

                                        <i class="bi bi-images display-4 text-secondary"></i>

                                        <h5 class="mt-3">

                                            Belum ada Album Galeri

                                        </h5>

                                        <p class="text-muted">

                                            Silakan tambahkan album kegiatan terlebih dahulu.

                                        </p>

                                        <a
                                            href="{{ route('admin.galeri.create') }}"
                                            class="btn btn-primary">

                                            <i class="bi bi-plus-circle me-1"></i>

                                            Tambah Album

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</x-app-layout>
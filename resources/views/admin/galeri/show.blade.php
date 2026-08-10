<x-app-layout>
    <div class="container py-4">

    {{-- Judul Halaman --}}
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Detail Album Galeri
        </h2>

        <p class="text-muted mb-0">
            Kelola foto dalam album galeri PKBM ANIK
        </p>

    </div>


    {{-- Pesan sukses --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Informasi Album --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body p-4">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <span class="badge bg-primary mb-2">
                        {{ $galeri->kategori }}
                    </span>

                    <h3 class="fw-bold mb-2">
                        {{ $galeri->judul_foto }}
                    </h3>

                    <p class="text-secondary mb-2">
                        {{ $galeri->keterangan }}
                    </p>

                    <small class="text-muted">

                        <i class="bi bi-calendar-event me-1"></i>

                        {{ \Carbon\Carbon::parse($galeri->tanggal_upload)->translatedFormat('d F Y') }}

                    </small>

                </div>


                <div class="col-md-4 text-md-end mt-3 mt-md-0">

                    <div class="fs-2 fw-bold text-primary">

                        {{ $galeri->fotos->count() }}

                    </div>

                    <div class="text-muted">

                        Foto dalam album

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Daftar Foto --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-primary text-white rounded-top-4">

            <h5 class="mb-0">

                <i class="bi bi-images me-2"></i>

                Foto Album

            </h5>

        </div>


        <div class="card-body p-4">

            @if($galeri->fotos->count())

                <div class="row g-4">

                    @foreach($galeri->fotos as $foto)

                        <div class="col-lg-3 col-md-4 col-sm-6">

                            <div class="card border-0 shadow-sm h-100">

                                {{-- Foto --}}
                                <img
                                    src="{{ asset('storage/galeri/' . $foto->foto) }}"
                                    class="card-img-top"
                                    style="height:200px; object-fit:cover;"
                                    alt="{{ $galeri->judul_foto }}">


                                {{-- Tombol Hapus --}}
                                <div class="card-body text-center">

                                    <form
                                        action="{{ route('admin.galeri.foto.destroy', $foto->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm">

                                            <i class="bi bi-trash me-1"></i>

                                            Hapus Foto

                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="text-center py-5">

                    <i class="bi bi-images display-4 text-secondary"></i>

                    <h5 class="mt-3">
                        Belum Ada Foto
                    </h5>

                    <p class="text-muted">
                        Album ini belum memiliki foto.
                    </p>

                    <a href="{{ route('admin.galeri.edit', $galeri->id) }}"
                       class="btn btn-primary">

                        <i class="bi bi-plus-circle me-1"></i>

                        Tambahkan Foto

                    </a>

                </div>

            @endif

        </div>

    </div>


    <!-- Tombol -->
    <div class="text-center mt-4 mb-3">

        <a href="{{ route('admin.galeri.index') }}"
           class="btn btn-secondary px-4">

            <i class="bi bi-arrow-left me-2"></i>

            Kembali

        </a>

    </div>


</div>

</x-app-layout>
<x-app-layout>

    <x-slot name="header">
    <h2 class="fw-bold">
        Edit Album Galeri
    </h2>
</x-slot>

<div class="container py-4">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-primary text-white rounded-top-4">

            <h5 class="mb-0">

                <i class="bi bi-pencil-square me-2"></i>

                Edit Album Galeri

            </h5>

        </div>


        <div class="card-body p-4">

            <form action="{{ route('admin.galeri.update', $galeri->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')


                {{-- Judul Album --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Judul Album
                    </label>

                    <input
                        type="text"
                        name="judul_foto"
                        class="form-control"
                        value="{{ old('judul_foto', $galeri->judul_foto) }}"
                        placeholder="Contoh: PRAMUKA 2025"
                        required>

                    @error('judul_foto')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Kategori --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Kategori
                    </label>

                    <select
                        name="kategori"
                        class="form-select"
                        required>

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        <option value="Kegiatan"
                            {{ old('kategori', $galeri->kategori) == 'Kegiatan' ? 'selected' : '' }}>
                            Kegiatan
                        </option>

                        <option value="Pembelajaran"
                            {{ old('kategori', $galeri->kategori) == 'Pembelajaran' ? 'selected' : '' }}>
                            Pembelajaran
                        </option>

                        <option value="Lainnya"
                            {{ old('kategori', $galeri->kategori) == 'Lainnya' ? 'selected' : '' }}>
                            Lainnya
                        </option>

                    </select>

                    @error('kategori')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Keterangan --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Keterangan Album
                    </label>

                    <textarea
                        name="keterangan"
                        rows="5"
                        class="form-control"
                        placeholder="Contoh: Dokumentasi kegiatan Pramuka PKBM ANIK tahun 2025."
                        required>{{ old('keterangan', $galeri->keterangan) }}</textarea>

                    @error('keterangan')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Foto yang sudah ada --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold d-block">
                        Foto dalam Album
                    </label>

                    @if($galeri->fotos->count() > 0)

                        <div class="row g-3">

                            @foreach($galeri->fotos as $foto)

                                <div class="col-md-4 col-lg-3">

                                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                                        <img
                                            src="{{ asset('storage/galeri/'.$foto->foto) }}"
                                            alt="{{ $galeri->judul_foto }}"
                                            class="w-100"
                                            style="height:160px; object-fit:cover;">

                                        <div class="card-body p-2 text-center">

                                            <small class="text-muted">
                                                Foto {{ $loop->iteration }}
                                            </small>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="alert alert-secondary">

                            <i class="bi bi-images me-2"></i>

                            Belum ada foto dalam album ini.

                        </div>

                    @endif

                </div>


                {{-- Tambah Foto --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Tambah Foto
                    </label>

                    <input
                        type="file"
                        name="foto[]"
                        class="form-control"
                        multiple
                        accept=".jpg,.jpeg,.png">

                    <div class="form-text">

                        Anda dapat menambahkan beberapa foto sekaligus.
                        Maksimal 2 MB untuk setiap foto.

                    </div>

                    @error('foto')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                    @error('foto.*')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Tanggal --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Tanggal Kegiatan / Upload
                    </label>

                    <input
                        type="date"
                        name="tanggal_upload"
                        class="form-control"
                        value="{{ old('tanggal_upload', optional($galeri->tanggal_upload)->format('Y-m-d')) }}"
                        required>

                    @error('tanggal_upload')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Tombol --}}
                <div class="d-flex gap-2">

                    <a href="{{ route('admin.galeri.index') }}"
                       class="btn btn-secondary">

                        <i class="bi bi-arrow-left me-1"></i>

                        Kembali

                    </a>

                    <a href="{{ route('admin.galeri.show', $galeri->id) }}"
                       class="btn btn-info text-white">

                        <i class="bi bi-images me-1"></i>

                        Lihat Album

                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-save me-1"></i>

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>
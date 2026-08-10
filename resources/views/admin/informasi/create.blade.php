<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Informasi
        </h2>
    </x-slot>

    <div class="container py-4">

        {{-- Header --}}
        <div class="mb-4">

            <h3 class="fw-bold mb-1">
                Tambah Informasi
            </h3>

            <p class="text-muted mb-0">
                Buat artikel, berita, pengumuman, atau kegiatan PKBM ANIK.
            </p>

        </div>

        {{-- Error --}}
        @if ($errors->any())

            <div class="alert alert-danger">

                <strong>
                    Terdapat kesalahan:
                </strong>

                <ul class="mb-0 mt-2">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- Card Form --}}
        <div class="card shadow border-0 rounded-4">

            <div class="card-body p-4">

                <form action="{{ route('admin.informasi.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf


                    {{-- Judul --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Judul Informasi
                        </label>

                        <input
                            type="text"
                            name="judul"
                            value="{{ old('judul') }}"
                            class="form-control form-control-lg"
                            placeholder="Masukkan judul informasi..."
                            required>

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

                            <option value="Pengumuman"
                                {{ old('kategori') == 'Pengumuman' ? 'selected' : '' }}>
                                Pengumuman
                            </option>

                            <option value="Kegiatan"
                                {{ old('kategori') == 'Kegiatan' ? 'selected' : '' }}>
                                Kegiatan
                            </option>

                            <option value="Berita"
                                {{ old('kategori') == 'Berita' ? 'selected' : '' }}>
                                Berita
                            </option>

                        </select>

                    </div>


                    {{-- Isi Artikel --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Isi Informasi
                        </label>

                        <textarea
                            id="editor"
                            name="isi"
                            required>{{ old('isi') }}</textarea>

                        <div class="form-text mt-2">
                            Anda dapat menambahkan teks, format tulisan,
                            daftar, dan beberapa gambar di dalam artikel.
                        </div>

                    </div>


                    {{-- Gambar Utama --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Gambar Utama
                        </label>

                        <input
                            type="file"
                            name="gambar"
                            class="form-control"
                            accept="image/jpeg,image/png,image/webp">

                        <div class="form-text">
                            Gambar utama akan digunakan sebagai gambar artikel.
                            Maksimal 5 MB.
                        </div>

                    </div>


                    {{-- Tanggal --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Tanggal
                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            value="{{ old('tanggal', date('Y-m-d')) }}"
                            class="form-control"
                            required>

                    </div>


                    {{-- Tombol --}}
                    <div class="d-flex gap-2">

                        <a href="{{ route('admin.informasi.index') }}"
                           class="btn btn-secondary">

                            <i class="bi bi-arrow-left"></i>
                            Kembali

                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary">

                            <i class="bi bi-save"></i>
                            Simpan Informasi

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    {{-- Summernote --}}
    <link
        href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css"
        rel="stylesheet">


    <style>

        .note-editor.note-frame {
            border-radius: 10px;
            overflow: hidden;
        }

        .note-editable {
            min-height: 450px;
            font-size: 16px;
            line-height: 1.8;
        }

        .note-editable img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 20px auto;
            border-radius: 10px;
        }

    </style>


    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- Summernote --}}
    <script
        src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js">
    </script>


    <script>

        $(document).ready(function () {

            $('#editor').summernote({

                placeholder: 'Tulis isi informasi di sini...',

                height: 450,

                lang: 'id-ID',

                toolbar: [

                    ['style', ['style']],

                    ['font', [
                        'bold',
                        'italic',
                        'underline',
                        'clear'
                    ]],

                    ['fontname', ['fontname']],

                    ['fontsize', ['fontsize']],

                    ['color', ['color']],

                    ['para', [
                        'ul',
                        'ol',
                        'paragraph'
                    ]],

                    ['height', ['height']],

                    ['insert', [
                        'picture',
                        'link',
                        'table',
                        'hr'
                    ]],

                    ['view', [
                        'fullscreen',
                        'codeview',
                        'help'
                    ]]

                ],

                callbacks: {

                    onImageUpload: function(files) {

                        for (let i = 0; i < files.length; i++) {

                            uploadImage(files[i]);

                        }

                    }

                }

            });


            function uploadImage(file) {

                let data = new FormData();

                data.append('file', file);

                data.append(
                    '_token',
                    '{{ csrf_token() }}'
                );


                $.ajax({

                    url: "{{ route('admin.informasi.uploadImage') }}",

                    type: 'POST',

                    data: data,

                    contentType: false,

                    processData: false,

                    success: function(response) {

                        $('#editor').summernote(
                            'insertImage',
                            response.url
                        );

                    },

                    error: function(xhr) {

                        alert(
                            'Gagal mengupload gambar. Pastikan ukuran gambar maksimal 5 MB.'
                        );

                    }

                });

            }

        });

    </script>

</x-app-layout>
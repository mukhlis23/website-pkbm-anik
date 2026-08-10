<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit Program PKBM ANIK
    </h2>
</x-slot>


<div class="container py-4">

    {{-- Validasi Error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi Kesalahan!</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <form action="{{ route('admin.program.update',$program->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card shadow">

            {{-- Header Card --}}
            <div class="card-header bg-warning">
                <h4 class="mb-0">
                    Form Edit Program
                </h4>
            </div>
            <div class="card-body">

                {{-- Nama Program --}}
                <div class="mb-3">
                    <label class="form-label">
                        Nama Program
                    </label>
                    <select
                        name="nama_program"
                        class="form-select"
                        required>


                        <option value="Paket B"
                            {{ old('nama_program',$program->nama_program) == 'Paket B' ? 'selected' : '' }}>

                            Paket B

                        </option>


                        <option value="Paket C"
                            {{ old('nama_program',$program->nama_program) == 'Paket C' ? 'selected' : '' }}>

                            Paket C

                        </option>


                    </select>

                </div>


                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label class="form-label">
                        Deskripsi Singkat
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="4"
                        class="form-control">{{ old('deskripsi',$program->deskripsi) }}</textarea>

                </div>

                {{-- Tentang --}}
                <div class="mb-3">

                    <label class="form-label">
                        Tentang Program
                    </label>

                    <textarea
                        name="tentang"
                        rows="6"
                        class="form-control">{{ old('tentang',$program->tentang) }}</textarea>

                </div>

                {{-- Materi --}}
                <div class="mb-3">

                    <label class="form-label">
                        Materi Pembelajaran
                    </label>


                    <textarea
                        name="materi"
                        rows="6"
                        class="form-control">{{ old('materi',$program->materi) }}</textarea>

                </div>

                {{-- Jadwal --}}
                <div class="mb-3">

                    <label class="form-label">
                        Jadwal Belajar
                    </label>

                    <textarea
                        name="jadwal"
                        rows="4"
                        class="form-control">{{ old('jadwal',$program->jadwal) }}</textarea>

                </div>

                {{-- Keunggulan --}}
                <div class="mb-4">

                    <label class="form-label fw-bold">
                        Keunggulan Program
                    </label>

                    <div id="keunggulan-wrapper">
                        @foreach($program->keunggulans as $index => $item)
                            <div class="row mb-3 keunggulan-item">
                                {{-- Pilihan Icon --}}
                                <div class="col-md-4">
                                    <select
                                        name="keunggulan[{{ $index }}][icon]"
                                        class="form-select">


                                        <option value="bi-book-fill"
                                            {{ $item->icon == 'bi-book-fill' ? 'selected' : '' }}>
                                            📚 Pendidikan
                                        </option>


                                        <option value="bi-person-workspace"
                                            {{ $item->icon == 'bi-person-workspace' ? 'selected' : '' }}>
                                            👨‍🏫 Tutor
                                        </option>


                                        <option value="bi-calendar-check-fill"
                                            {{ $item->icon == 'bi-calendar-check-fill' ? 'selected' : '' }}>
                                            📅 Jadwal
                                        </option>


                                        <option value="bi-award-fill"
                                            {{ $item->icon == 'bi-award-fill' ? 'selected' : '' }}>
                                            🏆 Penghargaan
                                        </option>


                                    </select>

                                </div>


                                {{-- Judul Keunggulan --}}
                                <div class="col-md-7">

                                    <input
                                        type="text"
                                        name="keunggulan[{{ $index }}][judul]"
                                        class="form-control"
                                        value="{{ $item->judul }}">

                                </div>


                                {{-- Hapus --}}
                                <div class="col-md-1">
                                    <button
                                        type="button"
                                        class="btn btn-danger hapus-keunggulan">

                                        X

                                    </button>

                                </div>


                            </div>


                        @endforeach


                    </div>

                    <button
                        type="button"
                        id="tambah-keunggulan"
                        class="btn btn-success btn-sm">

                        + Tambah Keunggulan

                    </button>


                </div>
                    {{-- Gambar Saat Ini --}}
                <div class="mb-3">

                    <label class="form-label">
                        Gambar Saat Ini
                    </label>


                    <div class="mt-2">

                        @if($program->gambar)

                            <img
                                src="{{ asset('storage/'.$program->gambar) }}"
                                class="img-thumbnail"
                                style="max-width:300px;">

                        @else

                            <p class="text-muted">
                                Belum ada gambar.
                            </p>

                        @endif

                    </div>

                </div>


                {{-- Ganti Gambar --}}
                <div class="mb-3">

                    <label class="form-label">
                        Ganti Gambar
                    </label>


                    <input
                        type="file"
                        name="gambar"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp">


                    <small class="text-muted">
                        Format JPG, JPEG, PNG, WEBP maksimal 2 MB.
                    </small>


                </div>


            </div>

            {{-- Footer --}}
            <div class="card-footer text-end">


                <a href="{{ route('admin.program.index') }}"
                   class="btn btn-secondary">

                    Kembali

                </a>

                <button
                    type="submit"
                    class="btn btn-warning">

                    Update Program

                </button>


            </div>



        </div>


    </form>


</div>

{{-- Script Tambah Keunggulan --}}
<script>

let index = {{ $program->keunggulans->count() }};



document
.getElementById('tambah-keunggulan')
.addEventListener('click', function(){


    let html = `

        <div class="row mb-3 keunggulan-item">


            <div class="col-md-4">

                <select
                    name="keunggulan[${index}][icon]"
                    class="form-select">


                    <option value="bi-book-fill">
                        📚 Pendidikan
                    </option>


                    <option value="bi-person-workspace">
                        👨‍🏫 Tutor
                    </option>


                    <option value="bi-calendar-check-fill">
                        📅 Jadwal
                    </option>


                    <option value="bi-award-fill">
                        🏆 Penghargaan
                    </option>


                </select>


            </div>



            <div class="col-md-7">

                <input
                    type="text"
                    name="keunggulan[${index}][judul]"
                    class="form-control"
                    placeholder="Judul keunggulan">


            </div>



            <div class="col-md-1">

                <button
                    type="button"
                    class="btn btn-danger hapus-keunggulan">

                    X

                </button>


            </div>


        </div>

    `;

    document
    .getElementById('keunggulan-wrapper')
    .insertAdjacentHTML(
        'beforeend',
        html
    );


    index++;
});


// Hapus Keunggulan

document.addEventListener(
    'click',
    function(event){


        if(
            event.target.classList.contains('hapus-keunggulan')
        ){


            event.target
            .closest('.keunggulan-item')
            .remove();


        }


    }
);


</script>


</x-app-layout>            
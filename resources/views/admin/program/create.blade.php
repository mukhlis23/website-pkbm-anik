<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Program PKBM ANIK
        </h2>

    </x-slot>



    <div class="container py-4">


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




        <form action="{{ route('admin.program.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf



            <div class="card shadow">


                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">
                        Form Tambah Program
                    </h4>

                </div>


                <div class="card-body">

                    <!-- Nama Program -->

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Program
                        </label>


                        <select
                            name="nama_program"
                            class="form-select"
                            required>


                            <option value="">
                                -- Pilih Program --
                            </option>


                            <option value="Paket B">
                                Paket B
                            </option>


                            <option value="Paket C">
                                Paket C
                            </option>
                        </select>
                    </div>


                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label class="form-label">
                            Deskripsi Singkat
                        </label>

                        <textarea
                            name="deskripsi"
                            rows="4"
                            class="form-control">{{ old('deskripsi') }}</textarea>
                    </div>

                    <!-- Tentang -->
                    <div class="mb-3">

                        <label class="form-label">
                            Tentang Program
                        </label>

                        <textarea
                            name="tentang"
                            rows="6"
                            class="form-control">{{ old('tentang') }}</textarea>
                    </div>

                    <!-- Materi -->
                    <div class="mb-3">
                        <label class="form-label">
                            Materi Pembelajaran
                        </label>
                        <textarea
                            name="materi"
                            rows="6"
                            class="form-control">{{ old('materi') }}</textarea>
                    </div>

                    <!-- Jadwal -->
                    <div class="mb-3">

                        <label class="form-label">
                            Jadwal Belajar
                        </label>

                        <textarea
                            name="jadwal"
                            rows="4"
                            class="form-control">{{ old('jadwal') }}</textarea>
                    </div>


                    <!-- KEUNGGULAN -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            Keunggulan Program
                        </label>

                        <div id="keunggulan-wrapper">

                            <div class="row mb-3 keunggulan-item">


                                <!-- PILIH ICON -->
                                <div class="col-md-4">
                                    <select
                                        name="keunggulan[0][icon]"
                                        class="form-select"
                                        onchange="previewIcon(this)">

                                        <option value="bi-book-fill">
                                            📚 Pendidikan
                                        </option>

                                        <option value="bi-person-workspace">
                                            👨‍🏫 Tutor
                                        </option>


                                        <option value="bi-mortarboard-fill">
                                            🎓 Kelulusan
                                        </option>

                                        <option value="bi-award-fill">
                                            🏆 Prestasi
                                        </option>

                                        <option value="bi-calendar-check-fill">
                                            📅 Jadwal
                                        </option>

                                        <option value="bi-building-fill">
                                            🏫 Gedung
                                        </option>

                                        <option value="bi-laptop-fill">
                                            💻 Teknologi
                                        </option>

                                        <option value="bi-book-half">
                                            📖 Buku
                                        </option>

                                        <option value="bi-star-fill">
                                            ⭐ Keunggulan
                                        </option>
                                    </select>
                                    <div class="mt-2">
                                        Preview:
                                        <i class="bi bi-book-fill fs-2 icon-preview"></i>
                                    </div>
                                </div>

                                <!-- JUDUL -->
                                <div class="col-md-7">
                                    <input
                                        type="text"
                                        name="keunggulan[0][judul]"
                                        class="form-control"
                                        placeholder="Judul keunggulan">
                                </div>


                                <!-- HAPUS -->
                                <div class="col-md-1">
                                    <button
                                        type="button"
                                        class="btn btn-danger remove-keunggulan">
                                        X
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button
                            type="button"
                            class="btn btn-success btn-sm"
                            id="tambah-keunggulan">
                            + Tambah Keunggulan
                        </button>
                    </div>


                    <!-- GAMBAR -->
                    <div class="mb-3">
                        <label class="form-label">
                            Gambar Program
                        </label>
                        <input
                            type="file"
                            name="gambar"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp">
                        <small class="text-muted">
                            Format JPG, JPEG, PNG, WEBP maksimal 2 MB
                        </small>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('admin.program.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>
                    <button
                        type="submit"
                        class="btn btn-primary">
                        Simpan Program
                    </button>
                </div>
            </div>
        </form>
    </div>

<script>

let indexKeunggulan = 1;

// tambah keunggulan

document
.getElementById('tambah-keunggulan')
.addEventListener('click', function(){

    let wrapper =
        document.getElementById(
            'keunggulan-wrapper'
        );

    let html = `

    <div class="row mb-3 keunggulan-item">
        <div class="col-md-4">
            <select
                name="keunggulan[${indexKeunggulan}][icon]"
                class="form-select"
                onchange="previewIcon(this)">

                <option value="bi-book-fill">
                    📚 Pendidikan
                </option>
                <option value="bi-person-workspace">
                    👨‍🏫 Tutor
                </option>
                <option value="bi-mortarboard-fill">
                    🎓 Kelulusan
                </option>
                <option value="bi-award-fill">
                    🏆 Prestasi
                </option>
                <option value="bi-calendar-check-fill">
                    📅 Jadwal
                </option>
                <option value="bi-building-fill">
                    🏫 Gedung
                </option>
                <option value="bi-laptop-fill">
                    💻 Teknologi
                </option>
                <option value="bi-book-half">
                    📖 Buku
                </option>
                <option value="bi-star-fill">
                    ⭐ Keunggulan
                </option>
            </select>
            <div class="mt-2">
                Preview:
                <i class="bi bi-book-fill fs-2 icon-preview"></i>
            </div>
        </div>
        <div class="col-md-7">
            <input
                type="text"
                name="keunggulan[${indexKeunggulan}][judul]"
                class="form-control"
                placeholder="Judul keunggulan">
        </div>
        <div class="col-md-1">
            <button
                type="button"
                class="btn btn-danger remove-keunggulan">
                X
            </button>
        </div>
    </div>

    `;

    wrapper.insertAdjacentHTML(
        'beforeend',
        html
    );
    indexKeunggulan++;

});


// preview icon
function previewIcon(select)
{
    let preview =
        select
        .closest('.keunggulan-item')
        .querySelector('.icon-preview');

    preview.className =
        "bi "
        + select.value
        + " fs-2 icon-preview";
}


// hapus keunggulan
document.addEventListener(
'click',
function(e){

    if(
        e.target.classList.contains(
            'remove-keunggulan'
        )
    ){
        e.target
        .closest('.keunggulan-item')
        .remove();
    }
});

</script>


</x-app-layout>
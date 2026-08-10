<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tambah Profil PKBM ANIK
    </h2>
</x-slot>


<div class="container mt-4">

    <div class="card shadow-sm">

        <div class="card-header">
            <h4 class="mb-0">
                Tambah Profil PKBM ANIK
            </h4>
        </div>


        <div class="card-body">


            @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

            @endif



            <form action="{{ route('admin.profil.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                <div class="mb-3">
                    <label class="form-label">
                        Judul Profil
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="{{ old('judul') }}">
                </div>



                <div class="mb-3">
                    <label class="form-label">
                        Deskripsi Singkat
                    </label>

                    <textarea name="deskripsi_singkat"
                              class="form-control"
                              rows="3">{{ old('deskripsi_singkat') }}</textarea>
                </div>



                <div class="mb-3">
                    <label class="form-label">
                        Tentang PKBM
                    </label>

                    <textarea name="tentang"
                              class="form-control"
                              rows="4">{{ old('tentang') }}</textarea>
                </div>



                <div class="mb-3">
                    <label class="form-label">
                        Visi
                    </label>

                    <textarea name="visi"
                              class="form-control"
                              rows="3">{{ old('visi') }}</textarea>
                </div>



                <div class="mb-3">
                    <label class="form-label">
                        Misi
                    </label>

                    <textarea name="misi"
                              class="form-control"
                              rows="4">{{ old('misi') }}</textarea>
                </div>



                <div class="mb-3">
                    <label class="form-label">
                        Tujuan
                    </label>

                    <textarea name="tujuan"
                              class="form-control"
                              rows="4">{{ old('tujuan') }}</textarea>
                </div>



                <div class="mb-3">
                    <label class="form-label">
                        Status Akreditasi
                    </label>

                    <input type="text"
                           name="status_akreditasi"
                           class="form-control"
                           value="{{ old('status_akreditasi') }}">
                </div>



                <div class="mb-3">
                    <label class="form-label">
                        Nomor SK
                    </label>

                    <input type="text"
                           name="nomor_sk"
                           class="form-control"
                           value="{{ old('nomor_sk') }}">
                </div>



                <div class="mb-3">
                    <label class="form-label">
                        Tahun
                    </label>

                    <input type="number"
                           name="tahun"
                           class="form-control"
                           value="{{ old('tahun') }}">
                </div>



                <div class="mb-3">

                    <label class="form-label">
                        Banner Profil
                    </label>

                    <input type="file"
                           name="banner[]"
                           id="bannerInput"
                           class="form-control"
                           multiple
                           accept="image/*">


                    <div class="row mt-3"
                         id="previewBanner">

                    </div>

                </div>



                <div class="mb-3">

                    <label class="form-label">
                        Foto Profil
                    </label>

                    <input type="file"
                           name="foto_profil"
                           class="form-control"
                           accept="image/*">

                </div>



                <div class="mb-3">

                    <label class="form-label">
                        Gambar Akreditasi
                    </label>

                    <input type="file"
                           name="gambar_akreditasi"
                           class="form-control"
                           accept="image/*">

                </div>



                <div class="mb-3">

                    <label class="form-label">
                        Struktur Organisasi
                    </label>

                    <input type="file"
                           name="struktur_organisasi"
                           class="form-control"
                           accept="image/*">

                </div>



                <button type="submit"
                        class="btn btn-primary">

                    Simpan

                </button>


                <a href="{{ route('admin.profil.index') }}"
                   class="btn btn-secondary">

                    Kembali

                </a>


            </form>


        </div>

    </div>

</div>



<script>

document.getElementById('bannerInput')
.addEventListener('change', function(event){

    let preview = document.getElementById('previewBanner');

    preview.innerHTML = "";


    let files = event.target.files;


    for(let i = 0; i < files.length; i++){

        let reader = new FileReader();


        reader.onload = function(e){

            preview.innerHTML += `

            <div class="col-md-4 mb-3">

                <div class="card shadow-sm">

                    <img src="${e.target.result}"
                         class="card-img-top"
                         style="height:180px;object-fit:cover;">


                    <div class="card-body text-center">
                        Banner ${i+1}
                    </div>

                </div>

            </div>

            `;

        };


        reader.readAsDataURL(files[i]);

    }

});

</script>


</x-app-layout>
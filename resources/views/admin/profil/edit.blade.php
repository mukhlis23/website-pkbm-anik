<x-app-layout>

<!-- HEADER EDIT PROFIL -->

<x-slot name="header">

    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit Profil PKBM ANIK
    </h2>

</x-slot>

<!-- CONTAINER UTAMA -->
<div class="container py-4">


<!-- ALERT VALIDASI -->
@if ($errors->any())

<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
    </ul>
</div>

@endif

<!-- FORM EDIT PROFIL -->

<form action="{{ route('admin.profil.update',$profil->id) }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="card shadow">

<!-- CARD HEADER -->

<div class="card-header bg-warning">
    <h4 class="mb-0">
        Edit Profil PKBM ANIK
    </h4>

</div>

<div class="card-body">

<!-- DATA UTAMA PROFIL -->

<div class="mb-3">

    <label class="form-label">
        Judul Profil
    </label>

    <input type="text"
           name="judul"
           class="form-control"
           value="{{ old('judul',$profil->judul) }}">

</div>

<div class="mb-3">

    <label class="form-label">
        Deskripsi Singkat
    </label>

    <textarea name="deskripsi_singkat"
              rows="3"
              class="form-control">{{ old('deskripsi_singkat',$profil->deskripsi_singkat) }}</textarea>

</div>

<div class="mb-3">

    <label class="form-label">
        Tentang PKBM
    </label>

    <textarea name="tentang"
              rows="5"
              class="form-control">{{ old('tentang',$profil->tentang) }}</textarea>

</div>

<!-- END DATA UTAMA PROFIL -->

<!-- DATA AKREDITASI -->

<div class="row mb-3">
    <div class="col-md-4">

        <label class="form-label">
            Status Akreditasi
        </label>

        <input type="text"
               name="status_akreditasi"
               class="form-control"
               value="{{ old('status_akreditasi',$profil->status_akreditasi) }}">

    </div>
    <div class="col-md-4">

        <label class="form-label">
            Nomor SK
        </label>

        <input type="text"
               name="nomor_sk"
               class="form-control"
               value="{{ old('nomor_sk',$profil->nomor_sk) }}">

    </div>

    <div class="col-md-4">

        <label class="form-label">
            Tahun
        </label>

        <input type="number"
               name="tahun"
               class="form-control"
               value="{{ old('tahun',$profil->tahun) }}">

    </div>

</div>
<!-- END DATA AKREDITASI -->
<hr>



<!-- VISI MISI TUJUAN -->
<div class="mb-3">
    <label class="form-label">
        Visi
    </label>

    <textarea name="visi"
              rows="3"
              class="form-control">{{ old('visi',$profil->visi) }}</textarea>

</div>

<div class="mb-3">

    <label class="form-label">
        Misi
    </label>

    <textarea name="misi"
              rows="5"
              class="form-control">{{ old('misi',$profil->misi) }}</textarea>

</div>

<div class="mb-3">

    <label class="form-label">
        Tujuan
    </label>

    <textarea name="tujuan"
              rows="3"
              class="form-control">{{ old('tujuan',$profil->tujuan) }}</textarea>

</div>

<!-- END VISI MISI TUJUAN -->

<hr>

<!-- BANNER PROFIL -->


<div class="mb-4">


    <label class="form-label">
        Ganti Banner Profil
    </label>


    <input type="file"
           name="banner[]"
           id="bannerInput"
           class="form-control"
           multiple
           accept="image/*">



    <!-- PREVIEW BANNER BARU -->

    <div class="row mt-3"
         id="previewBanner">

    </div>


</div>



<!-- END BANNER PROFIL -->
<hr>

<!-- FOTO PENDUKUNG -->
<div class="row">

    <!-- FOTO PROFIL -->
    <div class="col-md-4 mb-3">
        <label class="form-label">
            Foto Profil
        </label>
        @if($profil->foto_profil)

        <img src="{{ asset('storage/'.$profil->foto_profil) }}"
             class="img-fluid rounded shadow mb-3"
             style="height:180px;width:100%;object-fit:cover;">


        @endif

        <input type="file"
               name="foto_profil"
               class="form-control"
               accept="image/*">

    </div>

    <!-- GAMBAR AKREDITASI -->
    <div class="col-md-4 mb-3">
        <label class="form-label">
            Gambar Akreditasi
        </label>
        @if($profil->gambar_akreditasi)
        <img src="{{ asset('storage/'.$profil->gambar_akreditasi) }}"
             class="img-fluid rounded shadow mb-3"
             style="height:180px;width:100%;object-fit:cover;">

        @endif

        <input type="file"
               name="gambar_akreditasi"
               class="form-control"
               accept="image/*">
    </div>

    <!-- STRUKTUR ORGANISASI -->
    <div class="col-md-4 mb-3">
        <label class="form-label">
            Struktur Organisasi
        </label>
        @if($profil->struktur_organisasi)
        <img src="{{ asset('storage/'.$profil->struktur_organisasi) }}"
             class="img-fluid rounded shadow mb-3"
             style="height:180px;width:100%;object-fit:contain;">
        @endif

        <input type="file"
               name="struktur_organisasi"
               class="form-control"
               accept="image/*">
    </div>
</div>
<!-- END FOTO PENDUKUNG -->

<hr>

<!-- TOMBOL AKSI -->
<div class="text-end">
    <a href="{{ route('admin.profil.index') }}"
       class="btn btn-secondary">

        Kembali

    </a>
    <button type="submit"
            class="btn btn-primary">

        Update Profil
    </button>

</div>

<!-- END TOMBOL AKSI -->

</div>

</div>

</form>

</div>

<!-- SCRIPT PREVIEW BANNER -->

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
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm">
                    <img src="${e.target.result}"
                         class="card-img-top"
                         style="height:150px;object-fit:cover;">
                    <div class="card-body text-center">
                        Banner Baru ${i + 1}
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
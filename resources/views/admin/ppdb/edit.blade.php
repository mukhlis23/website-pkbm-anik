<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit PPDB PKBM ANIK
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card shadow-sm">

            <div class="card-header bg-warning text-dark">
                Form Edit PPDB
            </div>

            <div class="card-body">

                <form action="{{ route('admin.ppdb.update', $ppdb->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">
                            Judul PPDB
                        </label>

                        <input
                            type="text"
                            name="judul"
                            value="{{ old('judul', $ppdb->judul) }}"
                            class="form-control @error('judul') is-invalid @enderror"
                            required>

                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Tahun Ajaran
                        </label>

                        <input
                            type="text"
                            name="tahun_ajaran"
                            value="{{ old('tahun_ajaran', $ppdb->tahun_ajaran) }}"
                            class="form-control @error('tahun_ajaran') is-invalid @enderror"
                            required>

                        @error('tahun_ajaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Banner PPDB
                        </label>

                        @if($ppdb->banner)

                            <div class="mb-3">

                                <img
                                    src="{{ asset('storage/'.$ppdb->banner) }}"
                                    class="img-thumbnail"
                                    style="max-width:300px;">

                            </div>

                        @endif

                        <input
                            type="file"
                            name="banner"
                            class="form-control @error('banner') is-invalid @enderror">

                        @error('banner')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Deskripsi
                        </label>

                        <textarea
                            name="deskripsi"
                            rows="4"
                            class="form-control @error('deskripsi') is-invalid @enderror"
                            required>{{ old('deskripsi', $ppdb->deskripsi) }}</textarea>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Persyaratan
                        </label>

                        <textarea
                            name="persyaratan"
                            rows="6"
                            class="form-control @error('persyaratan') is-invalid @enderror"
                            required>{{ old('persyaratan', $ppdb->persyaratan) }}</textarea>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Alur Pendaftaran
                        </label>

                        <textarea
                            name="alur"
                            rows="6"
                            class="form-control @error('alur') is-invalid @enderror"
                            required>{{ old('alur', $ppdb->alur) }}</textarea>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Jadwal PPDB
                        </label>

                        <textarea
                            name="jadwal"
                            rows="5"
                            class="form-control @error('jadwal') is-invalid @enderror"
                            required>{{ old('jadwal', $ppdb->jadwal) }}</textarea>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Link Google Form
                        </label>

                        <input
                            type="url"
                            name="link_form"
                            value="{{ old('link_form', $ppdb->link_form) }}"
                            class="form-control">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            WhatsApp Admin
                        </label>

                        <input
                            type="text"
                            name="whatsapp"
                            value="{{ old('whatsapp', $ppdb->whatsapp) }}"
                            class="form-control">

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Status PPDB
                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="Buka"
                                {{ $ppdb->status == 'Buka' ? 'selected' : '' }}>
                                Buka
                            </option>

                            <option value="Tutup"
                                {{ $ppdb->status == 'Tutup' ? 'selected' : '' }}>
                                Tutup
                            </option>

                        </select>

                    </div>

                    <div class="d-flex justify-content-between">

                        <a href="{{ route('admin.ppdb.index') }}"
                           class="btn btn-secondary">

                            Kembali

                        </a>

                        <button
                            type="submit"
                            class="btn btn-warning">

                            Update PPDB

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
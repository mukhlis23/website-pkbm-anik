<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Album Galeri
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('admin.galeri.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf


                    <!-- Judul Album -->
                    <div class="mb-4">

                        <label class="block font-semibold mb-2">
                            Judul Album
                        </label>

                        <input
                            type="text"
                            name="judul_foto"
                            class="w-full border rounded-lg p-2"
                            value="{{ old('judul_foto') }}"
                            placeholder="Contoh: PRAMUKA 2025"
                            required>

                        @error('judul_foto')
                            <small class="text-red-600">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    <!-- Kategori -->
                    <div class="mb-4">

                        <label class="block font-semibold mb-2">
                            Kategori
                        </label>

                        <select
                            name="kategori"
                            class="w-full border rounded-lg p-2"
                            required>

                            <option value="">
                                -- Pilih Kategori --
                            </option>

                            <option value="Kegiatan"
                                {{ old('kategori') == 'Kegiatan' ? 'selected' : '' }}>
                                Kegiatan
                            </option>

                            <option value="Pembelajaran"
                                {{ old('kategori') == 'Pembelajaran' ? 'selected' : '' }}>
                                Pembelajaran
                            </option>

                            <option value="Lainnya"
                                {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>
                                Lainnya
                            </option>

                        </select>

                        @error('kategori')
                            <small class="text-red-600">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    <!-- Keterangan -->
                    <div class="mb-4">

                        <label class="block font-semibold mb-2">
                            Keterangan Album
                        </label>

                        <textarea
                            name="keterangan"
                            rows="5"
                            class="w-full border rounded-lg p-2"
                            placeholder="Contoh: Dokumentasi kegiatan Pramuka PKBM ANIK tahun 2025."
                            required>{{ old('keterangan') }}</textarea>

                        @error('keterangan')
                            <small class="text-red-600">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    <!-- Upload Banyak Foto -->
                    <div class="mb-4">

                        <label class="block font-semibold mb-2">
                            Upload Foto Album
                        </label>

                        <input
                            type="file"
                            name="foto[]"
                            class="w-full border rounded-lg p-2"
                            multiple
                            accept=".jpg,.jpeg,.png">

                        <small class="text-gray-500">
                            Anda dapat memilih beberapa foto sekaligus.
                            Maksimal 2 MB untuk setiap foto.
                        </small>

                        @error('foto')
                            <small class="text-red-600 block">
                                {{ $message }}
                            </small>
                        @enderror

                        @error('foto.*')
                            <small class="text-red-600 block">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    <!-- Tanggal Upload -->
                    <div class="mb-4">

                        <label class="block font-semibold mb-2">
                            Tanggal Kegiatan / Upload
                        </label>

                        <input
                            type="date"
                            name="tanggal_upload"
                            class="w-full border rounded-lg p-2"
                            value="{{ old('tanggal_upload') }}"
                            required>

                        @error('tanggal_upload')
                            <small class="text-red-600">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    <!-- Tombol -->
                    <div class="flex gap-3">

                        <a href="{{ route('admin.galeri.index') }}"
                           class="bg-gray-500 text-white px-5 py-2 rounded">

                            Kembali

                        </a>

                        <button
                            type="submit"
                            class="bg-blue-600 text-white px-5 py-2 rounded">

                            Simpan Album

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
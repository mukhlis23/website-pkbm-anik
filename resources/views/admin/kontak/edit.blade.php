<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Kontak PKBM ANIK
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card shadow-sm">

            <div class="card-header bg-warning text-dark">
                Form Edit Kontak
            </div>

            <div class="card-body">

                <form action="{{ route('admin.kontak.update', $kontak->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">
                            Alamat
                        </label>

                        <textarea
                            name="alamat"
                            rows="4"
                            class="form-control @error('alamat') is-invalid @enderror"
                            required>{{ old('alamat', $kontak->alamat) }}</textarea>

                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $kontak->email) }}"
                            class="form-control @error('email') is-invalid @enderror"
                            required>

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Telepon / WhatsApp
                        </label>

                        <input
                            type="text"
                            name="telepon"
                            value="{{ old('telepon', $kontak->telepon) }}"
                            class="form-control @error('telepon') is-invalid @enderror"
                            required>

                        @error('telepon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Jam Operasional
                        </label>

                        <input
                            type="text"
                            name="jam_operasional"
                            value="{{ old('jam_operasional', $kontak->jam_operasional) }}"
                            class="form-control @error('jam_operasional') is-invalid @enderror"
                            placeholder="Contoh: Senin - Jumat, 08.00 - 16.00"
                            required>

                        @error('jam_operasional')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Embed Google Maps
                        </label>

                        <textarea
                            name="maps"
                            rows="5"
                            class="form-control">{{ old('maps', $kontak->maps) }}</textarea>

                        <small class="text-muted">
                            Tempelkan kode iframe Google Maps di sini.
                        </small>

                    </div>

                    <div class="d-flex justify-content-between">

                        <a href="{{ route('admin.kontak.index') }}"
                           class="btn btn-secondary">

                            Kembali

                        </a>

                        <button
                            type="submit"
                            class="btn btn-warning">

                            Update

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
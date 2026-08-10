<x-app-layout>

    <div class="container py-4">

        {{-- Judul Halaman --}}
        <div class="mb-4">
            <h2 class="fw-bold">
                Akun Administrator
            </h2>
            <p class="text-muted mb-0">
                Kelola informasi akun administrator Website PKBM ANIK.
            </p>
        </div>

        {{-- Profil --}}
        <div class="card shadow-sm border-0 rounded-4 mb-4">
            <div class="card-body p-4">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- Password --}}
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>

</x-app-layout>
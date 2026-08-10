<x-app-layout>

        {{-- Header Dashboard --}}<div class="card shadow border-0 rounded-4 mb-5 dashboard-header">
            <div class="card-body d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <span class="badge bg-primary px-3 py-2 rounded-pill mb-3">
                        Dashboard Administrator
                    </span>
                    <h2 class="fw-bold mb-2">
                        Dashboard Admin PKBM ANIK
                    </h2>
                    <p class="text-muted mb-0">
                        Selamat datang, <strong>{{ Auth::user()->name }}</strong>. Kelola seluruh informasi Website PKBM ANIK melalui dashboard ini.
                    </p>
                 </div>

        <div class="text-end mt-3 mt-md-0">
            <div class="fw-bold mb-1">
                <i class="bi bi-person-circle"></i>
                {{ Auth::user()->name }}
            </div>
            <small class="text-muted d-block">
                Administrator
            </small>
            <div class="mt-3 mb-3">
                <div class="fw-semibold">
                    <i class="bi bi-calendar-event"></i>
                    {{ now()->translatedFormat('d F Y') }}
                </div>
                <small class="text-muted d-block">
                   {{ now()->translatedFormat('l') }}
                </small>
                <small class="text-primary fw-semibold">
                    <i class="bi bi-clock"></i>
                    {{ now()->format('H.i') }} WIB
                </small>
            </div>
            <a href="{{ url('/') }}" target="_blank"
               class="btn btn-primary btn-sm rounded-pill">
               <i class="bi bi-globe"></i>
               Lihat Website
            </a>
        </div>
    </div>
</div>

{{-- Statistik Website --}}
<div class="mb-5">

    <h4 class="fw-bold mb-1">
        Statistik Website
    </h4>

    <p class="text-muted mb-4">
        Ringkasan data konten Website PKBM ANIK
    </p>

    <div class="row g-4">

        {{-- Program --}}
        <div class="col-lg-4 col-md-6">
            <div class="card stat-card h-100">
                 <div class="card-body text-center">
                    <div class="stat-icon bg-primary-subtle text-primary">
                        <i class="bi bi-journal-bookmark-fill"></i>
                    </div>
                    <h2 class="stat-number text-primary">
                     {{ \App\Models\Program::count() }}
                    </h2>
                    <h6 class="fw-bold mt-2">
                        Total Program
                    </h6>
                    <small class="text-muted">
                        Program Paket B & Paket C
                    </small>
                </div>
            </div>
        </div>

        {{-- Informasi --}}
        <div class="col-lg-4 col-md-6">
            <div class="card stat-card h-100">
                <div class="card-body text-center">
                     <div class="stat-icon bg-success-subtle text-success">
                        <i class="bi bi-megaphone-fill"></i>
                    </div>
                    <h2 class="stat-number text-success">
                     {{ \App\Models\Informasi::count() }}
                    </h2>
                    <h6 class="fw-bold mt-2">
                        Total Informasi
                    </h6>
                    <small class="text-muted">
                        Berita & Pengumuman
                    </small>
                </div>
            </div>
        </div>

        {{-- Galeri --}}
        <div class="col-lg-4 col-md-6">
            <div class="card stat-card h-100">
                <div class="card-body text-center">
                    <div class="stat-icon bg-warning-subtle text-warning">
                        <i class="bi bi-images"></i>
                    </div>
                    <h2 class="stat-number text-warning">
                     {{ \App\Models\Galeri::count() }}
                    </h2>
                    <h6 class="fw-bold mt-2">
                        Total Galeri
                    </h6>
                    <small class="text-muted">
                        Dokumentasi Kegiatan
                    </small>
                </div>
            </div>
        </div>

        {{-- Menu Pengelolaan Website --}}
        <div class="mt-5">
            <h4 class="fw-bold mb-1">
                Menu Pengelolaan Website
            </h4>
            <p class="text-muted mb-4">
                Kelola seluruh konten Website PKBM ANIK
            </p>
        <div class="row g-4">

        {{-- Profil --}}
        <div class="col-lg-4 col-md-6">
            <a href="{{ route('admin.profil.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 h-100 menu-card">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-person-badge-fill display-5 text-primary"></i>
                        <h5 class="fw-bold mt-4 mb-2 text-dark">
                            Profil
                        </h5>
                        <p class="text-muted mb-0">
                            Kelola profil PKBM ANIK
                        </p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Program --}}
        <div class="col-lg-4 col-md-6">
            <a href="{{ route('admin.program.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 h-100 menu-card">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-mortarboard-fill display-5 text-success"></i>
                        <h5 class="fw-bold mt-4 mb-2 text-dark">
                            Program
                        </h5>
                        <p class="text-muted mb-0">
                            Kelola Paket B dan Paket C
                        </p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Informasi --}}
        <div class="col-lg-4 col-md-6">
            <a href="{{ route('admin.informasi.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 h-100 menu-card">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-newspaper display-5 text-warning"></i>
                        <h5 class="fw-bold mt-4 mb-2 text-dark">
                            Informasi
                        </h5>
                        <p class="text-muted mb-0">
                            Berita, kegiatan, pengumuman
                        </p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Galeri --}}
        <div class="col-lg-4 col-md-6">
            <a href="{{ route('admin.galeri.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 h-100 menu-card">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-images display-5 text-danger"></i>
                        <h5 class="fw-bold mt-4 mb-2 text-dark">
                            Galeri
                        </h5>
                        <p class="text-muted mb-0">
                            Foto dokumentasi kegiatan
                        </p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Kontak --}}
        <div class="col-lg-4 col-md-6">
            <a href="{{ route('admin.kontak.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 h-100 menu-card">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-telephone-fill display-5 text-info"></i>
                        <h5 class="fw-bold mt-4 mb-2 text-dark">
                            Kontak
                        </h5>
                        <p class="text-muted mb-0">
                            Informasi kontak PKBM
                        </p>
                    </div>
                </div>
            </a>
        </div>

        {{-- PPDB --}}
        <div class="col-lg-4 col-md-6">
            <a href="{{ route('admin.ppdb.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 h-100 menu-card">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-mortarboard-fill display-5 text-secondary"></i>
                        <h5 class="fw-bold mt-4 mb-2 text-dark">
                            PPDB
                        </h5>
                        <p class="text-muted mb-0">
                            Penerimaan Peserta Didik Baru
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

</x-app-layout>
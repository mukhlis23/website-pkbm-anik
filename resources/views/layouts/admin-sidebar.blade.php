<div class="admin-sidebar">

    {{-- Logo --}}
    <div class="sidebar-header text-center">

        <img src="{{ asset('storage/logo/logo-pkbm-admin.png') }}"
             alt="Logo PKBM ANIK"
             class="sidebar-logo">

        <h5 class="mt-3 mb-1 fw-bold">
            PKBM ANIK
        </h5>

        <small>Dashboard Administrator</small>

    </div>

    <hr class="text-white opacity-50">

    {{-- Menu --}}
    <small class="text-uppercase text-white-50 fw-bold ms-2">
        Menu Utama
    </small>

    <ul class="sidebar-menu mt-3">

        <li>
            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>
        </li>

        <li>
    <a href="{{ route('profile.edit') }}"
       class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">
        <i class="bi bi-person-circle"></i>
        Akun Saya
    </a>
</li>

        <li>
            <a href="{{ route('admin.profil.index') }}"
               class="{{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">
                <i class="bi bi-person-badge-fill"></i>
                Profil
            </a>
        </li>

        <li>
            <a href="{{ route('admin.program.index') }}"
               class="{{ request()->routeIs('admin.program.*') ? 'active' : '' }}">
                <i class="bi bi-mortarboard-fill"></i>
                Program
            </a>
        </li>

        <li>
            <a href="{{ route('admin.informasi.index') }}"
               class="{{ request()->routeIs('admin.informasi.*') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i>
                Informasi
            </a>
        </li>

        <li>
            <a href="{{ route('admin.galeri.index') }}"
               class="{{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                <i class="bi bi-images"></i>
                Galeri
            </a>
        </li>

        <li>
            <a href="{{ route('admin.kontak.index') }}"
               class="{{ request()->routeIs('admin.kontak.*') ? 'active' : '' }}">
                <i class="bi bi-telephone-fill"></i>
                Kontak
            </a>
        </li>

        <li>
            <a href="{{ route('admin.ppdb.index') }}"
               class="{{ request()->routeIs('admin.ppdb.*') ? 'active' : '' }}">
                <i class="bi bi-mortarboard"></i>
                PPDB
            </a>
        </li>

    </ul>

    {{-- Informasi Admin --}}
    <div class="sidebar-footer mt-auto">

        <hr class="text-white opacity-50">

        <div class="d-flex align-items-center mb-3">

            <i class="bi bi-person-circle fs-3 me-2"></i>

            <div>

                <strong>{{ Auth::user()->name }}</strong>

                <br>

                <small>Administrator</small>

            </div>

        </div>

        {{-- Tombol Logout --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-outline-light w-100 rounded-3">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </button>
        </form>

    </div>

</div>
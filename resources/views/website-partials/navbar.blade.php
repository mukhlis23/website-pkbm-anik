<nav class="navbar navbar-expand-lg">
    <div class="container">

        <!-- Logo / Brand -->
        <a class="navbar-brand d-flex align-items-center"
           href="{{ route('beranda') }}">

            <img src="{{ asset('storage/logo/logo-pkbm.png') }}"
                 alt="Logo PKBM ANIK"
                 class="logo-navbar me-3">

            <div class="d-flex flex-column">

                <span class="brand-title">
                    PKBM ANIK
                </span>

                <small class="brand-subtitle">
                    Pusat Kegiatan Belajar Masyarakat
                </small>

            </div>

        </a>


        <!-- Tombol Mobile -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>


        <!-- Menu Navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-lg-center">


                <!-- Beranda -->
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('beranda') }}">

                        Beranda

                    </a>
                </li>


                <!-- Profil -->
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('profil') }}">

                        Profil

                    </a>
                </li>


                <!-- Program -->
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('program') }}">

                        Program

                    </a>
                </li>


                <!-- Informasi -->
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('informasi') }}">

                        Informasi

                    </a>
                </li>


                <!-- Galeri -->
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('galeri') }}">

                        Galeri

                    </a>
                </li>


                <!-- Kontak -->
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('kontak') }}">

                        Kontak

                    </a>
                </li>


                <!-- PPDB -->
                <li class="nav-item ms-lg-3 mt-2 mt-lg-0">

                    <a class="btn btn-ppdb d-flex align-items-center justify-content-center gap-2"
                       href="{{ route('ppdb') }}">

                        <i class="bi bi-pencil-square"></i>

                        <span>
                            Daftar PPDB
                        </span>

                    </a>

                </li>


            </ul>

        </div>

    </div>
</nav>
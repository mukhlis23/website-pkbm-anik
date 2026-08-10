<footer class="footer mt-5">

    <div class="container py-5">

        <div class="row">

            <!-- Tentang PKBM -->
            <div class="col-lg-4 col-md-6 mb-4">

                <h4 class="fw-bold">
                    PKBM ANIK
                </h4>

                <p class="mt-3">
                    Pusat Kegiatan Belajar Masyarakat (PKBM) ANIK merupakan
                    lembaga pendidikan nonformal yang menyediakan layanan
                    pendidikan kesetaraan serta berbagai program pembelajaran
                    bagi masyarakat.
                </p>

            </div>

            <!-- Menu -->
            <div class="col-lg-2 col-md-6 mb-4">

                <h5 class="fw-bold">
                    Menu
                </h5>

                <ul class="list-unstyled mt-3">

                    <li class="mb-2">
                        <a href="{{ route('beranda') }}">Beranda</a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('profil') }}">Profil</a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('program') }}">Program</a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('informasi') }}">Informasi</a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('galeri') }}">Galeri</a>
                    </li>

                    <li>
                        <a href="{{ route('kontak') }}">Kontak</a>
                    </li>

                </ul>

            </div>

            <!-- Kontak -->
            <div class="col-lg-4 col-md-6 mb-4">

                <h5 class="fw-bold">
                    Kontak
                </h5>

                <ul class="list-unstyled mt-3">

                    <li class="mb-3">
                        📍
                        <span class="ms-1">
                            {{ $kontak->alamat ?? 'Alamat belum diisi' }}
                        </span>
                    </li>

                    <li class="mb-3">
                        ✉️
                        <span class="ms-1">
                            {{ $kontak->email ?? '-' }}
                        </span>
                    </li>

                    <li>
                        📱
                        <span class="ms-1">
                            {{ $kontak->telepon ?? '-' }}
                        </span>
                    </li>

                </ul>

            </div>

            <!-- PPDB -->
            <div class="col-lg-2 col-md-6 mb-4">

                <h5 class="fw-bold">
                    PPDB
                </h5>

                <p class="mt-3">
                    Pendaftaran peserta didik baru dapat dilakukan secara online melalui tombol PPDB.
                </p>

                <a href="{{ route('ppdb') }}"
                   class="btn btn-ppdb">
                    Daftar PPDB
                </a>

            </div>

        </div>

        <hr>

        <hr>
        
        <div class="text-center">
            <p class="mb-1">
                © {{ date('Y') }} PKBM ANIK. All Rights Reserved.
            </p>
            <a href="{{ route('login') }}"
               class="text-decoration-none text-secondary small">
               <i class="bi bi-shield-lock-fill"></i>
               Login
            </a>
        </div>
    </div>

</footer>
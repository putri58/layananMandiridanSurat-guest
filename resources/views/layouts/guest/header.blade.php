<!-- ================= HEADER SECTION ================= -->
<header class="header_section">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('dashboard') }}">
    <!-- Icon kecil seperti favicon -->
    <img src="{{ asset('assets-guest/images/logobina.png') }}"
         alt="Logo"
         class="me-2"
         style="width: 16px; height: 16px; object-fit: contain;">
    <span>Layanan Mandiri</span>
</a>

            <!-- TOGGLER -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- NAV LINKS -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <!-- Logo / Beranda -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <img src="{{ asset('assets-guest/images/logo-beranda.png') }}" alt="Beranda">
                        </a>
                    </li>
                    {{-- about --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about.index') }}">Tentang</a>
                    </li>
                    {{-- endabout --}}
                    <!-- NavBar -->
                     <li class="nav-item dropdown guest-nav-item">
    <a class="nav-link dropdown-toggle guest-nav-link text-white fw-semibold px-3"
        href="#" id="menuWarga" role="button" data-bs-toggle="dropdown">
        <i data-feather="layers" class="me-1"></i> Warga
    </a>
    <ul class="dropdown-menu guest-dropdown-menu shadow-sm" aria-labelledby="menuWarga">
        <li>
            <a class="dropdown-item guest-dropdown-item" href="{{ route('warga.create') }}">
                <i data-feather="folder" class="me-2"></i> Tambah Warga
            </a>
        </li>
        <li>
            <a class="dropdown-item guest-dropdown-item" href="{{ route('warga.index') }}">
                <i data-feather="folder" class="me-2"></i> Data Warga
            </a>
        </li>
    </ul>
</li>

<li class="nav-item dropdown guest-nav-item">
    <a class="nav-link dropdown-toggle guest-nav-link text-white fw-semibold px-3"
        href="#" id="menuJenis" role="button" data-bs-toggle="dropdown">
        <i data-feather="layers" class="me-1"></i> Jenis
    </a>
    <ul class="dropdown-menu guest-dropdown-menu shadow-sm" aria-labelledby="menuJenis">
        <li>
            <a class="dropdown-item guest-dropdown-item" href="{{ route('jenis-surat.create') }}">
                <i data-feather="folder" class="me-2"></i> Tambah Jenis Surat
            </a>
        </li>
        <li>
            <a class="dropdown-item guest-dropdown-item" href="{{ route('jenis-surat.index') }}">
                <i data-feather="folder" class="me-2"></i> Data Jenis Surat
            </a>
        </li>
    </ul>
</li>

<li class="nav-item dropdown guest-nav-item">
    <a class="nav-link dropdown-toggle guest-nav-link text-white fw-semibold px-3"
        href="#" id="menuUser" role="button" data-bs-toggle="dropdown">
        <i data-feather="layers" class="me-1"></i> User
    </a>
    <ul class="dropdown-menu guest-dropdown-menu shadow-sm" aria-labelledby="menuUser">
        <li>
            <a class="dropdown-item guest-dropdown-item" href="{{ route('user.create') }}">
                <i data-feather="folder" class="me-2"></i> Tambah User
            </a>
        </li>
        <li>
            <a class="dropdown-item guest-dropdown-item" href="{{ route('user.index') }}">
                <i data-feather="folder" class="me-2"></i> Data User
            </a>
        </li>
    </ul>
</li>

<li class="nav-item dropdown guest-nav-item">
    <a class="nav-link dropdown-toggle guest-nav-link text-white fw-semibold px-3"
        href="#" id="menuPermohonan" role="button" data-bs-toggle="dropdown">
        <i data-feather="layers" class="me-1"></i> Permohonan
    </a>
    <ul class="dropdown-menu guest-dropdown-menu shadow-sm" aria-labelledby="menuPermohonan">
        <li>
            <a class="dropdown-item guest-dropdown-item" href="{{ route('permohonan.create') }}">
                <i data-feather="folder" class="me-2"></i> Tambah Permohonan
            </a>
        </li>
        <li>
            <a class="dropdown-item guest-dropdown-item" href="{{ route('permohonan.index') }}">
                <i data-feather="folder" class="me-2"></i> Daftar Permohonan
            </a>
        </li>
    </ul>
</li>

<li class="nav-item dropdown guest-nav-item">
    <a class="nav-link dropdown-toggle guest-nav-link text-white fw-semibold px-3"
        href="#" id="menuBerkas" role="button" data-bs-toggle="dropdown">
        <i data-feather="layers" class="me-1"></i> Berkas
    </a>
    <ul class="dropdown-menu guest-dropdown-menu shadow-sm" aria-labelledby="menuBerkas">
        <li>
            <a class="dropdown-item guest-dropdown-item" href="{{ route('berkas.create') }}">
                <i data-feather="folder" class="me-2"></i> Tambah Berkas
            </a>
        </li>
        <li>
            <a class="dropdown-item guest-dropdown-item" href="{{ route('berkas.index') }}">
                <i data-feather="folder" class="me-2"></i> Daftar Berkas
            </a>
        </li>
    </ul>
</li>

<li class="nav-item dropdown guest-nav-item">
    <a class="nav-link dropdown-toggle guest-nav-link text-white fw-semibold px-3"
        href="#" id="menuRiwayat" role="button" data-bs-toggle="dropdown">
        <i data-feather="layers" class="me-1"></i> Riwayat
    </a>
    <ul class="dropdown-menu guest-dropdown-menu shadow-sm" aria-labelledby="menuRiwayat">
        <!-- <li>
            <a class="dropdown-item guest-dropdown-item" href="{{ route('riwayat.create') }}">
                <i data-feather="folder" class="me-2"></i> Tambah Status
            </a>
        </li> -->
        <li>
            <a class="dropdown-item guest-dropdown-item" href="{{ route('riwayat.index') }}">
                <i data-feather="folder" class="me-2"></i> Daftar Status
            </a>
        </li>
    </ul>
</li>

                    {{-- EndNavBar --}}
                    {{-- datalist --}}
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white fw-semibold px-3" href="#" id="menuLayanan"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i data-feather="layers" class="me-1"></i> DATA
                        </a>
                        <ul class="dropdown-menu shadow-sm border-0 rounded-3" aria-labelledby="menuLayanan">
                            <li>
                                <a class="dropdown-item" href="{{ route('warga.index') }}">
                                    <i data-feather="folder" class="me-2 text-success"></i> Data Warga
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('jenis-surat.index') }}">
                                    <i data-feather="folder" class="me-2 text-success"></i> Data Jenis Surat
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('user.index') }}">
                                    <i data-feather="folder" class="me-2 text-success"></i> Data User
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('permohonan.index') }}">
                                    <i data-feather="folder" class="me-2 text-success"></i> Daftar Permohonan
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('berkas.index') }}">
                                    <i data-feather="folder" class="me-2 text-success"></i> Daftar Berkas
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('riwayat.index') }}">
                                    <i data-feather="folder" class="me-2 text-success"></i> Daftar Status
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    {{-- enddatalist --}}
                    <!-- Login -->
                    <li class="nav-item dropdown d-flex align-items-center">
    @if(Auth::check())
        <a class="nav-link dropdown-toggle d-flex align-items-center"
           href="#"
           id="dropdownUser"
           role="button"
           data-bs-toggle="dropdown"
           aria-expanded="false">

            <img src="{{ Auth::user()->profile_picture
        ? asset('storage/uploads/' . Auth::user()->profile_picture)
        : asset('assets-admin/images/default-profile.png') }}"
     alt="Profile Picture"
     class="avatar-circle"
     style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">

            <span class="text-white fw-semibold" style="font-size: 15px;">
                {{ Auth::user()->name }}
            </span>

        </a>

        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3" aria-labelledby="dropdownUser">
            <li>
    <li>
    <a class="dropdown-item text-danger fw-semibold"
       href="{{ route('auth.logout') }}">
        <i data-feather='log-out' class="me-2"></i> Logout
    </a>
    <a class="dropdown-item text-danger fw-semibold"
       href="{{ route('auth.logout') }}">
        <i data-feather='log-out' class="me-2"></i>{{ session('last_login') }}
    </a>
</li>
</li>
        </ul>
        <ul class="navbar-nav">

    @if(Auth::check())
        <li class="nav-item dropdown">
            <!-- isi dropdown user -->
        </li>

        <li class="nav-item dropdown ms-lg-3">
            <!-- item tambahan jika login -->
        </li>

    @else
        <li class="nav-item">
            <a class="btn btn-primary" href="{{ route('auth.login') }}">Login</a>
        </li>
    @endif

</ul>


    @else
        <a class="nav-link" href="{{ route('auth') }}">
            <img src="{{ asset('assets-guest/images/login.png') }}" alt="login" width="35" height="35">
        </a>
    @endif
</li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ======== BANNER SECTION ======== -->
    <section class="banner_section">
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- SLIDE 1 -->
                <div class="carousel-item active">
                    <div class="container-fluid py-5 px-0">
                        <div class="row align-items-center mx-0">
                            <div class="col-md-6 ps-md-5 text-white">
                                <h1 class="banner_title">Layanan Mandiri<br>dan Surat</h1>
                                <p class="banner_subtitle">Kemudahan administrasi dalam genggaman Anda.</p>
                            </div>
                            <div class="col-md-6 text-center">
                                <img src="{{ asset('assets-guest/images/logobina.png') }}" class="img-fluid"
                                    alt="Banner">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 2 -->
                <div class="carousel-item">
                    <div class="container-fluid py-5 px-0">
                        <div class="row align-items-center mx-0">
                            <div class="col-md-6 ps-md-5 text-white">
                                <h1 class="banner_title">Digitalisasi Layanan<br>Desa Anda</h1>
                                <p class="banner_subtitle">Cepat, mudah, dan transparan.</p>
                                <a href="#" class="btn-banner">More</a>
                            </div>
                            <div class="col-md-6 text-center">
                                <img src="{{ asset('assets-guest/images/logobina.png') }}" class="img-fluid"
                                    alt="Banner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</header>

<!-- ================= STYLES ================= -->


<!-- ================= SCRIPTS ================= -->
<script src="{{ asset('assets-guest/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://kit.fontawesome.com/a2e0ad2d3c.js" crossorigin="anonymous"></script>

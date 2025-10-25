<!-- ================= HEADER SECTION ================= -->
<header class="header_section">
   <!-- NAVBAR -->
   <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
      <div class="container">
         <!-- LOGO -->
         <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('dashboard') }}">
            <!-- <img src="{{ asset('assets-guest/images/logo.png') }}" alt="Logo" height="45" class="me-2"> -->
            <span>Layanan Mandiri</span>
         </a>

         <!-- TOGGLER -->
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
         </button>

         <!-- NAV LINKS -->
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
               <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Beranda</a></li>
               <li class="nav-item"><a class="nav-link" href="{{ route('warga.create') }}">Tambah Data Warga</a></li>
               <li class="nav-item"><a class="nav-link" href="{{ route('jenis-surat.create') }}">Tambah Jenis Surat</a></li>
               <li class="nav-item"><a class="nav-link" href="{{ route('warga.index') }}">Data Warga</a></li>
               <li class="nav-item"><a class="nav-link" href="{{ route('jenis-surat.index') }}">Data Jenis Surat</a></li>
               <li class="nav-item"><a class="nav-link" href="{{ route('user.create') }}">User</a></li>
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
                     <a href="#" class="btn-banner">Selengkapnya</a>
                  </div>
                  <div class="col-md-6 text-center">
                     <img src="{{ asset('assets-guest/images/banner-img.png') }}" class="img-fluid" alt="Banner">
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
                     <a href="#" class="btn-banner">Jelajahi</a>
                  </div>
                  <div class="col-md-6 text-center">
                     <img src="{{ asset('assets-guest/images/banner-img.png') }}" class="img-fluid" alt="Banner">
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- SLIDE CONTROLS -->
      <!-- <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
         <span class="fa fa-angle-left"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
         <span class="fa fa-angle-right"></span>
      </button>
   </div>
</section> -->
</header>

<!-- ================= STYLES ================= -->
<style>
   body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
   }

   /* ===== NAVBAR ===== */
   .navbar {
      background-color: #0a1931;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
      padding: 10px 0;
      transition: all 0.3s ease;
   }

   .navbar-brand {
      color: #fff;
      font-size: 1.25rem;
      letter-spacing: 0.5px;
   }

   .navbar-brand span {
      color: #ff4c4c;
      font-weight: 600;
   }

   .navbar-nav .nav-link {
      color: #fff;
      font-weight: 500;
      margin-left: 20px;
      transition: color 0.3s ease;
   }

   .navbar-nav .nav-link:hover,
   .navbar-nav .nav-link.active {
      color: #ff4c4c !important;
   }

   /* ===== BANNER ===== */
   .banner_section {
    background: linear-gradient(135deg, #ffffffff 60%, #c82333);
    color: #fff;
    margin-top: 70px;
    width: 100%;
    overflow-x: hidden;
   }

   .banner_title {
      font-weight: 700;
      font-size: 2.5rem;
      line-height: 1.3;
      margin-bottom: 15px;
   }

   .banner_subtitle {
      font-size: 1.1rem;
      margin-bottom: 25px;
   }

   .btn-banner {
      background-color: #ff4c4c;
      color: #fff;
      padding: 10px 22px;
      border-radius: 8px;
      font-weight: 500;
      text-decoration: none;
      transition: background 0.3s ease;
   }

   .btn-banner:hover {
      background-color: #fff;
      color: #0a1931;
   }

   .carousel-control-prev span,
   .carousel-control-next span {
      font-size: 2rem;
      color: #fff;
   }
</style>

<!-- ================= SCRIPTS ================= -->
<script src="{{ asset('assets-guest/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://kit.fontawesome.com/a2e0ad2d3c.js" crossorigin="anonymous"></script>

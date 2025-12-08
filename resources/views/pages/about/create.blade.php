<!DOCTYPE html>
<html lang="id">

<head>
    @extends('layouts.guest.app')
    @section('content')
</head>

<body>
    <section class="about-section py-5">
        <div class="container">
            <!-- Header Section -->
            <div class="text-center mb-5">
                <h1 class="about-title display-4 fw-bold text-primary mb-3">Tentang Kami</h1>
                <p class="lead text-muted">Mengenal Lebih Dekat Platform Layanan Mandiri & Surat</p>
            </div>

            <!-- Hero Image -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="text-center">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                             alt="Digital Government Services" 
                             class="img-fluid rounded shadow-lg"
                             style="max-height: 400px; object-fit: cover; width: 100%;">
                    </div>
                </div>
            </div>

            <!-- Mission Statement -->
            <div class="about-box bg-light p-5 rounded-4 shadow-sm mb-5">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-4">Visi & Misi Kami</h2>
                        <p class="fs-5">
                            Kami adalah inovator di balik platform digital yang merevolusi cara masyarakat berinteraksi dengan
                            layanan administrasi surat-menyurat. Layanan Mandiri & Surat dirancang secara komprehensif dan 
                            terstruktur untuk memastikan setiap tahapan pengurusan dokumen berjalan efisien, transparan, dan aman.
                        </p>
                    </div>
                    <div class="col-lg-4 text-center">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Vision Icon" 
                             class="img-fluid rounded-circle"
                             style="width: 250px; height: 250px; object-fit: cover;">
                    </div>
                </div>
            </div>

            <!-- Tujuan Section -->
            <div class="row mb-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="card h-100 border-0 shadow-lg">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <div class="icon-wrapper bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" 
                                     style="width: 80px; height: 80px;">
                                    <i class="fas fa-bullseye fa-2x text-white"></i>
                                </div>
                            </div>
                            <h3 class="card-title text-center fw-bold mb-4">Tujuan Kami</h3>
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    <strong>Mempermudah Akses</strong> - Membuat layanan administrasi dapat diakses dari mana saja, kapan saja
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    <strong>Mengurangi Waktu Tunggu</strong> - Memangkas birokrasi yang berbelit-belit
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    <strong>Meningkatkan Transparansi</strong> - Setiap proses dapat dilacak secara real-time
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    <strong>Menjamin Keamanan Data</strong> - Dokumen dan informasi pribadi terlindungi dengan enkripsi terbaik
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    <strong>Mendukung Digitalisasi Pemerintahan</strong> - Kontribusi menuju smart government
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-lg">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <div class="icon-wrapper bg-success rounded-circle d-inline-flex align-items-center justify-content-center" 
                                     style="width: 80px; height: 80px;">
                                    <i class="fas fa-project-diagram fa-2x text-white"></i>
                                </div>
                            </div>
                            <h3 class="card-title text-center fw-bold mb-4">Alur Kerja</h3>
                            <div class="timeline">
                                <div class="timeline-step">
                                    <div class="step-number">1</div>
                                    <div class="step-content">
                                        <h5 class="fw-bold">Registrasi & Login</h5>
                                        <p class="mb-0">Daftar akun dan verifikasi identitas secara online</p>
                                    </div>
                                </div>
                                <div class="timeline-step">
                                    <div class="step-number">2</div>
                                    <div class="step-content">
                                        <h5 class="fw-bold">Pilih Layanan</h5>
                                        <p class="mb-0">Tentukan jenis surat atau dokumen yang dibutuhkan</p>
                                    </div>
                                </div>
                                <div class="timeline-step">
                                    <div class="step-number">3</div>
                                    <div class="step-content">
                                        <h5 class="fw-bold">Upload Dokumen</h5>
                                        <p class="mb-0">Lengkapi persyaratan dengan panduan interaktif</p>
                                    </div>
                                </div>
                                <div class="timeline-step">
                                    <div class="step-number">4</div>
                                    <div class="step-content">
                                        <h5 class="fw-bold">Tracking & Verifikasi</h5>
                                        <p class="mb-0">Pantau status pengajuan secara real-time</p>
                                    </div>
                                </div>
                                <div class="timeline-step">
                                    <div class="step-number">5</div>
                                    <div class="step-content">
                                        <h5 class="fw-bold">Penandatanganan Digital</h5>
                                        <p class="mb-0">Tanda tangan elektronik yang sah dan terverifikasi</p>
                                    </div>
                                </div>
                                <div class="timeline-step">
                                    <div class="step-number">6</div>
                                    <div class="step-content">
                                        <h5 class="fw-bold">Download & Selesai</h5>
                                        <p class="mb-0">Dokumen siap diunduh dalam format PDF</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Section with Images -->
            <div class="row mb-5">
                <div class="col-md-4 mb-4">
                    <div class="card feature-card h-100 border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1586281380349-632531db7ed4?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             class="card-img-top" 
                             alt="Easy Registration"
                             style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h4 class="fw-bold">Registrasi Mudah</h4>
                            <p>Proses pendaftaran yang cepat dan sederhana tanpa birokrasi rumit</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card feature-card h-100 border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             class="card-img-top" 
                             alt="Digital Process"
                             style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h4 class="fw-bold">Proses Digital</h4>
                            <p>Seluruh tahapan dilakukan secara online dengan sistem terintegrasi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card feature-card h-100 border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             class="card-img-top" 
                             alt="Secure Document"
                             style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h4 class="fw-bold">Dokumen Aman</h4>
                            <p>Keamanan data terjamin dengan enkripsi tingkat tinggi</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="bg-primary text-white p-5 rounded-4 shadow-lg mb-5">
                <div class="row text-center">
                    <div class="col-md-3 mb-4">
                        <h2 class="display-4 fw-bold">10K+</h2>
                        <p class="mb-0">Pengguna Terdaftar</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <h2 class="display-4 fw-bold">50K+</h2>
                        <p class="mb-0">Dokumen Diproses</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <h2 class="display-4 fw-bold">99%</h2>
                        <p class="mb-0">Kepuasan Pengguna</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <h2 class="display-4 fw-bold">24/7</h2>
                        <p class="mb-0">Layanan Tersedia</p>
                    </div>
                </div>
            </div>

            <!-- Team/Organization Section -->
            <div class="text-center">
                <h2 class="fw-bold mb-4">Didukung oleh Tim Profesional</h2>
                <p class="mb-5">Tim ahli yang berdedikasi untuk memberikan pelayanan terbaik bagi masyarakat</p>
                
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                     alt="Professional Team" 
                     class="img-fluid rounded shadow"
                     style="max-height: 400px; object-fit: cover; width: 100%;">
            </div>
        </div>
    </section>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @endsection
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    @extends('layouts.guest.app')
    @section('content')
        <!-- start main content -->
        <div class="domain_section">
            <div class="container">
                <div class="domain_box">
                    <div class="domain_rate">
                        <ul>
                            <li><a href="{{ route('warga.index') }}"><span style="color: #8b2791;"></span> Warga</a></li>
                            <li><a href="{{ route('jenis-surat.index') }}"><span style="color: #8b2791;"></span> Jenis Surat</a></li>
                            <li><a href="{{ route('user.index') }}"><span style="color: #8b2791;"></span> User </a></li>
                            <li><a href="{{ route('berkas.index') }}"><span style="color: #8b2791;"></span> Permohonan</a></li>
                            <li><a href="{{ route('permohonan.index') }}"><span style="color: #8b2791;"></span> Berkas</a></li>
                            <li><a href="{{ route('riwayat.index') }}"><span style="color: #8b2791;"></span> Status</a></li>
                        </ul>
                    </div>
                    <div class="domain_main">
                        <form class="example" action="#">
                            <input type="text" placeholder="Search.." name="Search..">
                            <button type="submit">Search Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="about_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="about_box">
                            <div class="icon_1"><img src="{{ asset('assets-guest/images//icon-1.png') }}"></div>
                            <h3 class="faster_text">Pelayanan Yang cepat</h3>
                            <p class="lorem_text">Dengan sistem digital terintegrasi, Anda tidak perlu lagi antre
                                berjam-jam. Pengajuan hingga verifikasi berkas diproses seefisien mungkin, memastikan
                                dokumen Anda siap dalam waktu yang jauh lebih singkat</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="about_box">
                            <div class="icon_1"><img src="{{ asset('assets-guest/images//icon-2.png') }}"></div>
                            <h3 class="faster_text">Terpercaya</h3>
                            <p class="lorem_text">Kami menjamin bahwa semua dokumen yang Anda cetak atau terima dari portal
                                ini adalah sah dan aman, didukung oleh sistem keamanan data mutakhir untuk melindungi
                                informasi sensitif Anda</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="about_box">
                            <div class="icon_1"><img src="{{ asset('assets-guest/images//icon-3.png') }}"></div>
                            <h3 class="faster_text">Fast Respons</h3>
                            <p class="lorem_text">Setiap pertanyaan atau kendala Anda akan ditanggapi dengan sigap, membuat
                                Anda selalu terinformasi mengenai perkembangan permohonan surat Anda dari awal hingga akhir
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Developer Identity Section -->
<section class="developer-section py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" style="color: #2C3E50; font-weight: 700; position: relative; display: inline-block;">
                DATA PENGEMBANG
                <div style="height: 3px; width: 80px; background: linear-gradient(90deg, #2C3E50, #4CA1AF); margin: 10px auto 0; border-radius: 2px;"></div>
            </h2>
            <p class="text-muted mt-3">Dikembangkan oleh mahasiswa berdedikasi untuk kemajuan pelayanan publik digital</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="developer-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                    <div class="row no-gutters">
                        <!-- Photo Column -->
                        <div class="col-md-4">
                        <div class="developer-photo" style="height: 100%; min-height: 300px; background: linear-gradient(135deg, #2C3E50 0%, #4CA1AF 100%); display: flex; align-items: center; justify-content: center; padding: 30px;">
        <img src="{{ asset('assets-guest/images/fotoputri.JPG') }}"
             alt="Putri Agustin"
             style="width: 200px; height: 200px; object-fit: cover; border-radius: 50%; border: 5px solid white; box-shadow: 0 10px 20px rgba(0,0,0,0.2);">
    </div>
</div>
                        <!-- Info Column -->
                        <div class="col-md-8">
                            <div class="p-5">
                                <!-- Basic Info -->
                                <div class="mb-4">
                                    <h3 style="color: #2C3E50; font-weight: 700; margin-bottom: 5px;">Putri Agustin</h3>
                                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                                        <span style="background: #e3f2fd; color: #1565c0; padding: 5px 15px; border-radius: 20px; font-size: 14px; font-weight: 500;">
                                            <i class="fas fa-id-card" style="margin-right: 5px;"></i> 2457301119
                                        </span>
                                        <span style="background: #f3e5f5; color: #7b1fa2; padding: 5px 15px; border-radius: 20px; font-size: 14px; font-weight: 500;">
                                            <i class="fas fa-graduation-cap" style="margin-right: 5px;"></i> Sistem Informasi
                                        </span>
                                    </div>
                                    <p class="text-muted" style="line-height: 1.6;">
                                        Mahasiswa Sistem Informasi yang berfokus pada pengembangan sistem informasi untuk pelayanan publik.
                                        Memiliki passion dalam menciptakan solusi teknologi yang memudahkan masyarakat.
                                    </p>
                                </div>

                                <!-- Contact & Social Media -->
                                <div class="mb-4">
                                    <h5 style="color: #2C3E50; font-weight: 600; margin-bottom: 15px;">
                                        <i class="fas fa-share-alt" style="margin-right: 8px;"></i> Kontak & Media Sosial
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                <div style="width: 40px; height: 40px; background: #0077b5; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fab fa-linkedin-in" style="color: white;"></i>
                                                </div>
                                                <div>
                                                    <p style="margin: 0; font-size: 14px; color: #666;">LinkedIn</p>
                                                    <a href="https://www.linkedin.com/in/putri-agustin-2b1524360?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank" style="color: #2C3E50; font-weight: 500; text-decoration: none;">
                                                        linkedin.com/in/putri-agustin
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                <div style="width: 40px; height: 40px; background: #333; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fab fa-github" style="color: white;"></i>
                                                </div>
                                                <div>
                                                    <p style="margin: 0; font-size: 14px; color: #666;">GitHub</p>
                                                    <a href="https://github.com/putri58" target="_blank" style="color: #2C3E50; font-weight: 500; text-decoration: none;">
                                                        https://github.com/putri58
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                <div style="width: 40px; height: 40px; background: #e4405f; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fab fa-instagram" style="color: white;"></i>
                                                </div>
                                                <div>
                                                    <p style="margin: 0; font-size: 14px; color: #666;">Instagram</p>
                                                    <a href="https://www.instagram.com/putrriagustine?igsh=a3k5bWJranQ0Z29s" target="_blank" style="color: #2C3E50; font-weight: 500; text-decoration: none;">
                                                        @putrriagustine
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                <div style="width: 40px; height: 40px; background: #25D366; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fab fa-whatsapp" style="color: white;"></i>
                                                </div>
                                                <div>
                                                    <p style="margin: 0; font-size: 14px; color: #666;">WhatsApp</p>
                                                    <a href="https://wa.me/6285609936799" target="_blank" style="color: #2C3E50; font-weight: 500; text-decoration: none;">
                                                        +62 856-0993-6799
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Skills & Technologies -->
                                <div>
                                    <h5 style="color: #2C3E50; font-weight: 600; margin-bottom: 15px;">
                                        <i class="fas fa-code" style="margin-right: 8px;"></i> Teknologi yang Digunakan
                                    </h5>
                                    <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                                        <span style="background: #e8f5e9; color: #2e7d32; padding: 6px 15px; border-radius: 20px; font-size: 13px; font-weight: 500;">
                                            Laravel
                                        </span>
                                        <span style="background: #fff3e0; color: #ef6c00; padding: 6px 15px; border-radius: 20px; font-size: 13px; font-weight: 500;">
                                            PHP
                                        </span>
                                        <span style="background: #e3f2fd; color: #1565c0; padding: 6px 15px; border-radius: 20px; font-size: 13px; font-weight: 500;">
                                            MySQL
                                        </span>
                                        <span style="background: #f3e5f5; color: #7b1fa2; padding: 6px 15px; border-radius: 20px; font-size: 13px; font-weight: 500;">
                                            Bootstrap
                                        </span>
                                        <span style="background: #fff8e1; color: #ff8f00; padding: 6px 15px; border-radius: 20px; font-size: 13px; font-weight: 500;">
                                            JavaScript
                                        </span>
                                        <span style="background: #e0f2f1; color: #00695c; padding: 6px 15px; border-radius: 20px; font-size: 13px; font-weight: 500;">
                                            Git
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Info -->
                <div class="text-center mt-4">
                    <div style="background: white; border-radius: 10px; padding: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                        <h5 style="color: #2C3E50; font-weight: 600; margin-bottom: 10px;">
                            <i class="fas fa-info-circle" style="margin-right: 8px;"></i> Tentang Proyek Ini
                        </h5>
                        <p style="color: #666; max-width: 800px; margin: 0 auto;">
                            Sistem Layanan Mandiri & Surat ini dikembangkan sebagai bagian dari Tugas Besar Mata Kuliah
                            <strong>Pemrograman Framework</strong>. Proyek ini bertujuan untuk mendigitalisasi pelayanan administrasi
                            surat-menyurat guna meningkatkan efisiensi dan transparansi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <div class="pricing_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="pricing_taital">AKTIVITAS</h1>
                    </div>
                </div>
                <div class="pricing_section_2">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="pricing_box">
                                <h3 class="number_text">1</h3>
                                <h5 class="cloud_text">Tracking Status</h5>
                                <h1 class="dolor_text"></h1>
                                <h3 class="monthly_text"></h3>
                                <p class="band_text"></p>
                                <!-- <div class="signup_bt"><a href="#">Sign Up</a></div> -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="pricing_box">
                                <h3 class="number_text">2</h3>
                                <h5 class="cloud_text">Persyaratan</h5>
                                <h1 class="dolor_text"></h1>
                                <h3 class="monthly_text"></h3>
                                <p class="band_text"></p>
                                <!-- <div class="signup_bt"><a href="#">Sign Up</a></div> -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="pricing_box">
                                <h3 class="number_text">3</h3>
                                <h5 class="cloud_text">Penandatanganan</h5>
                                <h1 class="dolor_text"></h1>
                                <h3 class="monthly_text"></h3>
                                <p class="band_text"></p>
                                <!-- <div class="signup_bt"><a href="#">Sign Up</a></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="services_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="services_taital">Our Services</h1>
                    </div>
                </div>
                <div class="services_section_2">
                    <div id="main_slider"class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="service_box">
                                            <div class="services_icon">
                                                <img src="{{ asset('assets-guest/images//icon-4.png') }}" class="image_1">
                                                <img src="{{ asset('assets-guest/images//icon-7.png') }}" class="image_2">
                                            </div>
                                            <h3 class="wordpress_text">Jenis Surat</h3>
                                            <p class="opposed_text">opposed to using 'Content here, content here', making
                                                it look like readable</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="service_box">
                                            <div class="services_icon">
                                                <img src="{{ asset('assets-guest/images//icon-5.png') }}" class="image_1">
                                                <img src="{{ asset('assets-guest/images//icon-5.png') }}" class="image_2">
                                            </div>
                                            <h3 class="wordpress_text">Permohonan Surat</h3>
                                            <p class="opposed_text">opposed to using 'Content here, content here', making
                                                it look like readable</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="service_box">
                                            <div class="services_icon">
                                                <img src="{{ asset('assets-guest/images//icon-6.png') }}" class="image_1">
                                                <img src="{{ asset('assets-guest/images//icon-9.png') }}" class="image_2">
                                            </div>
                                            <h3 class="wordpress_text">Berkas Persyaratan</h3>
                                            <p class="opposed_text">opposed to using 'Content here, content here', making
                                                it look like readable</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="service_box">
                                            <div class="services_icon">
                                                <img src="{{ asset('assets-guest/images//icon-4.png') }}"
                                                    class="image_1">
                                                <img src="{{ asset('assets-guest/images//icon-7.png') }}"
                                                    class="image_2">
                                            </div>
                                            <h3 class="wordpress_text">Riwayat Status Surat</h3>
                                            <p class="opposed_text">opposed to using 'Content here, content here', making
                                                it look like readable</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="service_box">
                                            <div class="services_icon">
                                                <img src="{{ asset('assets-guest/images//icon-5.png') }}"
                                                    class="image_1">
                                                <img src="{{ asset('assets-guest/images//icon-5.png') }}"
                                                    class="image_2">
                                            </div>
                                            <h3 class="wordpress_text">Login</h3>
                                            <p class="opposed_text">opposed to using 'Content here, content here', making
                                                it look like readable</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="service_box">
                                            <div class="services_icon">
                                                <img src="{{ asset('assets-guest/images//icon-6.png') }}"
                                                    class="image_1">
                                                <img src="{{ asset('assets-guest/images//icon-9.png') }}"
                                                    class="image_2">
                                            </div>
                                            <h3 class="wordpress_text">Registrasi</h3>
                                            <p class="opposed_text">opposed to using 'Content here, content here', making
                                                it look like readable</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="service_box">
                                            <div class="services_icon">
                                                <img src="{{ asset('assets-guest/images//icon-4.png') }}"
                                                    class="image_1">
                                                <img src="{{ asset('assets-guest/images//icon-7.png') }}"
                                                    class="image_2">
                                            </div>
                                            <h3 class="wordpress_text">WordPress Hosting</h3>
                                            <p class="opposed_text">opposed to using 'Content here, content here', making
                                                it look like readable</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="service_box">
                                            <div class="services_icon">
                                                <img src="{{ asset('assets-guest/images//icon-5.png') }}"
                                                    class="image_1">
                                                <img src="{{ asset('assets-guest/images//icon-5.png') }}"
                                                    class="image_2">
                                            </div>
                                            <h3 class="wordpress_text">Cloud Hosting</h3>
                                            <p class="opposed_text">opposed to using 'Content here, content here', making
                                                it look like readable</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="service_box">
                                            <div class="services_icon">
                                                <img src="{{ asset('assets-guest/images//icon-6.png') }}"
                                                    class="image_1">
                                                <img src="{{ asset('assets-guest/images//icon-9.png') }}"
                                                    class="image_2">
                                            </div>
                                            <h3 class="wordpress_text">Dedicated Hosting</h3>
                                            <p class="opposed_text">opposed to using 'Content here, content here', making
                                                it look like readable</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonial_section layout_padding">
            <div class="container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="testimonial_taital">Testimoni</h1>
                                    <p class="testimonial_text"> Rina, Ibu Rumah Tangga, Pengguna sejak: 2023</p>
                                    <div class="testimonial_section_2">
                                        <p class="ipsum_text">"Sebagai ibu rumah tangga yang sibuk, saya sangat terbantu
                                            dengan website ini. Cukup dari rumah, semua kebutuhan surat menyurat bisa diurus
                                            tanpa antri panjang. Interface-nya sederhana tapi powerful, panduan langkah demi
                                            langkah sangat jelas. Yang paling saya suka adalah notifikasi real-time untuk
                                            status pengajuan surat. Terima kasih telah memudahkan hidup kami!"</p>
                                        <div class="quick_img"><img
                                                src="{{ asset('assets-guest/images//quick-icon.png') }}"></div>
                                    </div>
                                    <div class="client_img"><img
                                            src="{{ asset('assets-guest/images//rina.JPG') }}"></div>
                                    <h4 class="client_name">Rina</h4>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="testimonial_taital">Testimoni</h1>
                                    <p class="testimonial_text">Komeng, DPR, Pengguna Sejak 2024</p>
                                    <div class="testimonial_section_2">
                                        <p class="ipsum_text">"Website ini menjadi solusi tepat di era digital. Tidak hanya
                                            memudahkan warga, tetapi juga meningkatkan transparansi dan akuntabilitas
                                            pelayanan. Sistem verifikasi berlapis menjamin keaslian setiap dokumen. Inovasi
                                            yang patut diapresiasi dan direplikasi di daerah lain!"</p>
                                        </p>
                                        <div class="quick_img"><img
                                                src="{{ asset('assets-guest/images//quick-icon.png') }}"></div>
                                    </div>
                                    <div class="client_img"><img
                                            src="{{ asset('assets-guest/images//komeng.JPG') }}"></div>
                                    <h4 class="client_name">Komeng</h4>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="testimonial_taital">Testimoni</h1>
                                    <p class="testimonial_text">Ajis Gagap, Komedian, Pengguna Sejak 2025</p>
                                    <div class="testimonial_section_2">
                                        <p class="ipsum_text">"Dulu: Mengurus surat keterangan butuh 3 kunjungan ke kantor,
                                            antri 2-3 jam, proses 3 hari.
                                            Sekarang: Input data online, verifikasi via video call, surat jadi dalam 4 jam,
                                            dikirim langsung ke email.
                                            Revolusi pelayanan yang nyata!"</p>
                                        <div class="quick_img"><img
                                                src="{{ asset('assets-guest/images//quick-icon.png') }}"></div>
                                    </div>
                                    <div class="client_img"><img
                                            src="{{ asset('assets-guest/images//ajis.JPG') }}"></div>
                                    <h4 class="client_name">Ajis Gagap</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <section class="welcome-section">
    <h1 class="welcome-title">TERIMAKASIH!!</h1>

    <p class="welcome-date">
        <i class="far fa-calendar"></i>
        {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
    </p>
</section>


        <!-- main content end -->
    @endsection
    </body>

</html>

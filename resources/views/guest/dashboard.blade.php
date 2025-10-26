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
                     <li><a href="#"><span style="color: #8b2791;">.com</span> $11.25</a></li>
                     <li><a href="#"><span style="color: #8b2791;">.org</span> $12.50</a></li>
                     <li><a href="#"><span style="color: #8b2791;">.net</span> $14.50 </a></li>
                     <li><a href="#"><span style="color: #8b2791;">.com</span> $11.50</a></li>
                     <li><a href="#"><span style="color: #8b2791;">info</span> $9.00</a></li>
                     <li><a href="#"><span style="color: #8b2791;">xyz</span> $0.99</a></li>
                  </ul>
               </div>
               <div class="domain_main">
                  <form class="example" action="#">
                     <input type="text" placeholder="Search Domain.." name="Search Domain..">
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
                     <div class="icon_1"><img src="{{asset('assets-guest/images//icon-1.png')}}"></div>
                     <h3 class="faster_text">Pelayanan Yang cepat</h3>
                     <p class="lorem_text">Dengan sistem digital terintegrasi, Anda tidak perlu lagi antre berjam-jam. Pengajuan hingga verifikasi berkas diproses seefisien mungkin, memastikan dokumen Anda siap dalam waktu yang jauh lebih singkat</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="about_box">
                     <div class="icon_1"><img src="{{asset('assets-guest/images//icon-2.png')}}"></div>
                     <h3 class="faster_text">Terpercaya</h3>
                     <p class="lorem_text">Kami menjamin bahwa semua dokumen yang Anda cetak atau terima dari portal ini adalah sah dan aman, didukung oleh sistem keamanan data mutakhir untuk melindungi informasi sensitif Anda</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="about_box">
                     <div class="icon_1"><img src="{{asset('assets-guest/images//icon-3.png')}}"></div>
                     <h3 class="faster_text">Fast Respons</h3>
                     <p class="lorem_text">Setiap pertanyaan atau kendala Anda akan ditanggapi dengan sigap, membuat Anda selalu terinformasi mengenai perkembangan permohonan surat Anda dari awal hingga akhir</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="hosting_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <h1 class="hosting_taital">ABOUT US</h1>
                  <p class="hosting_text">Kami adalah inovator di balik platform digital yang merevolusi cara masyarakat berinteraksi dengan layanan administrasi surat-menyurat. Layanan Mandiri & Surat dirancang secara komprehensif dan terstruktur untuk memastikan setiap tahapan pengurusan dokumen berjalan efisien, transparan, dan aman </p>
               </div>
               <div class="col-md-6">
                  <div class="hosting_img"><img src="{{asset('assets-guest/images//hosting-img.png')}}"></div>
               </div>
            </div>
         </div>
      </div>
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
                        <h1 class="dolor_text">$19</h1>
                        <h3 class="monthly_text">MONTHLY</h3>
                        <p class="band_text">5GB bandwidth Free Email Addresses 24/7 security monitoring</p>
                        <div class="signup_bt"><a href="#">Sign Up</a></div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="pricing_box">
                        <h3 class="number_text">2</h3>
                        <h5 class="cloud_text">Persyaratan</h5>
                        <h1 class="dolor_text">$19</h1>
                        <h3 class="monthly_text">MONTHLY</h3>
                        <p class="band_text">5GB bandwidth Free Email Addresses 24/7 security monitoring</p>
                        <div class="signup_bt"><a href="#">Sign Up</a></div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="pricing_box">
                        <h3 class="number_text">3</h3>
                        <h5 class="cloud_text">Penandatanganan</h5>
                        <h1 class="dolor_text">$19</h1>
                        <h3 class="monthly_text">MONTHLY</h3>
                        <p class="band_text">5GB bandwidth Free Email Addresses 24/7 security monitoring</p>
                        <div class="signup_bt"><a href="#">Sign Up</a></div>
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
                                    <img src="{{asset('assets-guest/images//icon-4.png')}}" class="image_1">
                                    <img src="{{asset('assets-guest/images//icon-7.png')}}" class="image_2">
                                 </div>
                                 <h3 class="wordpress_text">Jenis Surat</h3>
                                 <p class="opposed_text">opposed to using 'Content here, content here', making it look like readable</p>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="service_box">
                                 <div class="services_icon">
                                    <img src="{{asset('assets-guest/images//icon-5.png')}}" class="image_1">
                                    <img src="{{asset('assets-guest/images//icon-5.png')}}" class="image_2">
                                 </div>
                                 <h3 class="wordpress_text">Permohonan Surat</h3>
                                 <p class="opposed_text">opposed to using 'Content here, content here', making it look like readable</p>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="service_box">
                                 <div class="services_icon">
                                    <img src="{{asset('assets-guest/images//icon-6.png')}}" class="image_1">
                                    <img src="{{asset('assets-guest/images//icon-9.png')}}" class="image_2">
                                 </div>
                                 <h3 class="wordpress_text">Berkas Persyaratan</h3>
                                 <p class="opposed_text">opposed to using 'Content here, content here', making it look like readable</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="service_box">
                                 <div class="services_icon">
                                    <img src="{{asset('assets-guest/images//icon-4.png')}}" class="image_1">
                                    <img src="{{asset('assets-guest/images//icon-7.png')}}" class="image_2">
                                 </div>
                                 <h3 class="wordpress_text">Riwayat Status Surat</h3>
                                 <p class="opposed_text">opposed to using 'Content here, content here', making it look like readable</p>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="service_box">
                                 <div class="services_icon">
                                    <img src="{{asset('assets-guest/images//icon-5.png')}}" class="image_1">
                                    <img src="{{asset('assets-guest/images//icon-5.png')}}" class="image_2">
                                 </div>
                                 <h3 class="wordpress_text">Login</h3>
                                 <p class="opposed_text">opposed to using 'Content here, content here', making it look like readable</p>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="service_box">
                                 <div class="services_icon">
                                    <img src="{{asset('assets-guest/images//icon-6.png')}}" class="image_1">
                                    <img src="{{asset('assets-guest/images//icon-9.png')}}" class="image_2">
                                 </div>
                                 <h3 class="wordpress_text">Registrasi</h3>
                                 <p class="opposed_text">opposed to using 'Content here, content here', making it look like readable</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="service_box">
                                 <div class="services_icon">
                                    <img src="{{asset('assets-guest/images//icon-4.png')}}" class="image_1">
                                    <img src="{{asset('assets-guest/images//icon-7.png')}}" class="image_2">
                                 </div>
                                 <h3 class="wordpress_text">WordPress Hosting</h3>
                                 <p class="opposed_text">opposed to using 'Content here, content here', making it look like readable</p>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="service_box">
                                 <div class="services_icon">
                                    <img src="{{asset('assets-guest/images//icon-5.png')}}" class="image_1">
                                    <img src="{{asset('assets-guest/images//icon-5.png')}}" class="image_2">
                                 </div>
                                 <h3 class="wordpress_text">Cloud Hosting</h3>
                                 <p class="opposed_text">opposed to using 'Content here, content here', making it look like readable</p>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="service_box">
                                 <div class="services_icon">
                                    <img src="{{asset('assets-guest/images//icon-6.png')}}" class="image_1">
                                    <img src="{{asset('assets-guest/images//icon-9.png')}}" class="image_2">
                                 </div>
                                 <h3 class="wordpress_text">Dedicated Hosting</h3>
                                 <p class="opposed_text">opposed to using 'Content here, content here', making it look like readable</p>
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
                           <h1 class="testimonial_taital">Testimonials</h1>
                           <p class="testimonial_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
                           <div class="testimonial_section_2">
                              <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                              <div class="quick_img"><img src="{{asset('assets-guest/images//quick-icon.png')}}"></div>
                           </div>
                           <div class="client_img"><img src="{{asset('assets-guest/images//client-img.png')}}"></div>
                           <h4 class="client_name">Joy Mori</h4>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-md-12">
                           <h1 class="testimonial_taital">Testimonials</h1>
                           <p class="testimonial_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
                           <div class="testimonial_section_2">
                              <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                              <div class="quick_img"><img src="{{asset('assets-guest/images//quick-icon.png')}}"></div>
                           </div>
                           <div class="client_img"><img src="{{asset('assets-guest/images//client-img.png')}}"></div>
                           <h4 class="client_name">Joy Mori</h4>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-md-12">
                           <h1 class="testimonial_taital">Testimonials</h1>
                           <p class="testimonial_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
                           <div class="testimonial_section_2">
                              <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                              <div class="quick_img"><img src="{{asset('assets-guest/images//quick-icon.png')}}"></div>
                           </div>
                           <div class="client_img"><img src="{{asset('assets-guest/images//client-img.png')}}"></div>
                           <h4 class="client_name">Joy Mori</h4>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="newslatter_section">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="newslatter_taital">Subscribe Newsletter</h1>
                  <form class="example" action="#">
                     <input type="text" class="mail" placeholder="Enter Your email" name="Enter Your email">
                     <button type="submit">Sbscribe</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
       <!-- main content end -->
    @endsection
   </body>
</html>
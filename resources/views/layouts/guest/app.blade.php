<!DOCTYPE html>
<html>
   <!-- start css -->
   <head>
      @include('layouts.guest.css')

   <body>

      <!-- start header -->
      @include('layouts.guest.header')
      <!-- header section end -->

       <!-- main content start -->
      @yield('content')
       <!-- main content end -->

      <!-- footer section start -->
       @include('layouts.guest.footer')
       <!-- footer section end -->

      <!-- Javascript files-->
      @include('layouts.guest.js')
      <!-- end sidebar -->

      {{-- floating --}}
      <!-- Floating WhatsApp Button -->
<a href="https://wa.me/6281234567890?text=Halo%20Admin%20Saya%20ingin%20bertanya"
   class="whatsapp-float"
   target="_blank"
   title="Chat via WhatsApp">
   <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp">
</a>

<style>
.whatsapp-float {
  position: fixed;
  width: 60px;
  height: 60px;
  bottom: 20px;
  right: 20px;
  background-color: #25d366;
  color: #FFF;
  border-radius: 50%;
  text-align: center;
  box-shadow: 2px 2px 3px #999;
  z-index: 1000;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
}
.whatsapp-float img {
  width: 35px;
  height: 35px;
}
.whatsapp-float:hover {
  transform: scale(1.1);
}
</style>

   </body>
</html>

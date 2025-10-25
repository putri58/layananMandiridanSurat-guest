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
   </body>
</html> 
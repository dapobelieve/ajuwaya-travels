<!DOCTYPE html>
<html lang="en">

@include('layout.head')

<body>

    @include('layout.nav')
   
    @yield('content')

    <!-- Footer Section Start -->
    @include('layout.footer')
    <!-- Footer Section End -->  
    
    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="fa fa-angle-up"></i>
    </a>



<script type="text/javascript" src="/aju/assets/js/jquery-min.js"></script>      
<script type="text/javascript" src="/aju/assets/js/bootstrap.min.js"></script>
{{-- <script type="text/javascript" src="/aju/assets/js/jquery.counterup.min.js"></script> --}}
{{-- <script type="text/javascript" src="/aju/assets/js/waypoints.min.js"></script> --}}
<script type="text/javascript" src="/aju/assets/js/jasny-bootstrap.min.js"></script>
{{-- <script type="text/javascript" src="/aju/assets/js/form-validator.min.js"></script> --}}
{{-- <script type="text/javascript" src="/aju/assets/js/contact-form-script.js"></script>     --}}
{{-- <script type="text/javascript" src="/aju/assets/js/jquery.themepunch.revolution.min.js"></script> --}}
{{-- <script type="text/javascript" src="/aju/assets/js/jquery.themepunch.tools.min.js"></script> --}}
<script src="/aju/assets/js/bootstrap-select.min.js"></script>
@yield('scripts')

</body>
</html>
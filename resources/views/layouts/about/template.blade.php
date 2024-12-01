<!--
=========================================================
* Material Kit 3 - v3.1.0
=========================================================

* Product Page:  https://www.creative-tim.com/product/material-kit 
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
{{-- <!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <title>
    About Nurul Huda
  </title>

  <link rel="stylesheet" type="text/css"
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('material-kit-master/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('material-kit-master/assets/css/nucleo-svg.css') }} " rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href={{ asset('material-kit-master/assets/css/material-kit.css?v=3.1.0') }} rel="stylesheet" />
  
  <style>
    .logo-navbar {
        height: 60px;
        width: auto;
        margin-right: 10px;
    }

    .footer {
        color: white !important;
    }

    .footer a {
        color: white !important;
    }

    .footer a:hover {
        color: #d1d1d1;
    }

    .footer h6 {
        color: white !important;
    }

    .footer p {
        color: white !important;
    }

    select.form-control {
        padding: 8px;
    }

    option {
        padding: 8px;
    }
</style>


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>
<body class="about-us bg-gray-100">
  <!-- Navbar Transparent -->
  @include('layouts.client.navbar')
  <!-- End Navbar -->
  <!-- -------- START HEADER 7 w/ text and video ------- -->

@include('layouts.client.header')
  <!-- -------- END HEADER 7 w/ text and video ------- -->

  {{-- isi about --}}
  {{-- <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
    <section class="about">
        @yield('about')
    </section>
  {{-- </div>

  {{-- footer --}}
 {{-- @include('layouts.client.footer') 
  
  <!--   Core JS Files   -->
  <script src="{{ asset('material-kit-master/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('material-kit-master/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('material-kit-master/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
  <script src="{{ asset('material-kit-master/assets/js/plugins/countup.min.js') }}"></script>
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="{{ asset('material-kit-master/assets/js/material-kit.min.js?v=3.1.0') }}" type="text/javascript"></script>
 
 <script>
    // get the element to animate
    var element = document.getElementById('count-stats');
    var elementHeight = element.clientHeight;

    // listen for scroll event and call animate function

    document.addEventListener('scroll', animate);

    // check if element is in view
    function inView() {
      // get window height
      var windowHeight = window.innerHeight;
      // get number of pixels that the document is scrolled
      var scrollY = window.scrollY || window.pageYOffset;
      // get current scroll position (distance from the top of the page to the bottom of the current viewport)
      var scrollPosition = scrollY + windowHeight;
      // get element position (distance from the top of the page to the bottom of the element)
      var elementPosition = element.getBoundingClientRect().top + scrollY + elementHeight;

      // is scroll position greater than element position? (is element in view?)
      if (scrollPosition > elementPosition) {
        return true;
      }

      return false;
    }

    var animateComplete = true;
    // animate element when it is in view
    function animate() {

      // is element in view?
      if (inView()) {
        if (animateComplete) {
          if (document.getElementById('state1')) {
            const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
            if (!countUp.error) {
              countUp.start();
            } else {
              console.error(countUp.error);
            }
          }
          if (document.getElementById('state2')) {
            const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
            if (!countUp1.error) {
              countUp1.start();
            } else {
              console.error(countUp1.error);
            }
          }
          if (document.getElementById('state3')) {
            const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
            if (!countUp2.error) {
              countUp2.start();
            } else {
              console.error(countUp2.error);
            };
          }
          animateComplete = false;
        }
      }
    }

    if (document.getElementById('typed')) {
      var typed = new Typed("#typed", {
        stringsElement: '#typed-strings',
        typeSpeed: 90,
        backSpeed: 90,
        backDelay: 200,
        startDelay: 500,
        loop: true
      });
    }
  </script>
  <script>
    if (document.getElementsByClassName('page-header')) {
      window.onscroll = debounce(function() {
        var scrollPosition = window.pageYOffset;
        var bgParallax = document.querySelector('.page-header');
        var oVal = (window.scrollY / 3);
        bgParallax.style.transform = 'translate3d(0,' + oVal + 'px,0)';
      }, 6);
    }
  </script>
</body>

{{-- </html> --}} 
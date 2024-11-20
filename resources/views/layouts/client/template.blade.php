<!doctype html>
<html lang="en">

<head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Material Kit CSS -->
    <link href="{{ asset('material-kit-master/assets/css/material-kit.css?v=3.0.0') }}" rel="stylesheet" />
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
    </style>
</head>

<body>

    @include('layouts.client.navbar')

    @include('layouts.client.header')

    <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
        <section class="content">
            @yield('content')
        </section>
    </div>
    @include('layouts.client.footer')





    <!--   Core JS Files   -->
    <script src="{{ asset('material-kit-master/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('material-kit-master/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('material-kit-master/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>

    <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
    <script src="{{ asset('material-kit-master/assets/js/plugins/countup.min.js') }}"></script>

    <script src="{{ asset('material-kit-master/assets/js/plugins/choices.min.js') }}"></script>

    <script src="{{ asset('material-kit-master/assets/js/plugins/prism.min.js') }}"></script>
    <script src="{{ asset('material-kit-master/assets/js/plugins/highlight.min.js') }}"></script>

    <!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
    <script src="{{ asset('material-kit-master/assets/js/plugins/rellax.min.js') }}"></script>
    <!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
    <script src="{{ asset('material-kit-master/assets/js/plugins/tilt.min.js') }}"></script>
    <!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
    <script src="{{ asset('material-kit-master/assets/js/plugins/choices.min.js') }}"></script>

    <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="{{ asset('material-kit-master/assets/js/material-kit.min.js?v=3.1.0') }}" type="text/javascript"></script>



</body>

</html>

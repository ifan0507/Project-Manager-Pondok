<!doctype html>
<html lang="en">

<head>
    <title>PP Nurul Huda</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}">

    <!-- Fonts and Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Material Kit CSS -->
    <link href="{{ asset('material-kit-master/assets/css/material-kit.css?v=3.0.0') }}" rel="stylesheet" />

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Custom CSS -->
    <style>
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

        .section.visi {
            background-color: #e0f7fa;
            text-align: center;
        }

        .section.misi {
            background-color: #ffecb3;
            text-align: center;
        }

        .section h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .logo-navbar {
            height: 60px;
            width: auto;
            margin-right: 10px;
        }

        .page-header {
            position: relative;
            width: 100%;
            height: 80vh;
            /* Membuat tinggi slider 80% dari viewport */
            overflow: hidden;
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            width: 100%;
            height: 100%;
        }

        .slide-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Membuat gambar menutupi area slider tanpa distorsi */
            z-index: 0;
        }

        .mask {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.6);
            /* Mask gelap untuk overlay */
            z-index: 1;
        }

        .container.text-center {
            position: relative;
            z-index: 2;
            /* Konten berada di atas mask */
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: white !important;
            z-index: 3;
        }

        /* Card content yang berada di bawah header, sedikit menutupi header */
        .card.card-body {
            margin-top: -50px;
            /* Mengangkat card ke atas sebanyak 50px */
            position: relative;
            /* Untuk memastikan card berada di dalam alur dokumen */
            z-index: 1;
            /* Agar card berada di atas konten lainnya jika perlu */
            border-radius: 15px;
            /* Menambahkan sudut pada card */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            /* Bayangan untuk card */
        }

        /* Memberikan ruang tambahan pada header agar tidak terpotong */
        /* .page-header {
            margin-top: 80px;
        } */

        /* Menambahkan jarak di bawah untuk perangkat mobile */
        @media (max-width: 768px) {
            .card.card-body {
                margin-top: -20px;
                /* Mengurangi jarak untuk tampilan mobile */
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('layouts.client.navbar')

    <!-- Header -->
    @include('layouts.client.header')



    <!-- Main Content -->
    <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
        <section class="content">
            @yield('content')
        </section>
    </div>

    <!-- Footer -->
    @include('layouts.client.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('material-kit-master/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('material-kit-master/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('material-kit-master/assets/js/material-kit.min.js?v=3.1.0') }}"></script>
</body>

</html>

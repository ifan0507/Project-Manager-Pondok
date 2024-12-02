<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}">
    <title>
        Login
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('material-kit-master/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('material-kit-master/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('material-kit-master/assets/css/material-kit.css?v=3.1.0') }}"
        rel="stylesheet" />
</head>

<body class="sign-in-basic">
    <!-- End Navbar -->
    <div class="page-header align-items-start min-vh-100"
        style="background-image: url('{{ asset('assets/img/sekolah.jpg') }}');" loading="lazy">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-success shadow-dark border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-1 mb-0">PP NURUL HUDA</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->has('username') && $errors->has('password'))
                                <div class="alert alert-danger" role="alert">
                                    Tolong isi semua bidang!
                                </div>
                            @elseif ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <center>
                                        <span class="font-medium" style="color: white">
                                            @foreach ($errors->all() as $error)
                                                {{ $error }}
                                            @endforeach
                                        </span>
                                    </center>
                                </div>
                            @endif

                            <form role="form" class="text-start" action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" id="username" name="username" class="form-control"
                                        value="{{ old('username') }}" required>
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" id="password" name="password" class="form-control"
                                        value="{{ old('password') }}" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn bg-gradient-success w-100 my-4 mb-2">Login</button>
                                </div>
                                <p class="mt-4 text-sm text-center">
                                    Don't have an account?
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('material-kit-master/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('material-kit-master/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('material-kit-master/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="{{ asset('material-kit-master/assets/js/material-kit.min.js?v=3.1.0') }}" type="text/javascript"></script>
</body>

</html>

<!-- Navbar Transparent -->

<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center text-white" href="{{ route('home') }}" rel="tooltip"
            title="PP Nurul Huda">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="logo-navbar me-2">
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">a
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ms-auto">

                <li class="nav-item dropdown dropdown-hover mx-2 ms-lg-6">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuPages2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons opacity-6 me-2 text-md">dashboard</i>
                        Pages
                        <img src="{{ asset('material-kit-master/assets/img/down-arrow-white.svg') }}" alt="down-arrow"
                            class="arrow ms-auto ms-md-2 d-lg-block d-none">
                        <img src="{{ asset('material-kit-master/assets/img/down-arrow-dark.svg') }}" alt="down-arrow"
                            class="arrow ms-auto ms-md-2 d-lg-none d-block">
                    </a>
                    <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3"
                        aria-labelledby="dropdownMenuPages">
                        <div class="d-none d-lg-block">
                            <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                Landing Pages
                            </h6>
                            <a href="/" class="dropdown-item border-radius-md">
                                <span>Home</span>
                            </a>
                            <a href="/about" class="dropdown-item border-radius-md">
                                <span>About Us</span>
                            </a>
                            <a href="/contact" class="dropdown-item border-radius-md">
                                <span>Contact Us</span>
                            </a>

                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuPages2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons opacity-6 me-2 text-md">apartment</i>
                        Profle
                        <img src="{{ asset('material-kit-master/assets/img/down-arrow-white.svg') }}" alt="down-arrow"
                            class="arrow ms-auto ms-md-2 d-lg-block d-none">
                        <img src="{{ asset('material-kit-master/assets/img/down-arrow-dark.svg') }}" alt="down-arrow"
                            class="arrow ms-auto ms-md-2 d-lg-none d-block">
                    </a>
                    <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3"
                        aria-labelledby="dropdownMenuPages">
                        <div class="d-none d-lg-block">
                            <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                Page Profile
                            </h6>
                            <a href="{{ route('client.visi-misi') }}" class="dropdown-item border-radius-md">
                                <span>Visi Misi</span>
                            </a>
                            <a href="{{ route('client.sejarah') }}" class="dropdown-item border-radius-md">
                                <span>Sejarah</span>
                            </a>
                            <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
                                <span>Masyakhikh</span>
                            </a>
                        </div>

                        <div class="d-lg-none">
                            <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                Landing Pages
                            </h6>

                            <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
                                <span>Visi Misi</span>
                            </a>
                            <a href="{{ route('client.sejarah') }}" class="dropdown-item border-radius-md">
                                <span>Sejarah</span>
                            </a>
                            <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
                                <span>Masyakhikh</span>
                            </a>
                        </div>

                    </div>
                </li>
                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuBlocks"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons opacity-6 me-2 text-md">school</i>
                        Pendidikan
                        <img src="{{ asset('material-kit-master/assets/img/down-arrow-white.svg') }}" alt="down-arrow"
                            class="arrow ms-auto ms-md-2 d-lg-block d-none">
                        <img src="{{ asset('material-kit-master/assets/img/down-arrow-dark.svg') }}" alt="down-arrow"
                            class="arrow ms-auto ms-md-2 d-lg-none d-block">
                    </a>
                    <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3"
                        aria-labelledby="dropdownMenuPages">
                        <div class="d-none d-lg-block">
                            <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                Pendidikan
                            </h6>
                            <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
                                <span>Wustho</span>
                            </a>
                            <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
                                <span>Ulya</span>
                            </a>
                        </div>

                        <div class="d-lg-none">
                            <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                Pendidikan
                            </h6>

                            <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
                                <span>Wustho</span>
                            </a>
                            <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
                                <span>Ulya</span>
                            </a>
                        </div>

                    </div>
                </li>

                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuDocs"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons opacity-6 me-2 text-md">description</i>
                        Pendaftaran
                        <img src="{{ asset('material-kit-master/assets/img/down-arrow-white.svg') }}"
                            alt="down-arrow" class="arrow ms-auto ms-md-2 d-lg-block d-none">
                        <img src="{{ asset('material-kit-master/assets/img/down-arrow-dark.svg') }}" alt="down-arrow"
                            class="arrow ms-auto ms-md-2 d-lg-none d-block">
                    </a>
                    <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3"
                        aria-labelledby="dropdownMenuPages">
                        <div class="d-none d-lg-block">
                            <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
                                <span>Administrasi</span>
                            </a>
                            <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
                                <span>Informasi</span>
                            </a>
                            <a href="/pendaftaran" class="dropdown-item border-radius-md">
                                <span>Pendaftaran Online</span>
                            </a>
                        </div>

                        <div class="d-lg-none">
                            <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
                                <span>Administrasi</span>
                            </a>
                            <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
                                <span>Informasi</span>
                            </a>
                            <a href="/pendaftaran" class="dropdown-item border-radius-md">
                                <span>Pendaftaran Online</span>
                            </a>
                        </div>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- End Navbar -->

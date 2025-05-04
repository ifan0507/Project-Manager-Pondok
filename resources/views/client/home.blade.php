@extends('layouts.client.template')
@section('content')
    <section class="my-5 py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
                    <div class="rotating-card-container">
                        <div class="card card-rotate card-background card-background-mask-primary shadow-dark mt-md-0 mt-5">
                            <div class="front front-background"
                                style="background-image: url({{ asset('assets/img/brosur1.jpg') }}); background-size: cover;">
                                <div class="card-body py-7 text-center">
                                    <i class="material-symbols-rounded text-white text-4xl my-3"
                                        style="opacity: 0;">touch_app</i>
                                    <h3 class="text-white" style="opacity: 0;">Feel the <br /> Material Kit</h3>
                                    <p class="text-white " style="opacity: 0;">All the Bootstrap components that
                                        you need in a
                                        development have been re-design with the new look.</p>
                                </div>
                            </div>
                            <div class="back back-background"
                                style="background-image: url({{ asset('assets/img/brosur2.jpg') }}); background-size: cover;">
                                <div class="card-body pt-7 text-center">
                                    <h3 class="text-white" style="opacity: 0;">Discover More</h3>
                                    <p class="text-white" style="opacity: 0;"> You will save a lot of time going
                                        from
                                        prototyping to full-functional code because all elements are implemented.</p>
                                    <a href="/pendaftaran" class="btn btn-white btn-sm w-50 mx-auto mt-3">Daftar
                                        Sekarang!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 ms-auto">
                    <div class="row justify-content-start">
                        <div class="col-md-12">
                            <a href="">
                                <div class="info">
                                    @foreach ($beritas as $berita)
                                        <a href="{{ route('detailBerita') }}"
                                            style="text-decoration: none; color: black; transition: text-decoration 0.3s ease;"
                                            onmouseover="this.style.textDecoration='underline';"
                                            onmouseout="this.style.textDecoration='none';">
                                            {{-- <i
                                            class="material-symbols-rounded text-gradient text-success text-3xl">announcement</i> --}}
                                            <h5 class="font-weight-bolder mt-3">{{ $berita->judul }}</h5>
                                            <p class="pe-5">{{ $berita->deskription }}</p>
                                        </a>
                                    @endforeach
                                </div>
                            </a>
                        </div>


                        {{-- <div class="col-md-6 mt-3">
                            <i class="material-symbols-rounded text-gradient text-success text-3xl">price_change</i>
                            <h5 class="font-weight-bolder mt-3">Save Time & Money</h5>
                            <p class="pe-5">Creating your design from scratch with dedicated designers can be very
                                expensive. Start with our Design System.</p>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="info">
                                <i class="material-symbols-rounded text-gradient text-success text-3xl">devices</i>
                                <h5 class="font-weight-bolder mt-3">Fully Responsive</h5>
                                <p class="pe-3">Regardless of the screen size, the website content will naturally fit the
                                    given resolution.</p>
                            </div>
                        </div> --}}
                    </div>
                    {{-- <div class="row justify-content-start">
                        <div class="col-md-12">
                            <div class="info">
                                <a href=""
                                    style="text-decoration: none; color: black; transition: text-decoration 0.3s ease;"
                                    onmouseover="this.style.textDecoration='underline';"
                                    onmouseout="this.style.textDecoration='none';">
                                     <h5 class="font-weight-bolder mt-3">Pondok Pesantren Nurul Huda Gelar Kegiatan Sosial
                                        untuk
                                        Masyarakat Sekitar</h5>
                                    <p class="pe-3">Karawang, 12 Desember 2024 – Pondok Pesantren Nurul Huda baru-baru ini
                                        mengadakan acara sosial berupa pembagian sembako kepada warga sekitar yang
                                        membutuhkan.
                                        Kegiatan ini digelar di halaman pondok pada hari Sabtu (9/12) dengan tujuan untuk
                                        meningkatkan kepedulian sosial dan mempererat hubungan antara pondok pesantren dan
                                        masyarakat.</p>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection

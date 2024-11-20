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
                                    <a href=".//sections/page-sections/hero-sections.html" target="_blank"
                                        class="btn btn-white btn-sm w-50 mx-auto mt-3">Daftar Sekarang!</a>
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
                                    <i class="material-symbols-rounded text-gradient text-success text-3xl">content_copy</i>
                                    <h5 class="font-weight-bolder mt-3">Berita Terbaru</h5>
                                    <p class="pe-5">Built by developers for developers. Check the foundation and you will
                                        find
                                        everything inside our documentation.bvksvdbvbsvbslbv sbvbvlbvbsbv sabhb
                                        sbvksbvabvkabvhkdbvhkbahvsbhabvbhvbhsbvhkbvhbsvhbshvbsdhvbdshvbdvbwirvbhwbvi</p>
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
                    <div class="row justify-content-start">
                        <div class="col-md-12">
                            <div class="info">
                                <i class="material-symbols-rounded text-gradient text-success text-3xl">flip_to_front</i>
                                <h5 class="font-weight-bolder mt-3">Bootstrap 5 Ready</h5>
                                <p class="pe-3">The world’s most popular front-end open source toolkit, featuring Sass
                                    variables and mixins.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

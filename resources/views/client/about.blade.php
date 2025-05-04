@extends('layouts.client.template')
@section('content')
    <!-- Section with four info areas left & one card right with image and waves -->
    <section class="py-7">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="info">
                                <h5 class="text-3xl text-gradient text-info mb-3">About</h5>
                                <h5>PONDOK PESANTREN NURUL HUDA</h5>
                                <p>Pondok Pesantren Nurul Huda adalah lembaga pendidikan Islam yang berkomitmen untuk
                                    mencetak generasi muda yang berilmu, berakhlak mulia, dan bertakwa kepada Allah SWT.
                                    Sebagai lembaga pendidikan berbasis pesantren, PP Nurul Huda memadukan antara tradisi
                                    keilmuan Islam klasik dan pendekatan pendidikan modern yang sesuai dengan kebutuhan
                                    zaman.

                                    Didirikan dengan tujuan mulia untuk menyebarkan ilmu agama dan membentuk karakter
                                    islami, Pondok Pesantren Nurul Huda tidak hanya menjadi pusat pendidikan tetapi juga
                                    rumah kedua bagi para santri. Lingkungan yang asri, penuh kedamaian, serta jauh dari
                                    hiruk-pikuk kota memberikan kenyamanan bagi santri untuk menuntut ilmu, memperbaiki
                                    diri, dan mengembangkan potensi mereka.

                                    Pondok Pesantren Nurul Huda berdiri di atas landasan nilai-nilai keikhlasan,
                                    kemandirian, kebersamaan, dan keteladanan, yang senantiasa diajarkan dan ditanamkan
                                    kepada setiap santri dalam keseharian mereka.</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 ms-auto mt-lg-0 mt-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative mt-2 mx-2 z-index-2">
                            <a class="d-block blur-shadow-image">
                                <img src="{{ asset('assets/img/sekolah.jpg') }}" alt="img-colored-shadow"
                                    class="img-fluid border-radius-lg">
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="font-weight-normal">
                                <a href="javascript:;">Sekolah</a>
                            </h5>
                            <p class="mb-0">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit amet vero a vel doloribus iure
                                architecto consequuntur in quod laudantium impedit et unde modi culpa, delectus sunt
                                quibusdam qui blanditiis.
                            </p>
                            {{-- <button type="button" class="btn bg-gradient-info btn-sm mb-0 mt-3">Find out more</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="pb-5 position-relative bg-gradient-dark mx-n3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-start mb-5 mt-5">
                    <h3 class="text-white z-index-1 position-relative">Dokumentasi Kegiatan</h3>
                    <p class="text-white opacity-8 mb-0">There’s nothing I really wanted to do in life that I wasn’t able to
                        get good at. That’s my skill.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="card card-profile mt-4">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                <a href="javascript:;">
                                    <div class="p-3 pe-md-0">
                                        <img class="w-100 border-radius-md shadow-lg"
                                            src="{{ asset('assets/img/dokumentasi1.jpg') }}" alt="image">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-8 col-md-6 col-12 my-auto">
                                <div class="card-body ps-lg-0">
                                    <h5 class="mb-0">ujian Madin putri</h5>

                                    <p class="mb-0">ujian kenaikan kelas madrasah diniyah nurul huda putri</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="card card-profile mt-lg-4 mt-5">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                <a href="javascript:;">
                                    <div class="p-3 pe-md-0">
                                        <img class="w-100 border-radius-md shadow-lg" src="{{ asset('assets/img/d2.jpg') }}"
                                            alt="image">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-8 col-md-6 col-12 my-auto">
                                <div class="card-body ps-lg-0">
                                    <h5 class="mb-0">ujian Madin Putra</h5>
                                    <p class="mb-0">ujian kenaikan kelas madrasah diniyah nurul huda putra</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6 col-12">
                    <div class="card card-profile mt-4 z-index-2">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                <a href="javascript:;">
                                    <div class="p-3 pe-md-0">
                                        <img class="w-100 border-radius-md shadow-lg"
                                            src="{{ asset('assets/img/dokumentasi3.jpg') }}" alt="image">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-8 col-md-6 col-12 my-auto">
                                <div class="card-body ps-lg-0">
                                    <h5 class="mb-0">Kegiatan Alumni</h5>

                                    <p class="mb-0">kegitan rutin khotmil quran di pesarean masyayik</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="card card-profile mt-lg-4 mt-5 z-index-2">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                <a href="javascript:;">
                                    <div class="p-3 pe-md-0">
                                        <img class="w-100 border-radius-md shadow-lg"
                                            src="{{ asset('assets/img/dokumentasi9.jpg') }}" alt="image">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-8 col-md-6 col-12 my-auto">
                                <div class="card-body ps-lg-0">
                                    <h5 class="mb-0">rutinan kitab sullam taufik</h5>
                                    <p class="mb-0">dilaksanakan 1 bulan 1x setiap minggu pahing dilakukan para alumni</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- END Section with four info areas left & one card right with image and waves -->


    <!-- -------- START Features w/ pattern background & stats & rocket -------- -->
    {{-- Dokumentasi Kegiatan --}}

    <!-- -------- END Features w/ pattern background & stats & rocket -------- -->


    {{-- <section class="pt-4 pb-6" id="count-stats">
      <div class="container">
        <div class="row mb-7">
          <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-7" src="../assets/img/logos/gray-logos/logo-coinbase.svg" alt="logo">
          </div>
          <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-7" src="../assets/img/logos/gray-logos/logo-nasa.svg" alt="logo">
          </div>
          <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-7" src="../assets/img/logos/gray-logos/logo-netflix.svg" alt="logo">
          </div>
          <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-7" src="../assets/img/logos/gray-logos/logo-pinterest.svg" alt="logo">
          </div>
          <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-7" src="../assets/img/logos/gray-logos/logo-spotify.svg" alt="logo">
          </div>
          <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-7" src="../assets/img/logos/gray-logos/logo-vodafone.svg" alt="logo">
          </div>
        </div>
        <div class="row justify-content-center text-center">
          <div class="col-md-3">
            <h1 class="text-gradient text-info" id="state1" countTo="5234">0</h1>
            <h5>Projects</h5>
            <p>Of “high-performing” level are led by a certified project manager</p>
          </div>
          <div class="col-md-3">
            <h1 class="text-gradient text-info"><span id="state2" countTo="3400">0</span>+</h1>
            <h5>Hours</h5>
            <p>That meets quality standards required by our users</p>
          </div>
          <div class="col-md-3">
            <h1 class="text-gradient text-info"><span id="state3" countTo="24">0</span>/7</h1>
            <h5>Support</h5>
            <p>Actively engage team members that finishes on time</p>
          </div>
        </div>
      </div>
    </section> --}}
    <!-- -------- START PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->
    {{-- <section class="my-5 pt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 m-auto">
            <h4>Be the first to see the news</h4>
            <p class="mb-4">
              Your company may not be in the software business,
              but eventually, a software company will be in your business.
            </p>
            <div class="row">
              <div class="col-8">
                <div class="input-group input-group-outline">
                  <label class="form-label">Email Here...</label>
                  <input type="text" class="form-control mb-sm-0">
                </div>
              </div>
              <div class="col-4 ps-0">
                <button type="button" class="btn bg-gradient-info mb-0 h-100 position-relative z-index-2">Subscribe</button>
              </div>
            </div>
          </div>
          <div class="col-md-5 ms-auto">
            <div class="position-relative">
              <img class="max-width-50 w-100 position-relative z-index-2" src="../assets/img/macbook.png" alt="image">
            </div>
          </div>
        </div>
      </div>
    </section> --}}
    <!-- -------- END PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->
@endsection

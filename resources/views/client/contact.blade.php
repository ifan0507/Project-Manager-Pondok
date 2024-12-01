@extends('layouts.client.template')
@section('contact')
<section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
            <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" 
                 style="background-image: url('{{ asset('assets/img/dokumentasi1.jpg') }}'); background-size: cover;" 
                 loading="lazy">
            </div>
          </div>
          <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
            <div class="card d-flex blur justify-content-center shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
              <div class="card-header p-0 position-relative mt-2 mx-2 z-index-2 bg-transparent">
                <div class="bg-dark shadow-dark border-radius-md p-3">
                  <h5 class="text-white text-primary mb-0">Contact us</h5>
                  <p class="text-white text-sm mb-0"> Sampaikan Pesan Anda</p>
                </div>
              </div>
              <div class="card-body">
                <p class="pb-3">
                    Terima kasih atas minat Anda. Silakan isi formulir di bawah ini untuk menghubungi kami.
                </p>
                <form id="contact-form" method="post" autocomplete="off">
                  <div class="card-body p-0 my-3">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                          <label>Nama Lengkap</label>
                          <input type="text" class="form-control" placeholder="Nama Lengkap">
                        </div>
                      </div>
                      <div class="col-md-6 ps-md-2">
                        <div class="input-group input-group-static mb-4">
                          <label>Email</label>
                          <input type="email" class="form-control" placeholder="Masukan Email Anda">
                        </div>
                      </div>
                    </div>
                    <div class="form-group mb-0 mt-md-0 mt-4">
                      <div class="input-group input-group-static mb-4">
                        <label>Apa ada yang bisa kami bantu?</label>
                        <textarea name="message" class="form-control" id="message" rows="6" placeholder="Sampaikan Pesan Anda"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <button type="submit" class="btn bg-gradient-dark mt-3 mb-0">Submit</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

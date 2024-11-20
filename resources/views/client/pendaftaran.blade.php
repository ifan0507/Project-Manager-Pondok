@extends('layouts.client.template')
@section('content')
    <section>
        <div class="page-header ">
            <div class="container">
                <div class="row">
                    <div class=" d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                        <div class="card d-flex blur justify-content-center shadow-lg my-sm-0 my-sm-4 mt-4 mb-4">
                            <div
                                class="card-header
                            p-0 position-relative mt-2 mx-2 z-index-2 bg-transparent">
                                <div class="bg-gradient-success shadow-dark border-radius-md p-3">
                                    <h5 class="text-white text-primary mb-0">Form Pendaftaran</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="contact-form" method="post" autocomplete="off">
                                    <div class="card-body p-0 my-3">
                                        <div class="row">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">No Pendaftaran</label>
                                                            <input class="form-control" aria-label="" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">Tanggal Daftar</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                aria-label="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="exampleFormControlSelect1">
                                                                <option disabled selected class="form-label">Tahun Pelajaran
                                                                </option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">NIS</label>
                                                            <input class="form-control" aria-label="" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">NISN</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                aria-label="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">NIK</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                aria-label="">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn bg-gradient-success mt-3 mb-0">Send
                                                        Message</button>
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
        </div>
    </section>
@endsection

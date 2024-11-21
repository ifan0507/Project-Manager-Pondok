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
                                                            <input class="form-control" name="no_daftar" id="no_daftar"
                                                                aria-label="" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">Tanggal Daftar</label>
                                                            <input type="text" class="form-control" name=""
                                                                placeholder="" aria-label="">
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
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">NIS</label>
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
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">NISN</label>
                                                            <input class="form-control" aria-label="" type="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">Nama Lengkap</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                aria-label="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="exampleFormControlSelect1">
                                                                <option disabled selected class="form-label">Jenis Kelamin
                                                                </option>
                                                                <option>Laki-Laki</option>
                                                                <option>Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">Tempat Lahir</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                aria-label="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 ps-2 mb-4">
                                                        <div class="input-group input-group-static">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-calendar"></i></span>
                                                            <input class="form-control datepicker"
                                                                placeholder="Tanggal Lahir" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="exampleFormControlSelect1">
                                                                <option disabled selected class="form-label">Provinsi
                                                                </option>
                                                                <option>Laki-Laki</option>
                                                                <option>Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="exampleFormControlSelect1">
                                                                <option disabled selected class="form-label">Kabupaten
                                                                </option>
                                                                <option>Laki-Laki</option>
                                                                <option>Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-2 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="exampleFormControlSelect1">
                                                                <option disabled selected class="form-label">Kecamatan
                                                                </option>
                                                                <option>Laki-Laki</option>
                                                                <option>Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="exampleFormControlSelect1">
                                                                <option disabled selected class="form-label">Desa
                                                                </option>
                                                                <option>Laki-Laki</option>
                                                                <option>Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="input-group input-group-dynamic mb-3">
                                                            <label class="form-label">Alamat</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                aria-label="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 mb-3">
                                                        <div class="input-group input-group-dynamic mb-3">
                                                            <label class="form-label">RT</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                aria-label="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 mb-3">
                                                        <div class="input-group input-group-dynamic mb-3">
                                                            <label class="form-label">RW</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                aria-label="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <h6 class="">Informasi Orang Tua Santri</h6>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">Nama Ayah</label>
                                                            <input class="form-control" aria-label="" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">Nama Ibu</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                aria-label="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">No Hp Yang Bisa dihubungi</label>
                                                            <input class="form-control" aria-label="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <button type="submit"
                                                            class="btn bg-gradient-success mt-3 mb-0">Send
                                                            Message</button>
                                                    </div>
                                                </div>
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
    <script>
        if (document.querySelector(".datepicker")) {
            // Initialize flatpickr on the input with class "datepicker"
            flatpickr(".datepicker", {
                // Configuration options
                dateFormat: "d/m/Y", // Format date as dd/mm/yyyy
                allowInput: true, // Allow manual input
                defaultDate: null, // No default date, placeholder remains
                altInput: true, // Show alternate input with human-friendly date
                altFormat: "F j, Y", // Format for alternate input
            });
        }
    </script>
@endsection

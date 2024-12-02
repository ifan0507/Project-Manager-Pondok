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
                                <form id="pendaftaran-form" method="post" autocomplete="off" action="/pendaftaran">
                                    @csrf
                                    <div class="card-body p-0 my-3">
                                        <div class="row">
                                            <div class="card-body">

                                                {{-- INFO PRIBADI SANTRI --}}
                                                <h6 class="">Informasi Pribadi Santri</h6>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-static mb-4">
                                                            <label>No Pendaftaran</label>
                                                            <input type="text" class="form-control" id="no_daftar"
                                                                name="no_daftar" value="{{ $no_daftar }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-static mb-4">
                                                            <label>NIS</label>
                                                            <input type="text" class="form-control" id="nis"
                                                                name="nis" value="{{ $nis }}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-static mb-4">
                                                            <label>Tanggal Daftar</label>
                                                            <input type="text" class="form-control" name="tgl_daftar"
                                                                id="tgl_daftar" placeholder="" aria-label=""
                                                                value="{{ $tgl_daftar }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="thn_pelajaran"
                                                                name="thn_pelajaran" required>
                                                                <option disabled selected class="form-label">Tahun Pelajaran
                                                                </option>
                                                                <option value="2024/2025">2024/2025</option>
                                                                <option value="2023/2024">2023/2024</option>
                                                                <option value="2022/2023">2022/2023</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">NISN</label>
                                                            <input type="text" class="form-control" name="nisn"
                                                                id="nisn" aria-label="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">NIK</label>
                                                            <input class="form-control" name="nik" id="nik"
                                                                aria-label="" type="text" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">Nama Lengkap</label>
                                                            <input type="text" class="form-control" name="name"
                                                                id="name" placeholder="" aria-label="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="jenis_kelamin"
                                                                name="jenis_kelamin" required>
                                                                <option disabled selected class="form-label">Jenis Kelamin
                                                                </option>
                                                                <option value="Laki-Laki">Laki-Laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">Tempat Lahir</label>
                                                            <input type="text" class="form-control" name="tmp_lahir"
                                                                id="tmp_lahir" aria-label="" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 ps-2 mb-4">
                                                        <div class="input-group input-group-static">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-calendar"></i></span>
                                                            <input class="form-control datepicker" name="tgl_lahir"
                                                                id="tgl_lahir" placeholder="Tanggal Lahir" type="text"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4" id="div_prov">
                                                            @php
                                                                $provinsi = Http::get(
                                                                    'https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json',
                                                                );
                                                                $provinces = json_decode($provinsi);
                                                            @endphp
                                                            <select class="form-control" id="provinsi" name="provinsi"
                                                                required style="font-size: 0.8rem;" onchange="prov(this)">
                                                                <option disabled selected class="form-label"
                                                                    value="">Provinsi
                                                                </option>
                                                                @foreach ($provinces as $province)
                                                                    <option value="{{ $province->name }}"
                                                                        data-id="{{ $province->id }}">
                                                                        {{ $province->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="kabupaten" name="kabupaten"
                                                                required onchange="kab(this)" onclick="pilProv(this)"
                                                                style="font-size: 0.8rem;">
                                                                <option disabled selected class="form-label"
                                                                    value="">Kabupaten
                                                                </option>
                                                            </select>
                                                            <input type="hidden" id="kabupaten_id" name="kab_id">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-2 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="kecamatan" name="kecamatan"
                                                                required onchange="kec(this)" onclick="pilKab(this)"
                                                                style="font-size: 0.8rem;">
                                                                <option disabled selected class="form-label"
                                                                    value="">Kecamatan
                                                                </option>
                                                            </select>
                                                            <input type="hidden" id="kecamatan_id" name="kec_id">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="desa" name="desa"
                                                                required onclick="pilKec(this)"
                                                                style="font-size: 0.8rem;">
                                                                <option disabled selected class="form-label">Desa
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <div class="input-group input-group-dynamic mb-3">
                                                            <label class="form-label">Alamat</label>
                                                            <input type="text" class="form-control" name="alamat"
                                                                id="alamat" placeholder="" aria-label="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 mb-3">
                                                        <div class="input-group input-group-dynamic mb-3">
                                                            <label class="form-label">RT</label>
                                                            <input type="text" class="form-control" name="rt"
                                                                id="rt" aria-label="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 mb-3">
                                                        <div class="input-group input-group-dynamic mb-3">
                                                            <label class="form-label">RW</label>
                                                            <input type="text" class="form-control" name="rw"
                                                                id="rw" aria-label="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- INFO ORTU SANTRI --}}
                                                <h6 class="">Informasi Orang Tua Santri</h6>
                                                {{-- AYAH --}}
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">No KK</label>
                                                            <input class="form-control" aria-label="" name="no_kk"
                                                                id="no_kk" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">Nama Ayah</label>
                                                            <input type="text" class="form-control" name="ayah"
                                                                id="ayah" placeholder="" aria-label="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">No KTP Ayah</label>
                                                            <input class="form-control" aria-label="" name="no_ktp_ayah"
                                                                id="no_ktp_ayah" type="text" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="pendidikan_ayah"
                                                                name="pendidikan_ayah" required>
                                                                <option disabled selected class="form-label">Pendidikan
                                                                    Ayah
                                                                </option>
                                                                <option value="tidak_tamat_sd/sederajat">TIDAK TAMAT
                                                                    SD/SEDERAJAT</option>
                                                                <option value="tamat_sd/sederajat">TAMAT SD/SEDERAJAT
                                                                </option>
                                                                <option value="tamat_smp/sederajat">TAMAT SMP/SEDERAJAT
                                                                </option>
                                                                <option value="tamat_sma/sederajat">TAMAT SMA/SEDERAJAT
                                                                </option>
                                                                <option value="diploma">DIPLOMA</option>
                                                                <option value="'sarjana">SARJANA</option>
                                                                <option value="lainnya">LAINNYA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="pekerjaan_ayah"
                                                                name="pekerjaan_ayah" required>
                                                                <option disabled selected class="form-label">Pekerjaan Ayah
                                                                </option>
                                                                <option value="wiraswasta">Wiraswasta</option>
                                                                <option value="petani">Petani</option>
                                                                <option value="lainnya">Lainnya</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- IBU --}}
                                                <div class="row">
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">Nama Ibu</label>
                                                            <input type="text" class="form-control" name="ibu"
                                                                id="ibu" placeholder="" aria-label="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">No KTP Ibu</label>
                                                            <input class="form-control" aria-label="" name="no_ktp_ibu"
                                                                id="no_ktp_ibu" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="pendidikan_ibu"
                                                                name="pendidikan_ibu" required>
                                                                <option disabled selected class="form-label">Pendidikan Ibu
                                                                </option>
                                                                <option value="tidak_tamat_sd/sederajat">TIDAK TAMAT
                                                                    SD/SEDERAJAT</option>
                                                                <option value="tamat_sd/sederajat">TAMAT SD/SEDERAJAT
                                                                </option>
                                                                <option value="tamat_smp/sederajat">TAMAT SMP/SEDERAJAT
                                                                </option>
                                                                <option value="tamat_sma/sederajat">TAMAT SMA/SEDERAJAT
                                                                </option>
                                                                <option value="diploma">DIPLOMA</option>
                                                                <option value="'sarjana">SARJANA</option>
                                                                <option value="lainnya">LAINNYA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-6 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="pekerjaan_ibu"
                                                                name="pekerjaan_ibu" required>
                                                                <option disabled selected class="form-label">Pekerjaan Ibu
                                                                </option>
                                                                <option value="wiraswasta">Wiraswasta</option>
                                                                <option value="petani">Petani</option>
                                                                <option value="ibu_rumah_tangga">Ibu Rumah Tangga</option>
                                                                <option value="lainnya">Lainnya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">No Telpon Yang Bisa Dihubungi</label>
                                                            <input class="form-control" aria-label="" name="no_tlp"
                                                                id="no_tlp" type="text" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- RIWAYAT PENDIDIKAN SANTRI --}}
                                                <h6 class="">Riwayat Pendidikan Santri</h6>
                                                <div class="row">
                                                    <div class="col-md-6 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="pendidikan_santri"
                                                                name="pendidikan_santri" required>
                                                                <option disabled selected class="form-label">Pendidikan
                                                                    Terakhir Santri
                                                                </option>
                                                                <option value="tidak_tamat_sd/sederajat">TIDAK TAMAT
                                                                    SD/SEDERAJAT</option>
                                                                <option value="tamat_sd/sederajat">TAMAT SD/SEDERAJAT
                                                                </option>
                                                                <option value="tamat_smp/sederajat">TAMAT SMP/SEDERAJAT
                                                                </option>
                                                                <option value="tamat_sma/sederajat">TAMAT SMA/SEDERAJAT
                                                                </option>
                                                                <option value="diploma">DIPLOMA</option>
                                                                <option value="'sarjana">SARJANA</option>
                                                                <option value="lainnya">LAINNYA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <di class="col-md-6 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">Asal Sekolah</label>
                                                            <input class="form-control" aria-label=""
                                                                name="asal_sekolah" id="asal_sekolah" type="text"
                                                                required>
                                                        </div>
                                                    </di>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="thn_lulus" name="thn_lulus"
                                                                required>
                                                                <option disabled selected class="form-label">Tahun
                                                                    Lulus
                                                                </option>
                                                                <option value="2024/2025">2024/2025</option>
                                                                <option value="2023/2024">2023/2024</option>
                                                                <option value="2022/2023">2022/2023</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ps-2">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" id="daftar_kelas"
                                                                name="daftar_kelas" required>
                                                                <option disabled selected class="form-label">Daftar
                                                                    Kelas
                                                                </option>
                                                                <option value="1ibtidyah">1 IBTIDYAH</option>
                                                                <option value="2tsanawiyah">2 TSANAWIYAH</option>
                                                                <option value="1ibtidyah">1 IBTIDYAH</option>
                                                                <option value="2tsanawiyah">2 TSANAWIYAH</option>
                                                                <option value="3ibtidyah">3 IBTIDYAH</option>
                                                                <option value="3tsanawiyah">3 TSANAWIYAH</option>
                                                                <option value="4tsanawiyah">4 TSANAWIYAH</option>
                                                                <option value="idadiyah">I'DADIYAH</option>
                                                                <option value="musyawirin">MUSYAWIRIN</option>
                                                                <option value="lainnya">LAINNYA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- BUTTON KIRIM --}}
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <button type="submit" id="btn-daftar"
                                                            class="btn bg-gradient-success mt-3 mb-0">Daftar!</button>
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
            flatpickr(".datepicker", {
                dateFormat: "Y-m-d", // Format date as dd/mm/yyyy
                allowInput: true, // Allow manual input
                defaultDate: null, // No default date, placeholder remains
                altInput: true, // Show alternate input with human-friendly date
                altFormat: "F j, Y", // Format for alternate input
            });
        }


        async function pilProv() {
            const provinsi = document.getElementById('provinsi');
            if (provinsi.value === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Silahkan pilih provinsi terlebih dahulu!',
                })
            }
        }

        // untuk validasi kecamatan
        function pilKab() {
            const kabupaten = document.getElementById('kabupaten');
            if (kabupaten.value === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Silahkan pilih kabupaten terlebih dahulu!',
                })
            }
        }

        // validasi kecamatan
        function pilKec() {
            const kecamatan = document.getElementById('kecamatan');
            if (kecamatan.value === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Silahkan pilih kecamatan terlebih dahulu!',
                })
            }
        }

        async function prov(e) {
            const kabupatenSelect = document.getElementById('kabupaten');
            const selectedOption = e.options[e.selectedIndex];
            const provinceId = selectedOption.getAttribute('data-id');


            try {
                const response = await fetch(`/api/kabupaten/${provinceId}`);
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                const data = await response.json();

                data.forEach(kabupaten => {
                    const option = document.createElement('option');
                    option.value = kabupaten.name;
                    option.dataset.id = kabupaten.id;
                    option.textContent = kabupaten.name;
                    kabupatenSelect.appendChild(option);
                });

            } catch (error) {
                console.error('Error fetching kabupaten:', error);
            }
        }

        async function kab(e) {
            const kecamatanSelect = document.getElementById('kecamatan');
            const selectedOption = e.options[e.selectedIndex];
            const kabupatenId = selectedOption.getAttribute('data-id');
            const kab_id = document.getElementById('kabupaten_id');
            kab_id.value = kabupatenId;


            try {
                const response = await fetch(`/api/kecamatan/${kabupatenId}`);
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                const data = await response.json();

                data.forEach(kecamatan => {
                    const option = document.createElement('option');
                    option.value = kecamatan.name;
                    option.dataset.id = kecamatan.id;
                    option.textContent = kecamatan.name;
                    kecamatanSelect.appendChild(option);
                });
            } catch (error) {
                console.error('Error fetching kecamatan:', error);
            }
        }


        async function kec(e) {
            const desaSelect = document.getElementById('desa');
            const selectedOption = e.options[e.selectedIndex];
            const kecamatanId = selectedOption.getAttribute('data-id');;
            const kec_id = document.getElementById('kecamatan_id');
            kec_id.value = kecamatanId;

            fetch(`/api/desa/${kecamatanId}`).then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    data.forEach(desa => {
                        const option = document.createElement('option');
                        option.value = desa.name;
                        option.textContent = desa.name;
                        desaSelect.appendChild(option);
                    });
                })
        }
    </script>
@endsection

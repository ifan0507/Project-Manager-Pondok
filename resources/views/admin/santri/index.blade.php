@extends('layouts.template')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" style="background-color: #060d51; color: white">
                                        Tambah Santri
                                    </button>

                                    <!-- Input Pencarian -->
                                    <div class="input-group input-group-sm" style="max-width: 300px;">
                                        <input type="search" class="form-control" placeholder="Search Nis, Nik, Nama..."
                                            id="search" name="search" aria-label="Pencarian">
                                        <button type="submit" class="btn btn-outline-secondary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead style="border-bottom:0;">
                                        <tr style="border-bottom:0;">
                                            <th style="border-bottom:0;">Nis</th>
                                            <th style="border-bottom:0;">Nik</th>
                                            <th style="border-bottom:0;">Nama Lengkap</th>
                                            <th style="border-bottom:0;">Jenis Kelamin</th>
                                            <th style="width: 15px; border-bottom:0;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="santriTableBody">
                                        @forelse ($santris as $santri)
                                            <tr>
                                                <td>{{ $santri->nis }}</td>
                                                <td>{{ $santri->nik }}</td>
                                                <td>{{ $santri->nama }}</td>
                                                <td>{{ $santri->jenis_kelamin }}</td>
                                                <td>
                                                    <div class="d-inline-flex gap-2">
                                                        <button type="button" class="btn-edit btn btn-sm"
                                                            style="background-color: #060d51; color: white"
                                                            data-id="{{ $santri->id }}"><i
                                                                class="fa-regular fa-pen-to-square"></i></button>
                                                        <form action="{{ route('santri.delete', ['id' => $santri->id]) }}"
                                                            method="post" id="form-delete" class="form-delete m-0">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" name="btn-hapus"
                                                                style="background-color: #060d51; color: white"
                                                                class="btn-hapus btn btn-sm"><i
                                                                    class="fa-solid fa-trash-can"></i></button>
                                                        </form>
                                                        <button type="button" class="btn-detail btn btn-sm"
                                                            style="background-color: #060d51; color: white"
                                                            data-id="{{ $santri->id }}"><i
                                                                class="fa-solid fa-circle-info"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    <p>Tidak ada data</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $santris->links() }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>


    <!-- Modal Tamabah-->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #060d51; color: white">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Santri</h5>
                    <button type="button" class="btn-close  btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form action="/santri/save" method="post" id="form-modal">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="no_daftar" class="col-form-label">No Pendaftaran</label>
                                    <input type="text" class="form-control" id="no_daftar" name="no_daftar"
                                        value="{{ $noDaftar }}" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="tgl_daftar" class="col-form-label">Tanggal Daftar</label>
                                    <input type="text" class="form-control" name="tgl_daftar" id="tgl_daftar"
                                        placeholder="" value="{{ $tglDaftar }}" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="thn_pelajaran" class="col-form-label">Tahun Pelajaran <span
                                            class="required" style="color:red">*</span></label>
                                    <select class="form-select" aria-label=".form-select-sm example" id="thn_pelajaran"
                                        name="thn_pelajaran">
                                        <option disabled selected value="">Pilih Tahun Pelajaran</option>
                                        <option value="2024/2025">2024/2025</option>
                                        <option value="2023/2024">2023/2024</option>
                                        <option value="2022/2023">2022/2023</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- NIS -->
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nis" class="col-form-label">NIS</label>
                                    <input type="text" class="form-control" id="nis" name="nis"
                                        value="{{ $nis }}" readonly>
                                </div>
                            </div>
                            <!-- NISN -->
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nisn" class="col-form-label">NISN <span class="required"
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="nisn" name="nisn">
                                </div>
                            </div>
                            {{-- NIK --}}
                            <div class="col">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="nik" class="col-form-label">NIK <span class="required"
                                                style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="nik" name="nik">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Nama Lengkap -->
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Nama Lengkap <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_l"
                                    value="Laki-Laki" checked>
                                <label class="form-check-label" for="jenis_kelamin_l">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_p"
                                    value="Perempuan">
                                <label class="form-check-label" for="jenis_kelamin_p">Perempuan</label>
                            </div>
                        </div>

                        <!-- Tempat & Tanggal Lahir -->
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="tmp_lahir" class="col-form-label">Tempat Lahir <span class="required"
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="tgl_lahir" class="col-form-label">Tanggal Lahir <span class="required"
                                            style="color:red">*</span></label>
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                                </div>
                            </div>
                        </div>

                        <!-- Provinsi, Kabupaten, Kecamatan, Desa -->
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    @php
                                        $provinsi = Http::get(
                                            'https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json',
                                        );
                                        $provinces = json_decode($provinsi);
                                    @endphp
                                    <label for="provinsi" class="col-form-label">Provinsi <span class="required"
                                            style="color:red">*</span></label>
                                    <select class="form-select" name="provinsi" id="provinsi"
                                        onchange="prov(this);resetErrorProv(this)">
                                        <option value="" disabled selected>Pilih Provinsi</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->name }}" data-id="{{ $province->id }}">
                                                {{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="validation-provinsi" class="invalid-feedback">Pilih provinsi terlebih dahulu.
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="kabupaten" class="col-form-label">Kabupaten <span class="required"
                                            style="color:red">*</span></label>
                                    <select class="form-select" name="kabupaten" id="kabupaten" onclick="pilProv(this)"
                                        onchange="kab(this);resetErrorKab(this)">
                                        <option value="" disabled selected>Pilih Kabupaten</option>
                                    </select>
                                    <input type="hidden" id="kabupaten_id" name="kab_id">
                                    <div id="validation-kabupaten" class="invalid-feedback">Pilih kabupaten terlebih
                                        dahulu.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="kecamatan" class="col-form-label">Kecamatan <span class="required"
                                            style="color:red">*</span></label>
                                    <select class="form-select" name="kecamatan" id="kecamatan" onclick="pilKab(this)"
                                        onchange="kec(this);resetErrorKec(this)">
                                        <option value="" disabled selected>Pilih Kecamatan</option>
                                    </select>
                                    <input type="hidden" id="kecamatan_id" name="kec_id">
                                    <div id="validation-kecamatan" class="invalid-feedback">Pilih kecamatan terlebih
                                        dahulu.</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="desa" class="col-form-label">Desa <span class="required"
                                            style="color:red">*</span></label>
                                    <select class="form-select" name="desa" id="desa" onclick="pilKec(this)">
                                        <option value="" disabled selected>Pilih Desa</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <!-- Alamat -->
                        <div class="mb-3">
                            <label for="alamat" class="col-form-label">Alamat <span class="required"
                                    style="color:red">*</span></label>
                            <textarea class="form-control" id="alamat" name="alamat"></textarea>
                        </div>

                        <!-- RT & RW -->
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="rt" class="col-form-label">RT <span class="required"
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="rt" name="rt">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="rw" class="col-form-label">RW <span class="required"
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="rw" name="rw">
                                </div>
                            </div>
                        </div>

                        <!-- Nomor KK -->
                        <div class="mb-3">
                            <label for="no_kk" class="col-form-label">Nomor KK <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="no_kk" name="no_kk">
                        </div>

                        <!-- Data Ayah -->
                        <div class="mb-3">
                            <label for="ayah" class="col-form-label">Nama Ayah <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="ayah" name="ayah">
                        </div>
                        <div class="mb-3">
                            <label for="no_ktp_ayah" class="col-form-label">No KTP Ayah <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="no_ktp_ayah" name="no_ktp_ayah">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pendidikan_ayah" class="col-form-label">Pendidikan Ayah <span
                                            class="required" style="color:red">*</span></label>
                                    <select class="form-select" id="pendidikan_ayah" name="pendidikan_ayah" required>
                                        <option disabled selected class="form-label" value="">Pendidikan
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
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pekerjaan_ayah" class="col-form-label">Pekerjaan Ayah <span
                                            class="required" style="color:red">*</span></label>
                                    <select class="form-select" id="pekerjaan_ayah" name="pekerjaan_ayah" required>
                                        <option disabled selected class="form-label" value="">Pekerjaan Ayah
                                        </option>
                                        <option value="wiraswasta">Wiraswasta</option>
                                        <option value="petani">Petani</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Data Ibu -->
                        <div class="mb-3">
                            <label for="ibu" class="col-form-label">Nama Ibu <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="ibu" name="ibu">
                        </div>
                        <div class="mb-3">
                            <label for="no_ktp_ibu" class="col-form-label">No KTP Ibu <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="no_ktp_ibu" name="no_ktp_ibu">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pendidikan_ibu" class="col-form-label">Pendidikan Ibu <span
                                            class="required" style="color:red">*</span></label>
                                    <select class="form-select" id="pendidikan_ibu" name="pendidikan_ibu" required>
                                        <option disabled selected class="form-label" value="">Pendidikan Ibu
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
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pekerjaan_ibu" class="col-form-label">Pekerjaan Ibu <span
                                            class="required" style="color:red">*</span></label>
                                    <select class="form-select" id="pekerjaan_ibu" name="pekerjaan_ibu" required>
                                        <option disabled selected class="form-label" value="">Pekerjaan Ibu
                                        </option>
                                        <option value="wiraswasta">Wiraswasta</option>
                                        <option value="petani">Petani</option>
                                        <option value="ibu_rumah_tangga">Ibu Rumah Tangga</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="mb-3">
                            <label for="no_tlp" class="col-form-label">Nomor Telepon <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="no_tlp" name="no_tlp">
                        </div>
                        <!-- RIWAYAT PENDIDIKAN SANTRI -->
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="pendidikan_santri" class="col-form-label">Pendidikan Terakhir Santri <span
                                            class="required" style="color:red">*</span></label>
                                    <select class="form-select" id="pendidikan_santri" name="pendidikan_santri" required>
                                        <option disabled selected value="">Pilih Pendidikan Terakhir</option>
                                        <option value="tidak_tamat_sd/sederajat">Tidak Tamat SD/Sederajat</option>
                                        <option value="tamat_sd/sederajat">Tamat SD/Sederajat</option>
                                        <option value="tamat_smp/sederajat">Tamat SMP/Sederajat</option>
                                        <option value="tamat_sma/sederajat">Tamat SMA/Sederajat</option>
                                        <option value="diploma">Diploma</option>
                                        <option value="sarjana">Sarjana</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="asal_sekolah" class="col-form-label">Asal Sekolah <span class="required"
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="thn_lulus" class="col-form-label">Tahun Lulus <span class="required"
                                            style="color:red">*</span></label>
                                    <select class="form-select" id="thn_lulus" name="thn_lulus" required>
                                        <option disabled selected value="">Pilih Tahun Lulus</option>
                                        <option value="2024/2025">2024/2025</option>
                                        <option value="2023/2024">2023/2024</option>
                                        <option value="2022/2023">2022/2023</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="daftar_kelas" class="col-form-label">Daftar Kelas <span class="required"
                                            style="color:red">*</span></label>
                                    <select class="form-select" id="daftar_kelas" name="daftar_kelas" required>
                                        <option disabled selected value="">Pilih Kelas</option>
                                        <option value="1ibtidyah">1 Ibtidyah</option>
                                        <option value="2tsanawiyah">2 Tsanawiyah</option>
                                        <option value="3ibtidyah">3 Ibtidyah</option>
                                        <option value="3tsanawiyah">3 Tsanawiyah</option>
                                        <option value="4tsanawiyah">4 Tsanawiyah</option>
                                        <option value="idadiyah">I'Dadiyah</option>
                                        <option value="musyawirin">Musyawirin</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn"
                            style="background-color: #060d51; color: white">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="modal-editLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #060d51; color: white">
                    <h5 class="modal-title" id="exampleModalLabel">Update Santri</h5>
                    <button type="button" class="btn-close  btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form action="" method="post" id="form-modal-edit">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <input type="hidden" name="e-id-ortu" id="e-id-ortu">
                        <input type="hidden" name="e-id-riwayat" id="e-id-riwayat">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="e-no_daftar" class="col-form-label">No Pendaftaran</label>
                                    <input type="text" class="form-control" id="e-no_daftar" name="e-no_daftar"
                                        readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="e-tgl_daftar" class="col-form-label">Tanggal Daftar</label>
                                    <input type="text" class="form-control" name="e-tgl_daftar" id="e-tgl_daftar"
                                        placeholder="" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="e-thn_pelajaran" class="col-form-label">Tahun Pelajaran <span
                                            class="required" style="color:red">*</span></label>
                                    <select class="form-select" aria-label=".form-select-sm example" id="e-thn_pelajaran"
                                        name="e-thn_pelajaran">
                                        <option disabled selected>Pilih Tahun Pelajaran</option>
                                        <option value="2024/2025">2024/2025</option>
                                        <option value="2023/2024">2023/2024</option>
                                        <option value="2022/2023">2022/2023</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- NIS -->
                            <div class="col">
                                <div class="mb-3">
                                    <label for="e-nis" class="col-form-label">NIS</label>
                                    <input type="text" class="form-control" id="e-nis" name="e-nis" readonly>
                                </div>
                            </div>
                            <!-- NISN -->
                            <div class="col">
                                <div class="mb-3">
                                    <label for="e-nisn" class="col-form-label">NISN <span class="required"
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="e-nisn" name="e-nisn">
                                </div>
                            </div>
                            {{-- NIK --}}
                            <div class="col">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="e-nik" class="col-form-label">NIK <span class="required"
                                                style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="e-nik" name="e-nik">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Nama Lengkap --}}
                        <div class="mb-3">
                            <label for="nama" class="col-form-label">Nama Lengkap <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="e-nama" name="e-nama">
                        </div>
                        {{-- Jenis Kelamin --}}
                        <div class="mb-3">
                            <label for="jenis-kelamin" class="col-form-label">Jenis Kelamin</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="e-jenis_kelamin" id="inlineRadio1"
                                    value="Laki-Laki" checked>
                                <label class="form-check-label" for="inlineRadio1">Laki Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="e-jenis_kelamin" id="inlineRadio2"
                                    value="Perempuan">
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="e-tmp_lahir" class="col-form-label">Tempat Lahir <span class="required"
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="e-tmp_lahir" name="e-tmp_lahir">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="e-tgl_lahir" class="col-form-label">Tanggal Lahir <span class="required"
                                            style="color:red">*</span></label>
                                    <input type="date" class="form-control e-tgl_lahir" id="e-tgl_lahir"
                                        name="e-tgl_lahir">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                @php
                                    $provinsi = Http::get(
                                        'https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json',
                                    );
                                    $provinces = json_decode($provinsi);
                                @endphp
                                <div class="mb-3">
                                    <label for="provinsi" class="col-form-label">Provinsi <span class="required"
                                            style="color:red">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="e-provinsi"
                                        id="e-provinsi" style="font-size: 0.8rem;"
                                        onchange="Eprov(this);resetErrorProv(this)">
                                        <option value="" selected disabled>Pilih Provinsi</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->name }}" data-id="{{ $province->id }}">
                                                {{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="validation-provinsi" class="invalid-feedback">
                                        Pilih provinsi terlebih dahulu.
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="kabupaten" class="col-form-label">Kabupaten <span class="required"
                                            style="color:red">*</span></label>
                                    <input type="hidden" id="e-kabupaten_id" name="e-kabupaten_id">
                                    <select class="form-select" aria-label="Default select example" name="e-kabupaten"
                                        id="e-kabupaten" style="font-size: 0.8rem;"
                                        onchange="Ekab(this);resetErrorKab(this)" onclick="pilProv(this)">
                                        <option value="" selected disabled>Pilih Kabupaten</option>
                                    </select>
                                    <div id="validation-kabupaten" class="invalid-feedback">
                                        Pilih kabupaten terlebih dahulu.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="kecamatan" class="col-form-label">Kecamatan <span class="required"
                                            style="color:red">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="e-kecamatan"
                                        id="e-kecamatan" style="font-size: 0.8rem;" onclick="pilKab(this)"
                                        onchange="Ekec(this);resetErrorKec(this)">
                                        <option value="" selected disabled>Pilih Kecamatan</option>
                                    </select>
                                    <input type="hidden" id="e-kecamatan_id" name="e-kecamatan_id">
                                    <div id="validation-kecamatan" class="invalid-feedback">
                                        Pilih kecamatan terlebih dahulu.
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="desa" class="col-form-label">Desa <span class="required"
                                            style="color:red">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="e-desa"
                                        id="e-desa" style="font-size: 0.8rem;" onclick="pilKec(this)">
                                        <option value="" selected disabled>Pilih Desa</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="mb-3">
                            <label for="e-alamat" class="col-form-label">Alamat <span class="required"
                                    style="color:red">*</span></label>
                            <textarea class="form-control" id="e-alamat" name="e-alamat"></textarea>
                        </div>

                        <!-- RT & RW -->
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="e-rt" class="col-form-label">RT <span class="required"
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="e-rt" name="e-rt">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="e-rw" class="col-form-label">RW <span class="required"
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="e-rw" name="e-rw">
                                </div>
                            </div>
                        </div>

                        <!-- Nomor KK -->
                        <div class="mb-3">
                            <label for="e-no_kk" class="col-form-label">Nomor KK <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="e-no_kk" name="e-no_kk">
                        </div>

                        <div class="mb-3">
                            <label for="e-ayah" class="col-form-label">Nama Ayah <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="e-ayah" name="e-ayah">
                        </div>
                        <div class="mb-3">
                            <label for="e-no_ktp_ayah" class="col-form-label">No KTP Ayah <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="e-no_ktp_ayah" name="e-no_ktp_ayah">
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="e-pendidikan_ayah" class="col-form-label">Pendidikan Ayah <span
                                            class="required" style="color:red">*</span></label>
                                    <select class="form-select" id="e-pendidikan_ayah" name="e-pendidikan_ayah" required>
                                        <option disabled selected class="form-label" value="">Pendidikan
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
                            <div class="col">
                                <div class="mb-3">
                                    <label for="e-pekerjaan_ayah" class="col-form-label">Pekerjaan Ayah <span
                                            class="required" style="color:red">*</span></label>
                                    <select class="form-select" id="e-pekerjaan_ayah" name="e-pekerjaan_ayah" required>
                                        <option disabled selected class="form-label" value="">Pekerjaan Ayah
                                        </option>
                                        <option value="wiraswasta">Wiraswasta</option>
                                        <option value="petani">Petani</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="e-ibu" class="col-form-label">Nama Ibu <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="e-ibu" name="e-ibu">
                        </div>
                        <div class="mb-3">
                            <label for="e-no_ktp_ibu" class="col-form-label">No KTP Ibu <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="e-no_ktp_ibu" name="e-no_ktp_ibu">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="e-pendidikan_ibu" class="col-form-label">Pendidikan Ibu <span
                                            class="required" style="color:red">*</span></label>
                                    <select class="form-select" id="e-pendidikan_ibu" name="e-pendidikan_ibu" required>
                                        <option disabled selected class="form-label" value="">Pendidikan Ibu
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
                                        <option value="sarjana">SARJANA</option>
                                        <option value="lainnya">LAINNYA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="e-pekerjaan_ibu" class="col-form-label">Pekerjaan Ibu <span
                                            class="required" style="color:red">*</span></label>
                                    <select class="form-select" id="e-pekerjaan_ibu" name="e-pekerjaan_ibu" required>
                                        <option disabled selected class="form-label" value="">Pekerjaan Ibu
                                        </option>
                                        <option value="wiraswasta">Wiraswasta</option>
                                        <option value="petani">Petani</option>
                                        <option value="ibu_rumah_tangga">Ibu Rumah Tangga</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="mb-3">
                            <label for="e-no_tlp" class="col-form-label">Nomor Telepon <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="e-no_tlp" name="e-no_tlp">
                        </div>
                        <!-- RIWAYAT PENDIDIKAN SANTRI -->
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="e-pendidikan_santri" class="col-form-label">Pendidikan Terakhir Santri
                                        <span class="required" style="color:red">*</span></label>
                                    <select class="form-select" id="e-pendidikan_santri" name="e-pendidikan_santri"
                                        required>
                                        <option disabled selected value="">Pilih Pendidikan Terakhir</option>
                                        <option value="tidak_tamat_sd/sederajat">Tidak Tamat SD/Sederajat</option>
                                        <option value="tamat_sd/sederajat">Tamat SD/Sederajat</option>
                                        <option value="tamat_smp/sederajat">Tamat SMP/Sederajat</option>
                                        <option value="tamat_sma/sederajat">Tamat SMA/Sederajat</option>
                                        <option value="diploma">Diploma</option>
                                        <option value="sarjana">Sarjana</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="e-asal_sekolah" class="col-form-label">Asal Sekolah <span
                                            class="required" style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="e-asal_sekolah" name="e-asal_sekolah"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="e-thn_lulus" class="col-form-label">Tahun Lulus <span class="required"
                                            style="color:red">*</span></label>
                                    <select class="form-select" id="e-thn_lulus" name="e-thn_lulus" required>
                                        <option disabled selected value="">Pilih Tahun Lulus</option>
                                        <option value="2024/2025">2024/2025</option>
                                        <option value="2023/2024">2023/2024</option>
                                        <option value="2022/2023">2022/2023</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="e-daftar_kelas" class="col-form-label">Daftar Kelas <span
                                            class="required" style="color:red">*</span></label>
                                    <select class="form-select" id="e-daftar_kelas" name="e-daftar_kelas" required>
                                        <option disabled selected value="">Pilih Kelas</option>
                                        <option value="1ibtidyah">1 Ibtidyah</option>
                                        <option value="2tsanawiyah">2 Tsanawiyah</option>
                                        <option value="3ibtidyah">3 Ibtidyah</option>
                                        <option value="3tsanawiyah">3 Tsanawiyah</option>
                                        <option value="4tsanawiyah">4 Tsanawiyah</option>
                                        <option value="idadiyah">I'Dadiyah</option>
                                        <option value="musyawirin">Musyawirin</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn"
                            style="background-color: #060d51; color: white">Save</button>
                    </div>
                </form>

            </div>

        </div>
    </div>


    {{-- Modal Detail --}}
    <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #060d51; color: white">
                    <h5 class="modal-title" id="detailLabel">New message</h5>
                    <button type="button" class="btn-close  btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <td>No Daftar</td>
                                <td>:</td>
                                <td id="d-no_daftar"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Daftar</td>
                                <td>:</td>
                                <td id="d-tgl_daftar"></td>
                            </tr>
                            <tr>
                                <td>Tahun Pelajaran</td>
                                <td>:</td>
                                <td id="d-thn_pelajaran"></td>
                            </tr>
                            <tr>
                                <td>Nis</td>
                                <td>:</td>
                                <td id="d-nis"></td>
                            </tr>
                            <tr>
                                <td>Nisn</td>
                                <td>:</td>
                                <td id="d-nisn"></td>
                            </tr>
                            <tr>
                                <td>Nik</td>
                                <td>:</td>
                                <td id="d-nik"></td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td id="d-nama"></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td id="d-jenis"></td>
                            </tr>
                            <tr>
                                <td>Temapat Lahir</td>
                                <td>:</td>
                                <td id="d-tempat-lahir"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td id="d-tanggal-lahir"></td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>:</td>
                                <td id="d-provinsi"></td>
                            </tr>
                            <tr>
                                <td>Kabupaten</td>
                                <td>:</td>
                                <td id="d-kabupaten"></td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>:</td>
                                <td id="d-kecamatan"></td>
                            </tr>
                            <tr>
                                <td>Desa</td>
                                <td>:</td>
                                <td id="d-desa"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td id="d-alamat"></td>
                            </tr>
                            <tr>
                                <td>RT/RW</td>
                                <td>:</td>
                                <td id="d-rt_rw"></td>
                            </tr>
                            <tr>
                                <td>No Kartu Keluarga</td>
                                <td>:</td>
                                <td id="d-no_kk"></td>
                            </tr>
                            <tr>
                                <td>Ayah</td>
                                <td>:</td>
                                <td id="d-ayah"></td>
                            </tr>
                            <tr>
                                <td>No KTP ayah</td>
                                <td>:</td>
                                <td id="d-no_ktp_ayah"></td>
                            </tr>
                            <tr>
                                <td>Pendidikan Ayah</td>
                                <td>:</td>
                                <td id="d-pendidikan_ayah"></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan Ayah</td>
                                <td>:</td>
                                <td id="d-pekerjaan_ayah"></td>
                            </tr>
                            <tr>
                                <td>Ibu</td>
                                <td>:</td>
                                <td id="d-ibu"></td>
                            </tr>
                            <tr>
                                <td>No KTP Ibu</td>
                                <td>:</td>
                                <td id="d-no_ktp_ibu"></td>
                            </tr>
                            <tr>
                                <td>Pendidikan Ibu</td>
                                <td>:</td>
                                <td id="d-pendidikan_ibu"></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan Ibu</td>
                                <td>:</td>
                                <td id="d-pekerjaan_ibu"></td>
                            </tr>
                            <tr>
                                <td>No Telepon</td>
                                <td>:</td>
                                <td id="d-no_tlp"></td>
                            </tr>
                            <tr>
                                <td>Pendidikan Santri</td>
                                <td>:</td>
                                <td id="d-pendidikan_santri"></td>
                            </tr>
                            <tr>
                                <td>Asal Sekolah</td>
                                <td>:</td>
                                <td id="d-asal_sekolah"></td>
                            </tr>
                            <tr>
                                <td>Tahun Lulus</td>
                                <td>:</td>
                                <td id="d-thn_lulus"></td>
                            </tr>
                            <tr>
                                <td>Daftar Kelas</td>
                                <td>:</td>
                                <td id="d-daftar_kelas"></td>
                            </tr>
                    </div>
                    </table>
                </div>
            </div>
        </div>

        <script>
            // function untuk memberi validasi ketika provinsi tidak dipilh terlbih dahulu
            async function pilProv() {
                const provinsi = document.getElementById('provinsi');
                const feedback = document.getElementById('validation-provinsi');
                if (provinsi.value === "") {
                    provinsi.classList.add('is-invalid');
                    feedback.style.display = 'block';
                } else {
                    provinsi.classList.remove('is-invalid');
                    feedback.style.display = 'none';
                }
            }

            // reset error
            function resetErrorProv(selectElement) {
                const feedback = document.getElementById('validation-provinsi');
                if (selectElement.value !== "") {
                    selectElement.classList.remove('is-invalid');
                    feedback.style.display = 'none';
                }
            }

            // untuk validasi kecamatan
            function pilKab() {
                const kabupaten = document.getElementById('kabupaten');
                const feedback = document.getElementById('validation-kabupaten');
                if (kabupaten.value === "") {
                    kabupaten.classList.add('is-invalid');
                    feedback.style.display = 'block';
                } else {
                    kabupaten.classList.remove('is-invalid');
                    feedback.style.display = 'none';
                }
            }

            // reset errro kab
            function resetErrorKab(selectElement) {
                const feedback = document.getElementById('validation-kabupaten');
                if (selectElement.value !== "") {
                    selectElement.classList.remove('is-invalid');
                    feedback.style.display = 'none';
                }
            }

            // validasi kecamatan
            function pilKec() {
                const kecamatan = document.getElementById('kecamatan');
                const feedback = document.getElementById('validation-kecamatan');
                if (kecamatan.value === "") {
                    kecamatan.classList.add('is-invalid');
                    feedback.style.display = 'block';
                } else {
                    kecamatan.classList.remove('is-invalid');
                    feedback.style.display = 'none';
                }
            }

            // reset error kec
            function resetErrorKec(selectElement) {
                const feedback = document.getElementById('validation-kecamatan');
                if (selectElement.value !== "") {
                    selectElement.classList.remove('is-invalid');
                    feedback.style.display = 'none';
                }
            }

            async function prov(e) {
                const kabupatenSelect = document.getElementById('kabupaten');
                const selectedOption = e.options[e.selectedIndex];
                const provinceId = selectedOption.getAttribute('data-id');
                kabupatenSelect.innerHTML = '<option value="" selected disabled>Pilih Kabupaten</option>';

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
            async function Eprov(e) {
                const kabupatenSelect = document.getElementById('e-kabupaten');
                const selectedOption = e.options[e.selectedIndex];
                const provinceId = selectedOption.getAttribute('data-id');
                kabupatenSelect.innerHTML = '<option value="" selected disabled>Pilih Kabupaten</option>';

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
                    const selectedKabupaten = kabupatenSelect.getAttribute(
                        'data-selected');
                    if (selectedKabupaten) {
                        const kabupatenOption = Array.from(kabupatenSelect.options).find(opt => opt.value ===
                            selectedKabupaten);
                        if (kabupatenOption) {
                            kabupatenOption.selected = true;
                        }
                    }

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

                kecamatanSelect.innerHTML = '<option value="" selected disabled>Pilih Kecamatan</option>';

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
            async function Ekab(e) {
                const kecamatanSelect = document.getElementById('e-kecamatan');
                const selectedOption = e.options[e.selectedIndex];
                let kabupatenId = document.getElementById('e-kabupaten_id').value;

                if (selectedOption.dataset.id) {
                    kabupatenId = selectedOption.dataset.id;
                    document.getElementById('e-kabupaten_id').value = selectedOption.dataset
                        .id;
                }

                kecamatanSelect.innerHTML = '<option value="" selected disabled>Pilih Kecamatan</option>';

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

                    const selectedKecamatan = kecamatanSelect.getAttribute('data-selected');
                    if (selectedKecamatan) {
                        const selectedOption = Array.from(kecamatanSelect.options).find(opt => opt.value ===
                            selectedKecamatan);
                        if (selectedOption) {
                            selectedOption.selected = true;
                            document.getElementById('e-kecamatan_id').value = selectedOption.dataset
                                .id;
                        }
                    }
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

                desaSelect.innerHTML = '<option value="" selected disabled>Pilih Desa</option>';
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
            async function Ekec(e) {
                const desaSelect = document.getElementById('e-desa');
                const selectedOption = e.options[e.selectedIndex];
                let kecamatanId = document.getElementById('e-kecamatan_id').value;

                if (selectedOption.dataset.id) {
                    kecamatanId = selectedOption.dataset.id;
                    document.getElementById('e-kecamatan_id').value = selectedOption.dataset
                        .id;
                }

                desaSelect.innerHTML = '<option value="" selected disabled>Pilih Desa</option>';
                try {
                    const response = await fetch(`/api/desa/${kecamatanId}`);
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    const data = await response.json();

                    data.forEach(desa => {
                        const option = document.createElement('option');
                        option.value = desa.name;
                        option.dataset.id = desa.id;
                        option.textContent = desa.name;
                        desaSelect.appendChild(option);
                    });

                    const selectedDesa = desaSelect.getAttribute('data-selected');
                    if (selectedDesa) {
                        const selectedOption = Array.from(desaSelect.options).find(opt => opt.value ===
                            selectedDesa);
                        if (selectedOption) {
                            selectedOption.selected = true;

                        }
                    }
                } catch (error) {
                    console.error('Error fetching kecamatan:', error);
                }
            }
        </script>
    @endsection

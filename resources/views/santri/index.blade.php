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
                                    <!-- Tombol Tambah Santri dengan jarak yang lebih baik -->
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" style="background-color: #060d51; color: white">
                                        Tambah Santri
                                    </button>

                                    <!-- Input Pencarian -->
                                    <div class="input-group input-group-sm" style="max-width: 300px;">
                                        <input type="search" class="form-control" placeholder="Search" id="search"
                                            name="search" aria-label="Pencarian">
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
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
                                    <label for="nis" class="col-form-label">Nis</label>
                                    <input type="text" class="form-control" id="nis" name="nis"
                                        value="{{ $nis }}" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nik" class="col-form-label">Nik <span class="required"
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="nik" name="nik">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="col-form-label">Nama Lengkap <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="jenis-kelamin" class="col-form-label">Jenis Kelamin</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis-kelamin" id="inlineRadio1"
                                    value="Laki-Laki" checked>
                                <label class="form-check-label" for="inlineRadio1">Laki Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis-kelamin" id="inlineRadio2"
                                    value="Perempuan">
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tempat-lahir" class="col-form-label">Tempat Lahir <span class="required"
                                    style="color:red">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="tempat-lahir"
                                id="tempat-lahir" style="font-size: 0.8rem;">
                                <option value="" disabled selected>Pilih Tempat Lahir</option>
                                @foreach ($kabupatens as $kabupaten)
                                    <option value="{{ $kabupaten->name }}">{{ $kabupaten->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal-lahir" class="col-form-label">Tanggal Lahir <span class="required"
                                    style="color:red">*</span></label>
                            <input type="date" class="form-control" id="tanggal-lahir" name="tanggal-lahir">
                        </div>
                        <div class="mb-3">
                            <label for="agama" class="col-form-label">Agama <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="agama" name="agama">
                        </div>
                        <div class="mb-3">
                            <label for="nama-ayah" class="col-form-label">Nama Ayah <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="nama-ayah" name="nama-ayah">
                        </div>
                        <div class="mb-3">
                            <label for="nama-ibu" class="col-form-label">Nama Ibu <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="nama-ibu" name="nama-ibu">
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
                                    <select class="form-select" aria-label="Default select example" name="provinsi"
                                        id="provinsi" style="font-size: 0.8rem;"
                                        onchange="prov(this);resetErrorProv(this)">
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
                                <div class="mb-3">
                                    <label for="kabupaten" class="col-form-label">Kabupaten <span class="required"
                                            style="color:red">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="kabupaten"
                                        id="kabupaten" style="font-size: 0.8rem;"
                                        onchange="kab(this);resetErrorKab(this)" onclick="pilProv(this)">
                                        <option value="" selected disabled>Pilih Kabupaten</option>
                                    </select>
                                    <input type="hidden" id="kabupaten_id" name="kabupaten_id">
                                    <div id="validation-kabupaten" class="invalid-feedback">
                                        Pilih kabupaten terlebih dahulu.
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="kecamatan" class="col-form-label">Kecamatan <span class="required"
                                            style="color:red">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="kecamatan"
                                        id="kecamatan" style="font-size: 0.8rem;" onclick="pilKab(this)"
                                        onchange="kec(this);resetErrorKec(this)">
                                        <option value="" selected disabled>Pilih Kecamatan</option>
                                    </select>
                                    <input type="hidden" id="kecamatan_id" name="kecamatan_id">
                                    <div id="validation-kecamatan" class="invalid-feedback">
                                        Pilih kecamatan terlebih dahulu.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="desa" class="col-form-label">Desa <span class="required"
                                            style="color:red">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="desa"
                                        id="desa" style="font-size: 0.8rem;" onclick="pilKec(this)">
                                        <option value="" selected disabled>Pilih Desa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="alamat" class="col-form-label">Alamat <span class="required"
                                    style="color:red">*</span></label>
                            <textarea class="form-control" name="alamat" id="alamat"></textarea>
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
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nis" class="col-form-label">Nis</label>
                                    <input type="text" class="form-control" id="e-nis" name="e-nis" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nik" class="col-form-label">Nik <span class="required"
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="e-nik" name="e-nik">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="col-form-label">Nama Lengkap <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="e-nama" name="e-nama">
                        </div>
                        <div class="mb-3">
                            <label for="jenis-kelamin" class="col-form-label">Jenis Kelamin</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="e-jenis-kelamin" id="inlineRadio1"
                                    value="Laki-Laki" checked>
                                <label class="form-check-label" for="inlineRadio1">Laki Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="e-jenis-kelamin" id="inlineRadio2"
                                    value="Perempuan">
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tempat-lahir" class="col-form-label">Tempat Lahir <span class="required"
                                    style="color:red">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="e-tempat-lahir"
                                id="e-tempat-lahir" style="font-size: 0.8rem;">
                                @foreach ($kabupatens as $kabupaten)
                                    <option value="{{ $kabupaten->name }}">{{ $kabupaten->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal-lahir" class="col-form-label">Tanggal Lahir <span class="required"
                                    style="color:red">*</span></label>
                            <input type="date" class="form-control" id="e-tanggal-lahir" name="e-tanggal-lahir">
                        </div>
                        <div class="mb-3">
                            <label for="agama" class="col-form-label">Agama <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="e-agama" name="e-agama">
                        </div>
                        <div class="mb-3">
                            <label for="nama-ayah" class="col-form-label">Nama Ayah <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="e-nama-ayah" name="e-nama-ayah">
                        </div>
                        <div class="mb-3">
                            <label for="nama-ibu" class="col-form-label">Nama Ibu <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" id="e-nama-ibu" name="e-nama-ibu">
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
                        <div class="row">
                            <label for="alamat" class="col-form-label">Alamat <span class="required"
                                    style="color:red">*</span></label>
                            <textarea class="form-control" name="e-alamat" id="e-alamat"></textarea>
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
                                <td>Nis</td>
                                <td>:</td>
                                <td id="d-nis"></td>
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
                                <td>Agama</td>
                                <td>:</td>
                                <td id="d-agama"></td>
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
                                <td>Ayah</td>
                                <td>:</td>
                                <td id="d-ayah"></td>
                            </tr>
                            <tr>
                                <td>Ibu</td>
                                <td>:</td>
                                <td id="d-ibu"></td>
                            </tr>
                    </div>
                    </table>
                </div>
            </div>
        </div>
    @endsection

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

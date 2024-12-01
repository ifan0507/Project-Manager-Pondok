@extends('layouts.template')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <p class="fw-bold">Form Perizinan</p>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('form-izin') }}" method="post" id="izin-form-save">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" value="{{ $santri->id }}" name="izin_santri_id">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="form_izin_nis" class="col-form-label">Nis Santri</label>
                                            <input type="text" class="form-control" name="form_izin_nis"
                                                id="form_izin_nis" value="{{ $santri->nis }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="form_izin_nama" class="col-form-label">Nama Santri</label>
                                            <input type="text" class="form-control" name="form_izin_nama"
                                                id="form_izin_nama" value="{{ $santri->nama }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="keterangan" class="col-form-label">Keterangan Izin</label>
                                            <select class="form-select"
                                                aria-label="Default
                                                select example"
                                                name="form_izin_keterangan" id="form_izin_keterangan">
                                                <option selected disabled value="">Pilih Keterangan</option>
                                                <option value="sakit">Sakit</option>
                                                <option value="kepentingan-keluarga">Kepentingan Keluarga</option>
                                                <option value="lain-lain">Lain Lain</option>
                                            </select>
                                            <div id="validationServer03Feedback" class="invalid-feedback" id="error-ket">
                                                Keterangan harus dipilih!
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="form_lama_izin" class="col-form-label">Lama Izin Santri</label>
                                            <input type="number" class="form-control" name="form_lama_izin"
                                                id="form_lama_izin">
                                            <div id="validationServer03Feedback" class="invalid-feedback" id="error-lama">
                                                Lama izin harus diisi!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="tanggal-izin" class="col-form-label">Tanggal Izin</label>
                                            <input type="text" class="form-control" name="tgl_izin" id="tgl_izin"
                                                value="{{ $tgl_izin }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="tgl_kembali" class="col-form-label">Tanggal Kembali</label>
                                            <input type="text" class="form-control" name="tgl_kembali" id="tgl_kembali"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ route('izin') }}" class="btn btn-secondary mr-2">Kembali</a>
                                <button type="submit" class="btn"
                                    style="background-color: #060d51; color: white">Simpan</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <script>
        $(document).ready(function() {
            // Fungsi untuk menambahkan hari ke tanggal
            function calculateReturnDate(startDate, days) {
                const date = new Date(startDate);
                date.setDate(date.getDate() + days);
                const dd = String(date.getDate()).padStart(2, '0');
                const mm = String(date.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
                const yyyy = date.getFullYear();
                return `${dd}/${mm}/${yyyy}`;
            }

            // Event saat lama izin diubah
            $('#form_lama_izin').on('input', function() {
                const lamaIzin = parseInt($(this).val(), 10); // Ambil nilai input lama izin
                const tglIzin = $('#tgl_izin').val(); // Ambil nilai tanggal izin
                if (!isNaN(lamaIzin) && lamaIzin > 0) {
                    const tglIzinFormatted = tglIzin.split('/').reverse().join('-'); // Format ke YYYY-MM-DD
                    const tglKembali = calculateReturnDate(tglIzinFormatted,
                        lamaIzin); // Hitung tanggal kembali
                    $('#tgl_kembali').val(tglKembali); // Set nilai tanggal kembali
                } else {
                    $('#tgl_kembali').val(''); // Kosongkan jika input tidak valid
                }
            });
        });
    </script>
@endsection

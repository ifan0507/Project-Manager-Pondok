@extends('layouts.template')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="fw-bold">Form Update Perizinan</h5>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('form.update', ['id' => $izin->id]) }}" method="post" id="izin-form-edit">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <input type="hidden" id="e-izin_santri_id" name="e-izin_santri_id"
                                    value="{{ old('e-izin_santri_id', $izin->santri_id ?? '') }}">
                                <input type="hidden" id="e-status" name="e-status"
                                    value="{{ old('e-status', $izin->status ?? '') }}">

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="e-form_izin_nis" class="form-label">NIS Santri</label>
                                        <input type="text" id="e-form_izin_nis" name="e-form_izin_nis"
                                            class="form-control"
                                            value="{{ old('e-form_izin_nis', $izin->santri->nis ?? '') }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="e-form_izin_nama" class="form-label">Nama Santri</label>
                                        <input type="text" id="e-form_izin_nama" name="e-form_izin_nama"
                                            class="form-control"
                                            value="{{ old('e-form_izin_nama', $izin->santri->nama ?? '') }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="e-form_izin_keterangan" class="form-label">Keterangan Izin</label>
                                        <select id="e-form_izin_keterangan" name="e-form_izin_keterangan"
                                            class="form-select">
                                            <option value="sakit"
                                                {{ old('e-form_izin_keterangan', $izin->keterangan) == 'sakit' ? 'selected' : '' }}>
                                                Sakit</option>
                                            <option value="kepentingan-keluarga"
                                                {{ old('e-form_izin_keterangan', $izin->keterangan) == 'kepentingan-keluarga' ? 'selected' : '' }}>
                                                Kepentingan Keluarga</option>
                                            <option value="lain-lain"
                                                {{ old('e-form_izin_keterangan', $izin->keterangan) == 'lain-lain' ? 'selected' : '' }}>
                                                Lain-lain</option>
                                        </select>

                                    </div>
                                    <div class="col">
                                        <label for="e-form_lama_izin" class="form-label">Lama Izin (Hari)</label>
                                        <input type="number" id="e-form_lama_izin" name="e-form_lama_izin"
                                            class="form-control"
                                            value="{{ old('e-form_lama_izin', $izin->lama_izin ?? '') }}">
                                        <div id="validationServer03Feedback" class="invalid-feedback" id="e-error-lama">
                                            Lama izin harus diisi!
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="e-tgl_izin" class="form-label">Tanggal Izin</label>
                                        <input type="text" id="e-tgl_izin" name="e-tgl_izin" class="form-control"
                                            value="{{ old('e-tgl_izin', $izin->tgl_izin ?? '') }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="e-tgl_kembali" class="form-label">Tanggal Kembali</label>
                                        <input type="text" id="e-tgl_kembali" name="e-tgl_kembali" class="form-control"
                                            value="{{ old('e-tgl_kembali', $izin->tgl_kembali ?? '') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer d-flex justify-content-end">
                                <a href="{{ route('izin') }}" class="btn btn-secondary me-2">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
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
            $('#e-form_lama_izin').on('input', function() {
                const lamaIzin = parseInt($(this).val(), 10); // Ambil nilai input lama izin
                const tglIzin = $('#e-tgl_izin').val(); // Ambil nilai tanggal izin
                if (!isNaN(lamaIzin) && lamaIzin > 0) {
                    const tglIzinFormatted = tglIzin.split('/').reverse().join('-'); // Format ke YYYY-MM-DD
                    const tglKembali = calculateReturnDate(tglIzinFormatted,
                        lamaIzin); // Hitung tanggal kembali
                    $('#e-tgl_kembali').val(tglKembali); // Set nilai tanggal kembali
                } else {
                    $('#e-tgl_kembali').val(''); // Kosongkan jika input tidak valid
                }
            });


        });
    </script>
@endsection

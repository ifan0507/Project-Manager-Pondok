@extends('layouts.template')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="flash-data" data-flashData="{{ session('success') }}"></div>
                        <div class="card-header">
                            <button type="button" class="btn" style="background-color: #060d51; color: white"
                                data-bs-toggle="modal" data-bs-target="#modal-izin">
                                Tambah Perizinan
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead style="border-bottom:0;">
                                        <tr style="border-bottom:0;">
                                            <th style="border-bottom:0;">Nis</th>
                                            <th style="border-bottom:0;">Nama Santri</th>
                                            <th style="border-bottom:0;">Keterangan</th>
                                            <th style="border-bottom:0;">Tanggal Izin</th>
                                            <th style="border-bottom:0;">Tanggal Kembali</th>
                                            <th style="border-bottom:0;">Status</th>
                                            <th style="width: 15px; border-bottom:0;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($izins as $izin)
                                            <tr>
                                                <td>{{ $izin->santri->nis }}</td>
                                                <td>{{ $izin->santri->nama }}</td>
                                                <td>{{ $izin->keterangan }}</td>
                                                <td>{{ $izin->tgl_izin }}</td>
                                                <td>{{ $izin->tgl_kembali }}</td>
                                                <td>
                                                    @if ($izin->status == 'belum kembali')
                                                        <span class="badge bg-danger">{{ $izin->status }}</span>
                                                    @else
                                                        <span class="badge bg-success">{{ $izin->status }}</span>
                                                    @endif
                                                </td>
                                                <style>
                                                    .btn-group .btn {
                                                        margin-right: 4px;
                                                    }

                                                    .btn-group .btn:last-child {
                                                        margin-right: 0;
                                                    }
                                                </style>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Action buttons">
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('izin.edit', ['id' => $izin->id]) }}">
                                                            <button type="button" class="btn btn-sm btn-edit-izin mr-1"
                                                                style="background-color: #060d51; color: white">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </button>
                                                        </a>
                                                        <!-- Delete Button -->
                                                        <form action="{{ route('izin.delete', ['id' => $izin->id]) }}"
                                                            method="post" class="form-delete m-0 mr-1" id="izin-delete">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-hapus"
                                                                style="background-color: #060d51; color: white">
                                                                <i class="fa-solid fa-trash-can"></i>
                                                            </button>
                                                        </form>

                                                        <!-- Print Button -->
                                                        <a href="{{ route('izin.export-pdf', ['id' => $izin->id]) }}"
                                                            target="_blank">
                                                            <button type="button" class="btn btn-sm btn-cetak mr-1"
                                                                style="background-color: #060d51; color: white">
                                                                <i class="fas fa-print"></i>
                                                            </button>
                                                        </a>

                                                        <!-- Izin Kembali Button -->
                                                        @if ($izin->status == 'belum kembali')
                                                            <form action="{{ route('izinKembali', ['id' => $izin->id]) }}"
                                                                method="post" class="m-0" id="form-kembali">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-izin-kembali"
                                                                    style="background-color: #060d51; color: white"
                                                                    id="btn-izin-kembali">
                                                                    <i class="fa-solid fa-tent-arrow-turn-left"></i>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <div class="d-none"></div>
                                                        @endif
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
                                {{ $izins->links() }}
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

    {{-- ModaL Tambah --}}
    <div class="modal fade" id="modal-izin" tabindex="-1" aria-labelledby="modal-izinLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #060d51; color: white">
                    <h5 class="modal-title" id="modal-izinLabel">Tambah Perizinan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="form-izin" action="{{ route('izin-santri.form') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="izin_nis" class="col-form-label">NIS Santri <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" name="izin_nis" id="izin_nis"
                                placeholder="Masukkan NIS">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn" style="background-color: #060d51; color: white">
                            <i class="fa-solid fa-magnifying-glass"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".btn-izin-kembali").on("click", function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Apakah sudah benar?",
                    text: "Santri kembali ke pondok",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#25c450",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Benar",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).closest("#form-kembali").submit();
                    }
                });
            });
        })
    </script>
@endsection

@extends('layouts.template')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn" style="background-color: #060d51; color: white"
                                data-bs-toggle="modal" data-bs-target="#modal-berita">
                                Tambah Berita
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead style="border-bottom:0;">
                                        <tr style="border-bottom:0;">
                                            <th style="border-bottom:0;">Judul</th>
                                            <th style="border-bottom:0;">Deskripsi</th>
                                            <th style="border-bottom:0;">Selengkapnya</th>
                                            <th style="width: 15px; border-bottom:0;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($beritas as $berita)
                                            <tr>
                                                <td>{{ $berita->judul }}</td>
                                                <td>{{ $berita->deskription }}</td>
                                                <td>{{ $berita->selengkapnya }}</td>
                                                <td>
                                                    <div class="d-inline-flex gap-2">
                                                        <div class="rounded-circle">
                                                            <button type="button" class="btn-edit-berita btn btn-sm"
                                                                style="background-color: #060d51; color: white"
                                                                data-id="{{ $berita->id }}"><i
                                                                    class="fa-regular fa-pen-to-square"></i></button>
                                                        </div>
                                                        <form action="{{ route('berita.delete', ['id' => $berita->id]) }}"
                                                            method="post" id="form-delete-berita" class="form-delete  m-0">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" name="btn-hapus"
                                                                style="background-color: #060d51; color: white"
                                                                class="btn-hapus btn btn-sm"><i
                                                                    class="fa-solid fa-trash-can"></i></button>
                                                        </form>
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
    <div class="modal fade" id="modal-berita" tabindex="-1" aria-labelledby="modal-beritaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #060d51; color: white">
                    <h5 class="modal-title" id="modal-beritaLabel">Tambah Berita</h5>
                    <button type="button" class="btn-close  btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="/berita" method="post" id="form-berita">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="judul" class="col-form-label">Judul Berita <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" name="judul" id="judul">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="col-form-label">Deskripsi <span class="required"
                                    style="color:red">*</span></label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="selengkapnya" class="col-form-label">Selengkapnya <span class="required"
                                    style="color:red">*</span></label>
                            <textarea class="form-control" name="selengkapnya" id="selengkapnya"></textarea>
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
    <div class="modal fade" id="modal-edit-berita" tabindex="-1" aria-labelledby="modal-beritaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #060d51; color: white">
                    <h5 class="modal-title" id="modal-beritaLabel">Update Berita</h5>
                    <button type="button" class="btn-close  btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="" method="post" id="form-edit-berita">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="e-judul" class="col-form-label">Judul Berita <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" name="e-judul" id="e-judul">
                        </div>
                        <div class="mb-3">
                            <label for="e-deskripsi" class="col-form-label">Deskripsi <span class="required"
                                    style="color:red">*</span></label>
                            <textarea class="form-control" name="e-deskripsi" id="e-deskripsi" rows="5"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="e-selengkapnya" class="col-form-label">Selengkapnya <span class="required"
                                    style="color:red">*</span></label>
                            <textarea class="form-control" name="e-selengkapnya" id="e-selengkapnya" rows="5"></textarea>
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

    {{-- <script>
        document.querySelectorAll(".btn-close, .btn-secondary").forEach((btn) => {
            btn.addEventListener("click", () => {
                // Ambil teks dari modal-title
                const modalTitle = document.querySelector(".modal-title").textContent.trim();

                if (modalTitle === "Tambah berita Misi") {
                    // Tutup modal Tambah berita
                    const modal = bootstrap.Modal.getInstance(document.getElementById("modal-visi"));
                    modal.hide();
                    document.getElementById("form-visi").reset();
                } else if (modalTitle === "Update Visi Misi") {
                    // Tutup modal Edit Visi
                    const modalEdit = bootstrap.Modal.getInstance(document.getElementById(
                        "modal-edit-visi"));
                    modalEdit.hide();
                    document.getElementById("form-edit-visi").reset();
                }
            });
        });
    </script> --}}
@endsection

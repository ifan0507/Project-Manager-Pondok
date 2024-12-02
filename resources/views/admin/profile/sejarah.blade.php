@extends('layouts.template')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn" style="background-color: #060d51; color: white"
                                data-bs-toggle="modal" data-bs-target="#modal-sejarah">
                                Tambah Sejarah
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead style="border-bottom:0;">
                                        <tr style="border-bottom:0;">
                                            <th style="border-bottom:0;">Judul</th>
                                            <th style="border-bottom:0;">Gambar</th>
                                            <th style="border-bottom:0;">Deskripsi</th>
                                            <th style="width: 15px; border-bottom:0;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sejarahs as $sejarah)
                                            <tr>
                                                <td>{{ $sejarah->judul }}</td>
                                                <td><img src="storage/{{ $sejarah->gambar }}" alt=""
                                                        style="width: 100px"></td>
                                                <td>{{ $sejarah->deskripsi }}</td>
                                                <td>
                                                    <div class="d-inline-flex gap-2">
                                                        <div class="rounded-circle">
                                                            <button type="button" class="btn-edit-sejarah btn btn-sm"
                                                                style="background-color: #060d51; color: white"
                                                                data-id="{{ $sejarah->id }}"><i
                                                                    class="fa-regular fa-pen-to-square"></i></button>
                                                        </div>
                                                        <form action="{{ route('sejarah.delete', ['id' => $sejarah->id]) }}"
                                                            method="post" id="form-delete-sejarah"
                                                            class="form-delete  m-0">
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
    <div class="modal fade" id="modal-sejarah" tabindex="-1" aria-labelledby="modal-sejarahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #060d51; color: white">
                    <h5 class="modal-title" id="modal-sejarahLabel">Tambah Sejarah</h5>
                    <button type="button" class="btn-close  btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="/sejarah/save" method="post" id="sejarah-form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="judul" class="col-form-label">Judul <span class="required"
                                    style="color:red">*</span></label>
                            <input type="text" class="form-control" name="judul" id="judul">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="col-form-label">Gambar <span class="required"
                                    style="color:red">*</span></label>
                            <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
                            <input type="file" class="form-control" name="image" id="image"
                                onchange="previewImage()">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">Deskripsi <span class="required"
                                    style="color:red">*</span></label>
                            <textarea class="form-control" name="description" id="description"></textarea>
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
    <div class="modal fade" id="modal-edit-sejarah" tabindex="-1" aria-labelledby="modal-sejarahLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #060d51; color: white">
                    <h5 class="modal-title" id="modal-sejarahLabel">Update Sejarah</h5>
                    <button type="button" class="btn-close  btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="" method="post" id="form-edit-sejarah">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="e-judul" class="col-form-label">Judul</label>
                            <textarea class="form-control" name="e-judul" id="e-judul"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="col-form-label">Gambar <span class="required"
                                    style="color:red">*</span></label>
                            <input type="hidden" name="oldImage" id="oldImage">
                            <img src="" class="img-preview-edit img-fluid mb-3 col-sm-5 d-block" alt="">
                            <input type="file" class="form-control" name="e-image" id="e-image"
                                onchange="previewImageEdit()">
                        </div>
                        <div class="mb-3">
                            <label for="e-description" class="col-form-label">Description</label>
                            <textarea class="form-control" name="e-description" id="e-description"></textarea>
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



    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFReader) {
                imgPreview.src = oFReader.target.result;
            }

        }

        function previewImageEdit() {
            const image = document.querySelector('#e-image');
            const imgPreview = document.querySelector('.img-preview-edit');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFReader) {
                imgPreview.src = oFReader.target.result;
            };
        }
    </script>
@endsection

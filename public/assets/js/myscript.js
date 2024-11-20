$(document).ready(function () {
    // close modal
    $(".btn-close" && ".btn-secondary").on("click", function () {
        $("#exampleModal").modal("hide");
        $("#form-modal")[0].reset();
    });

    // submit form
    $("#form-modal").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (response) {
                $("#exampleModal").modal("hide");
                location.reload();
                $("#form-modal")[0].reset();
                Swal.fire({
                    icon: "success",
                    title: "Berhasil!",
                    text: "Data berhasil disimpan!",
                });
            },
            error: function (xhr) {
                // Menampilkan pesan kesalahan jika ada
                var errors = xhr.responseJSON.errors;
                var errorString = "";
                for (var error in errors) {
                    errorString += errors[error][0] + "\n";
                }
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: errorString,
                });
            },
        });
    });

    // edit
    $("#form-modal-edit").on("submit", function (e) {
        e.preventDefault(); // Menghentikan pengiriman formulir secara default
        $.ajax({
            type: "PUT",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (response) {
                $("#modal-edit").modal("hide");
                location.reload();
                $("#form-modal-edit")[0].reset();
                Swal.fire({
                    icon: "success",
                    title: "Berhasil!",
                    text: "Data berhasil diedit!",
                });
            },
            error: function (xhr) {
                // Menampilkan pesan kesalahan jika ada
                var errors = xhr.responseJSON.errors;
                var errorString = "";
                for (var error in errors) {
                    errorString += errors[error][0] + "\n";
                }
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: errorString,
                });
            },
        });
    });
    // confirmasi delete
    $(".btn-hapus").on("click", function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Apakah anda yaqin?",
            text: "data dihapus",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus Data!",
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).closest(".form-delete").submit();
            }
        });
    });
    $(".form-delete").on("submit", () => {
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: "Data berhasil dihapus!",
        });
    });

    // Modal Edit
    $(".btn-edit").on("click", function (e) {
        const id = $(this).data("id");
        $.ajax({
            url: `/santri/${id}`,
            type: "GET",
            success: function (data) {
                $("#e-id-ortu").val(data.ortu.id);
                $("#e-nis").val(data.nis);
                $("#e-nik").val(data.nik);
                $("#e-nama").val(data.nama);
                $(
                    "#e-tempat-lahir option[value='" + data.tempat_lahir + "']"
                ).prop("selected", true);
                $("#e-tanggal-lahir").val(data.tanggal_lahir);
                $("#e-agama").val(data.agama);
                $("#e-provinsi option[value='" + data.provinsi + "']")
                    .prop("selected", true)
                    .change();
                $("#e-kabupaten").attr("data-selected", data.kabupaten);
                $("#e-kabupaten option[value='" + data.kabupaten + "']").prop(
                    "selected",
                    true
                );
                $("#e-kabupaten").change();
                $("#e-kabupaten_id").val(data.kab_id);
                Ekab($("#e-kabupaten")[0]);
                $("#e-kecamatan").attr("data-selected", data.kecamatan);
                $("#e-kecamatan option[value='" + data.kecamatan + "']")
                    .prop("selected", true)
                    .change();
                $("#e-kecamatan").change();
                $("#e-kecamatan_id").val(data.kec_id);
                Ekec($("#e-kecamatan")[0]);
                $("#e-desa").attr("data-selected", data.desa);
                $("#e-desa option[value='" + data.desa + "']").prop(
                    "selected",
                    true
                );
                $("#e-alamat").val(data.alamat);
                $("#e-nama-ayah").val(data.ortu.ayah);
                $("#e-nama-ibu").val(data.ortu.ibu);

                if (data.jenis_kelamin === "Laki-Laki") {
                    $("#inlineRadio1").prop("checked", true);
                } else {
                    $("#inlineRadio2").prop("checked", true);
                }

                $("#form-modal-edit").attr("action", `/santri/${id}`);
                $("#modal-edit").modal("show");
            },
        });
    });
    // detail
    $(".btn-detail").on("click", function (e) {
        const id = $(this).data("id");
        $.ajax({
            url: `/santri/detail/${id}`,
            type: "GET",
            success: function (data) {
                $("#d-nis").text(data.nis);
                $("#d-nik").text(data.nik);
                $("#d-nama").text(data.nama);
                $("#d-jenis").text(data.jenis_kelamin);
                $("#d-tempat-lahir").text(data.tempat_lahir);
                $("#d-tanggal-lahir").text(data.tanggal_lahir);
                $("#d-agama").text(data.agama);
                $("#d-provinsi").text(data.provinsi);
                $("#d-kabupaten").text(data.kabupaten);
                $("#d-kecamatan").text(data.kecamatan);
                $("#d-desa").text(data.desa);
                $("#d-alamat").text(data.alamat);
                $("#d-ayah").text(data.ortu.ayah);
                $("#d-ibu").text(data.ortu.ibu);
                $("#detailLabel").text("Detail Data Santri");
                $("#detail").modal("show");
            },
        });
    });
    $(".nav-link.has-dropdown").on("click", function (e) {
        var $this = $(this);
        var $target = $($this.data("bs-target"));

        // Mencegah event bubbling agar dropdown tidak tertutup jika klik pada link
        e.stopPropagation();

        // Cek jika dropdown belum terbuka, buka dan beri kelas active pada link
        if ($target.hasClass("collapse") && !$target.hasClass("show")) {
            $target.collapse("show");
            $this.addClass("active");
        } else {
            // Jika sudah terbuka, sembunyikan dan hapus kelas active
            $target.collapse("hide");
            $this.removeClass("active");
        }

        // Pastikan hanya menu yang sedang aktif yang memiliki kelas active
        $(".nav-link.has-dropdown").not($this).removeClass("active");
    });

    $(document).on("click", function (e) {
        // Hanya tutup dropdown jika klik di luar menu dan dropdown, tapi pastikan jika ada submenu aktif, dropdown tetap terbuka
        if (!$(e.target).closest(".nav-item").length) {
            // Tutup dropdown hanya jika tidak ada submenu aktif
            $(".sidebar-dropdown.collapse").each(function () {
                if (!$(this).hasClass("show")) {
                    $(this).collapse("hide");
                }
            });
            // $(".nav-link").removeClass("active"); // Menghapus kelas 'active' pada semua link
        }
    });

    // Menangani klik pada submenu untuk menandai yang aktif tanpa menutup dropdown
    $(".sidebar-dropdown .nav-item .nav-link").on("click", function (e) {
        e.stopPropagation(); // Mencegah event bubbling agar dropdown tidak tertutup
        $(this).addClass("active"); // Menambahkan kelas active pada submenu yang diklik
    });

    // Mencegah klik pada dropdown menutup submenu
    $(".sidebar-dropdown").on("click", function (e) {
        e.stopPropagation(); // Mencegah klik pada dropdown menutupnya
    });

    // Menangani klik pada tombol "Tambah Visi Misi"
    $(".btn").on("click", function (e) {
        // Pastikan dropdown tidak tertutup saat klik tombol modal
        e.stopPropagation(); // Mencegah event bubbling ke dropdown
    });

    // Submit Visi Misi
    $("#form-visi").on("submit", function (e) {
        e.preventDefault();
        if ($("#visi").val() === "" && $("#misi").val() === "") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Silahkan isi Visi Atau Misi!",
            });
            return false;
        }
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (response) {
                $("#modal-visi").modal("hide");
                location.reload();
                $("#form-visi")[0].reset();
                Swal.fire({
                    icon: "success",
                    title: "Berhasil!",
                    text: "Data berhasil disimpan!",
                });
            },
            error: function (xhr) {
                // Menampilkan pesan kesalahan jika ada
                var errors = xhr.responseJSON.errors;
                var errorString = "";
                for (var error in errors) {
                    errorString += errors[error][0] + "\n";
                }
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: errorString,
                });
            },
        });
    });

    // edit Visi Misi
    $(".btn-edit-visi").on("click", function (e) {
        const id = $(this).data("id");
        $.ajax({
            url: `/visi-misi/${id}`,
            type: "GET",
            success: function (data) {
                $("#e-visi").val(data.visi);
                $("#e-misi").val(data.misi);
                $("#form-edit-visi").attr("action", `/visi-misi/${id}`);
                $("#modal-edit-visi").modal("show");
            },
        });
    });

    $("#form-edit-visi").on("submit", function (e) {
        e.preventDefault();
        if ($("#e-visi").val() == "" && $("#e-visi").val() == "") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Silahkan isi Visi Atau Misi!",
            });
            return false;
        }
        $.ajax({
            type: "PUT",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (response) {
                $("#modal-edit-visi").modal("hide");
                location.reload();
                $("#form-edit-visi")[0].reset();
                Swal.fire({
                    icon: "success",
                    title: "Berhasil!",
                    text: "Data berhasil diedit!",
                });
            },
            error: function (xhr) {
                // Menampilkan pesan kesalahan jika ada
                var errors = xhr.responseJSON.errors;
                var errorString = "";
                for (var error in errors) {
                    errorString += errors[error][0] + "\n";
                }
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: errorString,
                });
            },
        });
    });

    // submit sejarah
    $("#sejarah-form").on("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#modal-sejarah").modal("hide");
                location.reload();
                $("#sejarah-form")[0].reset();
                Swal.fire({
                    icon: "success",
                    title: "Berhasil!",
                    text: "Data berhasil disimpan!",
                });
            },
            error: function (xhr) {
                // Menampilkan pesan kesalahan jika ada
                var errors = xhr.responseJSON.errors;
                var errorString = "";
                for (var error in errors) {
                    errorString += errors[error][0] + "\n";
                }
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: errorString,
                });
            },
        });
    });

    $("#form-delete-sejarah").on("submit", () => {
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: "Data berhasil dihapus!",
        });
    });

    $(".btn-edit-sejarah").on("click", function (e) {
        const id = $(this).data("id");
        $.ajax({
            url: `/sejarah/${id}`,
            type: "GET",
            success: function (data) {
                $("#e-judul").val(data.judul);
                $("#oldImage").val(data.gambar);
                $(".img-preview-edit")
                    .attr("src", `storage/${data.gambar}`)
                    .show();
                $("#e-description").val(data.deskripsi);
                $("#form-edit-sejarah").attr("action", `/sejarah/${id}`);
                $("#modal-edit-sejarah").modal("show");
            },
        });
    });

    $("#form-edit-sejarah").on("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#modal-edit-sejarah").modal("hide");
                location.reload();
                $("#form-edit-sejarah")[0].reset();
                Swal.fire({
                    icon: "success",
                    title: "Berhasil!",
                    text: "Data berhasil disimpan!",
                });
            },
            error: function (xhr) {
                // Menampilkan pesan kesalahan jika ada
                var errors = xhr.responseJSON.errors;
                var errorString = "";
                for (var error in errors) {
                    errorString += errors[error][0] + "\n";
                }
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: errorString,
                });
            },
        });
    });
});

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
                $("#e-id-riwayat").val(data.riwayat_santri.id);
                $("#e-no_daftar").val(data.no_daftar);
                $("#e-tgl_daftar").val(data.tgl_daftar);
                $(
                    "#e-thn_pelajaran option[value='" +
                        data.thn_pelajaran +
                        "']"
                ).prop("selected", true);
                $("#e-nis").val(data.nis);
                $("#e-nisn").val(data.nisn);
                $("#e-nik").val(data.nik);
                $("#e-nama").val(data.nama);
                $("#e-tmp_lahir").val(data.tempat_lahir);
                $(".e-tgl_lahir").val(data.tanggal_lahir);
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
                $("#e-rt").val(data.rt);
                $("#e-rw").val(data.rw);
                $("#e-no_kk").val(data.ortu.no_kk);
                $("#e-ayah").val(data.ortu.ayah);
                $("#e-no_ktp_ayah").val(data.ortu.no_ktp_ayah);
                $(
                    "#e-pendidikan_ayah option[value='" +
                        data.ortu.pendidikan_ayah +
                        "']"
                ).prop("selected", true);
                $(
                    "#e-pekerjaan_ayah option[value='" +
                        data.ortu.pekerjaan_ayah +
                        "']"
                ).prop("selected", true);
                $("#e-ibu").val(data.ortu.ibu);
                $("#e-no_ktp_ibu").val(data.ortu.no_ktp_ibu);
                $(
                    "#e-pendidikan_ibu option[value='" +
                        data.ortu.pendidikan_ibu +
                        "']"
                ).prop("selected", true);
                $(
                    "#e-pekerjaan_ibu option[value='" +
                        data.ortu.pekerjaan_ibu +
                        "']"
                ).prop("selected", true);
                $("#e-no_tlp").val(data.ortu.no_tlp);
                $(
                    "#e-pendidikan_santri option[value='" +
                        data.riwayat_santri.pendidikan_santri +
                        "']"
                ).prop("selected", true);
                $("#e-asal_sekolah").val(data.riwayat_santri.asal_sekolah);
                $(
                    "#e-thn_lulus option[value='" +
                        data.riwayat_santri.thn_lulus +
                        "']"
                ).prop("selected", true);
                $(
                    "#e-daftar_kelas option[value='" +
                        data.riwayat_santri.daftar_kelas +
                        "']"
                ).prop("selected", true);

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
                $("#d-no_daftar").text(data.no_daftar);
                $("#d-tgl_daftar").text(data.tgl_daftar);
                $("#d-thn_pelajaran").text(data.thn_pelajaran);
                $("#d-nis").text(data.nis);
                $("#d-nisn").text(data.nisn);
                $("#d-nik").text(data.nik);
                $("#d-nama").text(data.nama);
                $("#d-jenis").text(data.jenis_kelamin);
                $("#d-tempat-lahir").text(data.tempat_lahir);
                $("#d-tanggal-lahir").text(data.tanggal_lahir);
                $("#d-provinsi").text(data.provinsi);
                $("#d-kabupaten").text(data.kabupaten);
                $("#d-kecamatan").text(data.kecamatan);
                $("#d-desa").text(data.desa);
                $("#d-alamat").text(data.alamat);
                $("#d-rt_rw").text(data.rt + "/" + data.rw);
                $("#d-no_kk").text(data.ortu.no_kk);
                $("#d-ayah").text(data.ortu.ayah);
                $("#d-no_ktp_ayah").text(data.ortu.no_ktp_ayah);
                $("#d-pendidikan_ayah").text(data.ortu.pendidikan_ayah);
                $("#d-pekerjaan_ayah").text(data.ortu.pekerjaan_ayah);
                $("#d-ibu").text(data.ortu.ibu);
                $("#d-no_ktp_ibu").text(data.ortu.no_ktp_ibu);
                $("#d-pendidikan_ibu").text(data.ortu.pendidikan_ibu);
                $("#d-pekerjaan_ibu").text(data.ortu.pekerjaan_ibu);
                $("#d-no_tlp").text(data.ortu.no_tlp);
                $("#d-pendidikan_santri").text(
                    data.riwayat_santri.pendidikan_santri
                );
                $("#d-asal_sekolah").text(data.riwayat_santri.asal_sekolah);
                $("#d-thn_lulus").text(data.riwayat_santri.thn_lulus);
                $("#d-daftar_kelas").text(data.riwayat_santri.daftar_kelas);
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

    $("#form-izin").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                if (response.success) {
                    window.location.href = response.redirect_url;
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    if (errors && errors.izin_nis) {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: errors.izin_nis[0],
                        });
                    }
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Terjadi kesalahan. Silakan coba lagi.",
                    });
                }
            },
        });
    });

    $("#izin-form-save").on("submit", function (e) {
        e.preventDefault();
        if ($("#form_izin_keterangan").val() != null) {
            $("#form_izin_keterangan").removeClass("is-invalid");
            $("#error-ket").hide();
        } else if ($("#form_lama_izin").val() != "") {
            $("#form_lama_izin").removeClass("is-invalid");
            $("#error-lama").hide();
        }

        if (
            $("#form_izin_keterangan").val() === null &&
            $("#form_lama_izin").val() === ""
        ) {
            $("#form_izin_keterangan").addClass("is-invalid");
            $("#error-ket").show();
            $("#form_lama_izin").addClass("is-invalid");
            $("#error-lama").show();
        } else if ($("#form_lama_izin").val() === "") {
            $("#form_lama_izin").addClass("is-invalid");
            $("#error-lama").show();
        } else if ($("#form_izin_keterangan").val() === null) {
            $("#form_izin_keterangan").addClass("is-invalid");
            $("#error-ket").show();
        } else {
            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: "Data berhasil disimpan!",
                        confirmButtonText: "OK",
                    }).then(() => {
                        window.location.href = response.redirect_url;
                    });
                },
            });
        }
    });

    $("#izin-delete").on("submit", () => {
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: "Data berhasil dihapus!",
        });
    });

    $("#izin-form-edit").on("submit", function (e) {
        e.preventDefault();
        if ($("#e-form_izin_keterangan").val() != null) {
            $("#e-form_izin_keterangan").removeClass("is-invalid");
            $("#e-error-ket").hide();
        } else if ($("#e-form_lama_izin").val() != "") {
            $("#e-form_lama_izin").removeClass("is-invalid");
            $("#e-error-lama").hide();
        }

        if (
            $("#e-form_izin_keterangan").val() === null &&
            $("#e-form_lama_izin").val() === ""
        ) {
            $("#e-form_izin_keterangan").addClass("is-invalid");
            $("#e-error-ket").show();
            $("#e-form_lama_izin").addClass("is-invalid");
            $("#e-error-lama").show();
        } else if ($("#e-form_lama_izin").val() === "") {
            $("#e-form_lama_izin").addClass("is-invalid");
            $("#e-error-lama").show();
        } else if ($("#e-form_izin_keterangan").val() === null) {
            $("#e-form_izin_keterangan").addClass("is-invalid");
            $("#e-error-ket").show();
        } else {
            $.ajax({
                url: $(this).attr("action"),
                type: "post",
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: "Data berhasil diedit",
                        confirmButtonText: "OK",
                    }).then(() => {
                        window.location.href = response.redirect_url;
                    });
                },
            });
        }
    });
});

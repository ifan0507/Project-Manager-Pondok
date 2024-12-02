$(document).ready(function () {
    $("#pendaftaran-form").on("submit", function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Apakah anda sudah yakin?",
            text: "data sudah benar",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#25c450",
            cancelButtonColor: "#d33",
            confirmButtonText: "Kirim!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: $(this).attr("action"),
                    data: $(this).serialize(),
                    success: function (response) {
                        $("#pendaftaran-form")[0].reset();
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil!",
                            text: "Data berhasil dikirm!",
                        }).then(() => {
                            window.location.href = "/";
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
            }
        });
    });
});

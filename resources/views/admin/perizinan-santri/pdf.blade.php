<!DOCTYPE html>
<html>

<head>
    <title>Surat Perizinan Santri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
            /* Perkecil ukuran font */
        }

        .container {
            width: 90%;
            /* Kurangi lebar untuk menghemat ruang */
            margin: auto;
            padding: 10px;
            /* Perkecil padding */
            border: 1px solid #000;
            position: relative;
        }

        .header,
        .footer {
            text-align: center;
            margin-bottom: 10px;
            /* Kurangi margin */
        }

        .header img {
            width: 60px;
            /* Perkecil logo */
            height: 60px;
        }

        .header h1 {
            margin: 5px 0;
            font-size: 18px;
            /* Perkecil ukuran font */
        }

        .header h2 {
            margin: 2px 0;
            font-size: 14px;
        }

        .header p {
            font-size: 12px;
        }

        h2.title {
            text-align: center;
            text-decoration: underline;
            margin-bottom: 10px;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            z-index: -1;
            max-width: 300px;
            /* Kurangi ukuran watermark */
            max-height: 300px;
        }

        .content {
            margin: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        table td {
            padding: 5px;
            /* Perkecil padding */
            vertical-align: top;
        }

        table td:first-child {
            width: 35%;
            /* Tambahkan lebar untuk kolom pertama */
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
        }

        .signature {
            width: 45%;
            text-align: center;
            float: left;
        }

        .clearfix {
            clear: both;
        }

        .signature p {
            margin-bottom: 50px;
            /* Kurangi spasi kosong */
        }

        .signature .name {
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Watermark -->
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="watermark">

        <!-- Header -->
        <div class="header">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
            <h1>PP NURUL HUDA</h1>
            <h2>Jl. Pesantren No. 178, Mangunsari, Tekung</h2>
            <p>Telp: (021) 123-4567 | Email: info@pesantrennurulhuda.com</p>
            <hr>
        </div>

        <!-- Title -->
        <h2 class="title">Surat Perizinan Santri</h2>
        <p style="text-align: center;">Nomor: 001/SP/{{ date('Y') }}</p>

        <!-- Content -->
        <div class="content">
            <p><strong>Kepada Yth,</strong></p>
            <p>Bapak/Ibu/Wali dari santri berikut:</p>
            <table>
                <tr>
                    <td>NIS</td>
                    <td>: {{ $izin->santri->nis }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>: {{ $izin->santri->nama }}</td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>: {{ $izin->keterangan }}</td>
                </tr>
                <tr>
                    <td>Lama Izin</td>
                    <td>: {{ $izin->lama_izin }} hari</td>
                </tr>
                <tr>
                    <td>Tanggal Izin</td>
                    <td>: {{ $izin->tgl_izin }}</td>
                </tr>
                <tr>
                    <td>Tanggal Kembali</td>
                    <td>: {{ $izin->tgl_kembali }}</td>
                </tr>
            </table>
            <p>Dengan ini kami memberikan izin kepada santri yang bersangkutan untuk meninggalkan pesantren selama
                waktu yang telah ditentukan. Mohon agar dapat memperhatikan waktu kembali sesuai jadwal yang telah
                ditetapkan.</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="signature">
                <p><strong>Pengasuh PP Nurul Huda</strong></p>
                <p class="name">(Muhammad Rosyid Ridho)</p>
            </div>

            <div class="signature">
                <p><strong>Pengurus Pesantren</strong></p>
                <p class="name">(_________________________)</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>

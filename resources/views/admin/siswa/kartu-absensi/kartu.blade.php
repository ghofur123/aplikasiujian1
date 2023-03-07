<!DOCTYPE html>
<html>

<head>
    <title>Kartu Peserta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .kartu-peserta-seleksi {
            padding: 16px;
            width: 415px;
            border: 1px solid black;
        }

        .kartu-peserta-seleksi p {
            font-size: 8pt;
        }

        .kartu-peserta-seleksi td,
        .kartu-peserta-seleksi .footer-wrapper p {
            font-size: 9.5pt;
        }

        .kartu-peserta-seleksi .head-wrapper {
            display: flex;
            padding: 8pt;
            flex-direction: row;
            margin: -16px -16px 0;
            align-items: center;
            justify-content: center;
            border-bottom: 2px solid black;
        }

        .kartu-peserta-seleksi .head-wrapper .sec {
            width: 60px;
            text-align: center;
        }

        .kartu-peserta-seleksi .head-wrapper .sec:nth-child(2) {
            flex: 1;
        }

        .kartu-peserta-seleksi .head-wrapper img {
            height: 50px;
        }

        .kartu-peserta-seleksi .head-wrapper .sec:last-child {
            font-weight: 900;
        }

        .kartu-peserta-seleksi .head-wrapper .sec:nth-child(-1n+3) p {
            margin-bottom: 0;
        }

        .kartu-peserta-seleksi .head-wrapper .sec:nth-child(2) p:nth-child(-n+3) {
            font-weight: bold
        }

        .kartu-peserta-seleksi .content-wrapper {
            padding: 16px 0;
        }


        .kartu-peserta-seleksi .content-wrapper tr:nth-last-child(-n+2) td:last-child {
            color: blue;
        }

        .kartu-peserta-seleksi .content-wrapper tr td:nth-child(2) {
            width: 15px;
            text-align: center;
        }

        .kartu-peserta-seleksi .footer-wrapper {
            text-align: right;
        }

        .kartu-peserta-seleksi .footer-wrapper p {
            margin-bottom: 0
        }
    </style>
</head>

<body>
    <div class="kartu-peserta-seleksi-wrapper">
        @php
        $no =1;
        @endphp
        @foreach ($data as $item)
        <div class="kartu-peserta-seleksi" style="float: left; margin:5px;">
            <div class="head-wrapper">
                <div class="sec">
                    <img class="img-thumbnail" src="https://global.ac.id/wp-content/uploads/2018/05/stmik-global.png" alt="MA KHAS KEMPEK">
                </div>
                <div class="sec">
                    <p>KARTU PESERTA</p>
                    <p>{{$item->nama_lembaga}}</p>
                    <p>{{$item->alamat}}</p>
                    <p>TAHUN PELAJARAN {{date('Y')}}</p>
                </div>
                <div class="sec">
                    <p>PESERTA</p>
                </div>
            </div>
            <div class="content-wrapper">

                <table>
                    <tbody>
                        <tr>
                            <td>No.</td>
                            <td>:</td>
                            <td><strong>{{$no++}}</strong></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><strong>{{$item->name}}</strong></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><strong>{{$item->email}}</strong></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><strong>{{$item->password}}</strong></td>
                        </tr>
                        <tr>
                            <td>Sekolah Asal</td>
                            <td>:</td>
                            <td>{{$item->nama_lembaga}}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        @endforeach
    </div>
</body>

</html>
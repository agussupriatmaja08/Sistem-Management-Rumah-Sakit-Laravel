<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak</title>

    <style>
        .page {
            width: 175mm;
            height: 250mm;
            font-size: 13pt;
            padding: 20px;
            margin: auto;
            border: 1px solid black;

        }

        .kanan {
            height: 50px;
            width: 200px;

            margin-right: 100px;
            margin-left: 500px;


        }

        .download {
            width: 100px;
            height: 30px;
            border-radius: 5px;
            color: white;
            background-color: rgb(6, 156, 6);
        }
    </style>
</head>

<body>




    <div class="page">
        <center>
            <h3>Surat Rujukan</h3>
        </center>
        <br> 
        <div class="kanan">
            <p>Yth. {{ $d['nama'] }}   
                <br>di <br> Rumah Sakit Sulang
            </p>
        </div>
        <br> 

        <p>Mohon pemeriksaan dan pengobatan lanjut kepada penderita</p>

        <table>
            <tr>
                <td>Nik </td>
                <td>:</td>
              <td>{{ $nik }}</td> 
            </tr>
            <tr>
                <td>Nama </td>
                <td>:</td>
                <td>{{ $nama }}</td> 
            </tr>
            <tr>
                <td>Jenis Kelamin </td>
                <td>:</td>
                <td>{{ $jenisKelamin }}</td> 
            </tr>
            <tr>
                <td>Tanggal Lahir </td>
                <td>:</td>
                <td>{{ $tl }}</td> 
            </tr>
            <tr>
                <td>Umur</td>
                <td>:</td>
                <td>{{ $umur }}</td> 
            </tr>
            <tr>
                <td>No Telp</td>
                <td>:</td>
                <td>{{ $noTelp }}</td> 
            </tr>
            <tr>
                <td>Alamat </td>
                <td>:</td>
                <td>{{ $alamat }}</td> 
            </tr>
            <tr>
                <td>Keluhan</td>
                <td>:</td>
                <td>{{ $keluhan }}</td> 
            </tr>

            <tr>
                <td>Diagnosa sementara </td>
                <td>:</td>
                <td>{{ $diagnosa }}</td> 
            </tr>
            <tr>
                <td>Terapi/obat yang telah diberikan </td>
                <td>:</td>
                <td>{{ $obat }}</td> 
            </tr>
        </table>

        <p>Demikian surat rujukan ini kami kirimkan, kami mohon atas balasan dari surat ini. Atas perhatian
            Bapak/Ibu
            kami ucapkan terima kasih</p>
        <br> <br>
        <div class="kanan">
            <p>{{ $dRujukan }}, {{ $tglRujukan }}</p>  
            <p>Hormat kami</p>

            <br> <br>
            <p>{{ $pRujukan }}</p> 
        </div>

    </div>
    <center>
        

</body>

</html>

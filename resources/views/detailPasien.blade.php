@extends('layouts.detail')

@section('content')
    <style>
        .card1 {
            margin-left: 150px;
            height: 300px;
            width: 800px;

            margin: auto;
            display: flex;
            margin-top: 50px;

        }

        .foto {
            width: 40%;
            height: 300px;



        }

        .isi {
            width: 60%;
            height: 300px;
            font-size: 20px;

        }

        img {
            border-radius: 10px;
            width: 200px;
            height: 200px;
        }
    </style>
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../css/form.css">
    <center>
        <div class="card1">
            <div class="foto"> <img src="{{ asset('storage/' . 'foto/' . $post['img'])}}" alt=""> </div>
            <div class="isi">
                <table>
                    <tr>
                        <td>Nik</td>
                        <td>:</td>
                        <td>{{ $post['nik'] }}</td>
                    </tr>
                    <tr>
                        <td>Id</td>
                        <td>:</td>
                        <td>{{ $post['id'] }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{ $post['nama'] }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{ $post['tl'] }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ $post['alamat'] }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ $post['jenisKelamin'] }}</td>
                    </tr>

                </table>
            </div>
        </div>
        
        <a href="/pasien/detail/{{ $post['id'] }}"> <button class="btn btn-success text-light ">Detail </button> </a>
        <a href="/pasien/hapus/{{ $post['id'] }}"> <button class="btn btn-danger"
                onclick=" return confirm('Yakin ID-{{ $post['id'] }} dihapus ?')">Hapus </button></a>
        <a href="/pasien/ubah/{{ $post['id'] }}"> <button class="btn btn-info text-light ">Ubah </button> </a>
        <br> <br>
        <a href="/pasien"><button class="btn btn-danger">Kembali</button></a>       

    </center>
@endsection

{{-- disabled tidak memungkinkan valuenya akan diakses --}}

@extends('layouts.main')

@section('content')
    <style>
        label {
            display: inline-block;
            width: 100px;
            text-align: right;
            margin-right: 10px;
        }

        input[type="text"] {
            display: inline-block;
            width: 200px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .errorMessange {
            width: 100%;
            background-color: red;
            color: white;
            filter: opacity(0.5);

        }
        .imgRujukan{
            border-radius: 5px;
            width: 150px;
            height: 180px;
        }
    </style>

    <center>

        <div style="margin-top: 100px"></div>
        <form action="/rujukan" method="GET">
            <label for="cari">Id Pasien</label>

            <input type="text" id="cari" name="cari" placeholder="Masukkan Id Pasien" value="{{ $value }}">

            <button type="submit" class="btn btn-success">Cari</button>
        </form>

        @if ($ada === 'ada')
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('/storage/' . $pasien->img) }}" alt="" class="mt-5 imgRujukan">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text">
                        <table>
                            <tr>
                                <td>Id</td>
                                <td>{{ $pasien['id'] }}</td>
                            </tr>
                            <tr>
                                <td>Nik</td>
                                <td>{{ $pasien['nik'] }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>{{ $pasien['nama'] }}</td>
                            </tr>
                            <td>Alamat</td>
                            <td>{{ $pasien['alamat'] }}</td>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>{{ $pasien['jenisKelamin'] }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>{{ $pasien['tl'] }}</td>
                            </tr>
                        </table>

                        </p>
                         <a href="/formRujukan/{{ $pasien['id'] }}"><button class="btn bg-primary text-light"> Buat Rujukan </button></a>
                    </div>
                </div>
            </div>
        </div>
    
            
        @endif
        
       
    {!! $validasi !!}
</center>


    {{-- 
       <a href="/bpjs"><button class="btn btn-success">Pasien BPJS</button></a>
        <a href="/umum"> <button class="btn  bg-primary text-light">Pasien Umum</button></a> --}}
@endsection

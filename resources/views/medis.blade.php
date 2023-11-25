@extends('layouts.main')


@section('content')
    <!DOCTYPE html>
    <html>

    <head>


    </head>

    <body>

        <div class="atas">
            <div class="atass">

                <form action="/searchMedis" method="POST" class="formSearch">
                    @csrf
                    <div class="atas1">
                        <div>
                            <input type="text" name="search" id="search" placeholder="Search..." value="{{ $oldReq }}">
                        </div>
                        <div><button type="submit"class="btn btn-success btnSearch">Search</button></div>
                    </div>
                </form>
            </div>
            <div class="btnAddnap">

                <a href="/addMedis"><button class="btn btn-light bg-success text-light addInap">Tambah Data
                        Medis</button></a>
            </div>
        </div>

        <br> <br>

        <center>
            <h1>Data Tenaga Medis</h1>
        </center>
        @if ($errors->has('error'))
        <br>
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
        @endif

        <br>
        <table>
            <thead>
                <tr>
                    <th>No Tenaga Medis</th>
                    <th>Nama</th>
                    <th>Elemen</th>
                    <th>Ruangan</th>
                    <th>Jenis Kelamin</th>
                    <th>Pengaturan</th>

                </tr>
                @foreach ($post as $p)
                    <tr>
                        <td>{{ $p['id'] }}</td>
                        <td>{{ $p['nama'] }}</td>
                        <td>{{ $p['elemen'] }}</td>
                        <td>{{ $p['kodeRuangan'] }}</td>
                        <td>{{ $p['jenisKelamin'] }}</td>
                        <td>
                            <a href="/hapusMedis/{{ $p['id'] }}"><button class="btn btn-danger" onclick="return confirm('Yakin id-{{ $p['id'] }} dihapus?') ">Hapus</button></a> 
                            <a href="/editMedis/{{ $p['id'] }}"> <button class="btn btn-info text-light">Edit</button></a>
                        </td>


                    </tr>
                @endforeach


                </tbody>
        </table>
        <br> <br> <br>
        <center> <b> Keterangan</b></center>
        <br>
        <table>
            <tr>
                <th>Nama Ruangan</th>
                <th>Kode Ruangan</th>
            </tr>

            <tr>
                <td>UGD</td>
                <td>6</td>
            </tr>
            <tr>
                <td>ICU</td>
                <td>9</td>
            </tr>
            <tr>
                <td>Ruangan Operasi</td>
                <td>2</td>
            </tr>
        </table>
    </body>

    </html>
@endsection

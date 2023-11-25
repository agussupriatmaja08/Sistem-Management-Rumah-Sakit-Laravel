@extends('layouts.main')


@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        


    </head>

    <body>
        <div class="atas">
            <div class="atass">

                <form action="/searchInap" method="POST" class="formSearch">
                    @csrf
                    <div class="atas1">
                        <div>
                            <input type="text" name="search" id="search" placeholder="Search..." value="{{ $oldReq }}" >
                        </div>
                        <div><button type="submit"class="btn btn-success btnSearch">Search</button></div>
                    </div>
                </form>
            </div>
            <div class="btnAddnap">

                <a href="/tambahInap"><button class="btn btn-light bg-success text-light addInap">Tambah Data Inap</button></a>
            </div>

        </div>

        <br> <br>
        <center>
            <h1>Data Pasien Inap</h1>
        </center>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Kode Inap</th>
                    <th>Id Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Id Ruangan</th>
                    <th>Ruangan</th>
                    <th>Tempat Ruangan</th>
                    <th>Tanggal Inap</th>
                    <th>No Telp</th>
                    <th>Aksi</th>




                </tr>
                @foreach ($inaps as $inap)
                    <tr>
                        <td>{{ $inap['id'] }}</td>
                        <td>{{ $inap['idPasien'] }}</td>
                        <td>{{ $inap['nama'] }}</td>
                        <td>{{ $inap['kodeRuangan'] }}</td>
                        <td>{{ $inap['ruangan'] }}</td>
                        <td>{{ $inap['alamat'] }}</td>
                        <td>{{ $inap['tglInap'] }}</td>
                        <td>{{ $inap['noTelp'] }}</td>
                        <td><a href="inap/hapus/{{ $inap['id'] }}"
                                onclick=" return confirm('Yakin id-{{ $inap['id'] }} dihapus?')"><button
                                    class="btn btn-danger">Hapus</button></a></td>

                    </tr>
                @endforeach

                </tbody>
        </table>
    </body>

    </html>
@endsection

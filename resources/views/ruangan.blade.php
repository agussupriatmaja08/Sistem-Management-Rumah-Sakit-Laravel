@extends('layouts.main')


@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <style>
            .isi tr td {
                background-color: rgb(3, 174, 32);
                border: 0.5px solid white;

            }
            .isi tr .a{
                background-color: white;
            }

            .isi {
                height: 15px;
                border-radius: 3px;

            }

            .isi tr .terisi {
                background-color: red;
            }

            .keterangan{
                margin-left: 80%;
            }
            
            
        </style>


    </head>

    <div class="atas">
        <div class="atass">

            <form action="/searchRuangan" method="POST" class="formSearch">
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

            <a href="/formRuangan"><button class="btn btn-light bg-success text-light addInap">Tambah Data
                    Ruangan</button></a>
        </div>
    </div>

    <body>
        <br> <br>
        <center>
            <h1>Data Ruangan</h1>
        </center>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Kode Ruangan</th>
                    <th>Ruangan</th>
                    <th>Lantai</th>
                    <th>Blok</th>
                    <th>Status Terisi</th>
                    <th>Kapasitas Pasien</th>



                </tr>
                @foreach ($post as $p)
                    <tr>
                        <td>{{ $p['id'] }}</td>
                        <td>{{ $p['nama'] }}</td>
                        <td>{{ $p['lantai'] }}</td>
                        <td>{{ $p['blok'] }}</td>
                        <td>
                            <table class="isi">
                                <tr>
                                    @if ($p['terisi'] > 0)
                                        @for ($i = 0; $i < $p['terisi']; $i++)
                                            <td class="terisi"></td>
                                        @endfor
                                        @for ($i = 0; $i < $p['sisa']; $i++)
                                            <td></td>
                                        @endfor
                                    @else
                                        @for ($i = 0; $i < $p['max']; $i++)
                                            <td></td>
                                        @endfor
                                    @endif


                                    
                                    {{-- {{ $p['terisi'] }} --}}

                                </tr>
                            </table>
                        </td>
                        <td>{{ $p['max'] }}</td>
                    </tr>
                @endforeach

                </tbody>
        </table>

        <div class="keterangan">
        <br> <br> 
        <h5>Keterangan</h5>
        <table  class="isi">
            <tr>
                <td></td>
                <td class="a">Kosong</td>
            </tr>
            <tr>
                <td class="terisi"></td>
                <td class="a">Terisi</td>
            </tr>
        </table>
    </div>
    </body>

    </html>
@endsection

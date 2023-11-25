

@extends('layouts.main')


@section('content')

<!DOCTYPE html>
<html>
  <head>
  
   
  </head>
  <body>
    <br> <br> 

    <div class="atas">
      <div class="atass">

          <form action="/searchPasien" method="POST" class="formSearch">
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

          <a href="/addPasien"><button class="btn btn-light bg-success text-light addInap">Tambah Data Pasien</button></a>
      </div>

  </div>
    <center><h1>Data Pasien</h1></center>

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
          <th>No Pasien</th>
          <th>Nik</th>
          <th>Nama</th>
          <th>Tanggal Lahir</th>
          <th>Alamat</th>
          <th>Jenis Kelamin</th>
          <th colspan="2">Pengaturan</th>
        </tr>
        @foreach ($data as $p)
            
       
        <tr>
            <td>{{ $p["id"] }}</td>
            <td>{{ $p["nik"] }}</td>
            <td>{{ $p["nama"] }}</td>
            <td>{{ $p["tl"] }}</td>
            <td>{{ $p["alamat"] }}</td>
            <td>{{ $p["jenisKelamin"] }}</td>
            <td>
              <a href="/pasien/detail/{{ $p["id"] }}"> <button class="btn btn-success text-light ">Detail </button> </a> 
              <a href="/pasien/hapus/{{ $p["id"] }}"> <button class="btn btn-danger" onclick=" return confirm('Yakin ID-{{ $p['id'] }} dihapus ?')">Hapus </button></a>
             <a href="/pasien/ubah/{{ $p["id"] }}"> <button class="btn btn-info text-light ">Ubah </button> </a></td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
  </body>
</html>

    
@endsection
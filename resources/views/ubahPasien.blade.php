@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="/css/form.css">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        .formP {
            width: 90%;
            margin: auto;
        }
    </style>
    <div class="formP">
        
        <center>

            <h2>Ubah Data Pasien</h2>
            <form action="/pasien/ubahPasien" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $post['id'] }}" id="id" name="id">
                <label for="nik">Nik:</label>
                <input type="text" id="nik" name="nik" value="{{ $post['nik'] }}" class="form-control @error('nik') is-invalid @enderror">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    @error('nik')
                    {{ $message }}
                    @enderror
                  </div>
                
                <input type="hidden" id="nik" name="oldNik" value="{{ $post['nik'] }}">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ $post['nama'] }}" class="form-control @error('nama') is-invalid @enderror">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    @error('nama')
                    {{ $message }}
                    @enderror
                  </div>

                <label for="tl">Tanggal Lahir:</label>
                <input type="date" id="tl" name="tl" value="{{ $post['tl'] }}" class="form-control @error('tl') is-invalid @enderror">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    @error('tl')
                    {{ $message }}
                    @enderror
                  </div>
                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" value="{{ $post['alamat'] }}" class="form-control @error('alamat') is-invalid @enderror">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    @error('alamat')
                    {{ $message }}
                    @enderror
                  </div>
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                  
                    <option value="{{ $post['jenisKelamin'] }}">{{ $post['jenisKelamin'] }} </option>
                    <option value="Laki-laki">Laki-Laki</option>
                    <option value="Wanita">Wanita</option>
                </select>
                <div id="validationServer03Feedback" class="invalid-feedback">
                    @error('jenis_kelamin')
                    {{ $message }}
                    @enderror
                  </div>
                <div class="mb-3">
                    <label for="formFile"> Upload Foto</label>
                    <input class="form-control @error('img') is-invalid @enderror" type="file" id="formFile" name="img">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        @error('img')
                        {{ $message }}
                        @enderror
                      </div>
                </div>

                <center> <input type="submit" value="Ubah"> </center>
            </form>
        </center>
        <center><a href="/pasien"> <button class="btn btn-danger">Close</button></a></center>
    </div>
@endsection

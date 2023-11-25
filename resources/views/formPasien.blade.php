@extends('layouts.main')

@section('content')
    <style>
        .formP {
            width: 90%;
            margin: auto;
        }
    </style>
    <div class="formP">


        <center>
            <h2>Tambah Data Pasien</h2>
            <form action="/formPasien/savePasien" method="post" enctype="multipart/form-data">
                @csrf
                <label for="nik">Nik:</label>
                <input type="text" id="nik" name="nik" value="{{ old('nik') }}" class="form-control @error('nik') is-invalid @enderror">
                <div  class="invalid-feedback messageError">
                    @error('nik')
                        {{ $message }}
                    @enderror
                </div>
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                    class="form-control @error('nama') is-invalid @enderror">
                <div  class="invalid-feedback messageError">
                    @error('nama')
                        {{ $message }}
                    @enderror
                </div>
                <label for="tl">Tanggal Lahir:</label>
                <input type="date" id="tl" name="tl" value="{{ old('tl') }}"
                    class="form-control @error('tl') is-invalid @enderror">
                <div  class="invalid-feedback messageError">
                    @error('tl')
                        {{ $message }}
                    @enderror
                </div>
                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}"
                    class="form-control @error('alamat') is-invalid @enderror">
                <div  class="invalid-feedback messageError">
                    @error('alamat')
                        {{ $message }}
                    @enderror
                </div>
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}"
                    class="form-control @error('jenis_kelamin') is-invalid @enderror">
                    
                    <option value=""> </option>
                    <option value="Laki-laki">Laki-Laki</option>
                    <option value="Wanita">Wanita</option>
                </select>
                <div class="invalid-feedback messageError">
                    @error('jenis_kelamin')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile"> Upload Foto</label>
                    <input class=" form-control @error('img') is-invalid @enderror" type="file" id="formFile" name="img"
                        >
                    <div  class="invalid-feedback messageError">
                        @error('img')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <center> <input type="submit" value="Daftar"> </center>
            </form>
        </center>
        <center><a href="/pasien"> <button class="btn btn-danger">Close</button></a></center>
    </div>
@endsection

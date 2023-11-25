@extends('layouts.main')

@section('content')
    

    <center>
        <h2>Tambah Data Medis</h2>
        <form action="/saveDataMedis" method="post">
            @csrf 
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required value="{{ old('nama') }}">
            <div  class="invalid-feedback messageError">
                @error('nama')
                    {{ $message }}
                @enderror
            </div>

            <label for="elemen">Elemen:</label>
            <input type="text" id="elemen" name="elemen" required value="{{ old('elemen') }}">
            <div  class="invalid-feedback messageError">
                @error('elemen')
                    {{ $message }}
                @enderror
            </div>

            <label for="jenisKelamin">Jenis Kelamin:</label>
            <select id="jenisKelamin" name="jenisKelamin" required value="{{ old('jenisKelamin') }}">
                <option value="none"> </option>
                <option value="Laki-laki">Laki-Laki</option>
                <option value="Wanita">Wanita</option>
            </select>
            <div  class="invalid-feedback messageError">
                @error('jenisKelamin')
                    {{ $message }}
                @enderror
            </div>

            <label for="ruangan">Ruangan:</label>
            <select id="ruangan" name="ruangan" required value="{{ old('ruangan') }}">
                <option value="none"> </option>
                @foreach ($ruangan as $r)
                <option value={{ $r['id']}}>{{ $r['id']}}-{{  $r["nama"] }} </option>

                    
                @endforeach
                
            </select>
            <div  class="invalid-feedback messageError">
                @error('ruangan')
                    {{ $message }}
                @enderror
            </div>

            <center> <input type="submit" value="Daftar"> </center>
        </form>
    </center>
    <center><a href="/medis"> <button class="btn btn-danger">Close</button></a></center>
@endsection

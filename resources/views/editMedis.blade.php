@extends('layouts.main')

@section('content')
    
<link rel="stylesheet" href="/css/form.css">
<link rel="stylesheet" href="/css/style.css">
    <center>
        <h2>Tambah Data Medis</h2>

        @if ($errors->has('error'))
        <br>
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
        @endif

        <form action="/saveMedis" method="post">
            @csrf 
            <input type="hidden" id="id" name="id" required value="{{ $medis['id'] }}">

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required value="{{ $medis['nama'] }}" class="form-control @error('nama') is-invalid @enderror">
            <div id="validationServer03Feedback" class="invalid-feedback">
                @error('nama')
                {{ $messages }}
                @enderror
              </div>

            <label for="elemen">Elemen:</label>
            <input type="text" id="elemen" name="elemen" required value="{{ $medis['elemen'] }}" class="form-control @error('elemen') is-invalid @enderror">
            <div id="validationServer03Feedback" class="invalid-feedback">
                @error('elemen')
                {{ $messages }}
                @enderror
              </div>

            <label for="jenisKelamin">Jenis Kelamin:</label>
            <select id="jenisKelamin" name="jenisKelamin" required  class="form-control @error('jenisKelamin') is-invalid @enderror">
                <option value="{{ $medis['jenisKelamin'] }}"> </option>
                <option value="Laki-laki">Laki-Laki</option>
                <option value="Wanita">Wanita</option>
            </select>
            <div id="validationServer03Feedback" class="invalid-feedback">
                @error('jenisKelamin')
                {{ $messages }}
                @enderror
              </div>

            <label for="ruangan">Ruangan:</label>
            <select id="ruangan" name="ruangan" required  class="form-control @error('kodeRuangan') is-invalid @enderror">
                <option value="{{ $medis['kodeRuangan'] }}"> </option>
                @foreach ($ruangan as $r)
                <option value={{ $r['id']}}>{{ $r['id']}}-{{  $r["nama"] }} </option>

                    
                @endforeach
                
            </select>
            <div id="validationServer03Feedback" class="invalid-feedback">
                @error('ruangan')
                {{ $messages }}
                @enderror
              </div>

            <center> <input type="submit" value="Simpan"> </center>
        </form>
    </center>
    <center><a href="/medis"> <button class="btn btn-danger">Close</button></a></center>
@endsection

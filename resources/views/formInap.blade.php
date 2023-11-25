@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="../css/style.css">

<link rel="stylesheet" href="../css/form.css">
    <center>

        <h2>Form Penempatan Ruangan</h2>
        @if ($errors->has('error'))
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
        @endif
        <form action="/kirimRuanganInap/{{ $pasien['id'] }}" method="post">
            @csrf

            <label for="id">Id:</label>
            <input type="text" id="id" name="id" required value="{{ $pasien['id'] }}" disabled>
            <label for="nik">Nik:</label>
            <input type="text" id="nik" name="nik" required value="{{ $pasien['nik'] }}" disabled>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required value="{{ $pasien['nama'] }}" disabled>
            <label for="jenisKelamin">Jenis Kelamin:</label>
            <input type="text" id="jenisKelamin" name="jenisKelamin" required value="{{ $pasien['jenisKelamin'] }}" disabled>
            <label for="tl">Tanggal Lahir:</label>
            <input type="text" id="tl" name="tl" required value="{{ $pasien['tl'] }}" disabled>
            <label for="umur">Umur:</label>
            <input type="text" id="umur" required value="{{ $umur->y}} tahun {{ $umur->m}} bulan {{$umur->d}} hari" disabled>
            <label for="umur">Umur:</label>
            <input type="hidden" id="umur" name="umur" required value="{{ $umur->y}} tahun {{ $umur->m}} bulan {{$umur->d}} hari">
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required value="{{ $pasien['alamat'] }}" disabled>
            <label for="noTelp">No Telp:</label>
            <input type="number" id="noTelp" name="noTelp" required>
            <label for="ruangan">Ruangan:</label>
            <select name="ruangan" id="ruangan">
                <option></option>
                @foreach ($ruangan as $r)
                @if ($r['terisi'] === $r['max'])
                <option value="{{ $r->id }}" disabled>{{ $r->id }}-{{ $r->nama }} --full </option>       
                    
                @else
                <option value="{{ $r->id }}">{{ $r->id }}-{{ $r->nama }} </option>    
                @endif
                @endforeach
                
            </select>
            <label for="tglInap">Tanggal Inap:</label>
            <input type="date" id="tglInap" name="tglInap">
            
        



            <center> <input type="submit" value="Tambahkan"></center>
        </form>
    </center>
    <center><a href="/rujukan"> <button class="btn btn-danger">Close</button></a></center>
@endsection

{{-- disabled tidak memungkinkan valuenya akan diakses--}}
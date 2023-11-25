@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="../css/style.css">

<link rel="stylesheet" href="../css/form.css">
    <center>

        <h2>Formulir Surat Rujukan</h2>
        <form action="/kirimRujukan/{{ $pasien['id'] }}" method="post">
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
            <input type="text" id="noTelp" name="noTelp" required>
            <label for="keluhan">Keluhan:</label>
            <input type="text" id="keluhan" name="keluhan" required>
            <label for="diagnosa">Diagnosa:</label>
            <input type="text" id="diagnosa" name="diagnosa" required>
            <label for="obat">obat yang telah diberikan:</label>
            <input type="text" id="obat" name="obat" required>

            <label for="dokter">Kepada Dokter:</label>
            <select name="dokter" id="dokter">
                <option></option>
                @foreach ($dokter as $d)
                    <option value="{{ $d['id'] }}">{{ $d["nama"] }}-{{ $d["id"] }} </option>
                @endforeach


            </select>


            <label for="pRujukan">Pembuat Rujukan:</label>
            <input type="text" id="pRujukan" name="pRujukan" required>
            
            <label for="dRujukan">Dari Rujukan:</label>
            <input type="text" id="dRujukan" name="dRujukan" required>
            <label for="tglRujukan">Tanggal Rujukan:</label>
            <input type="date" id="tglRujukan" name="tglRujukan" required>



            <center> <input type="submit" value="Cetak Rujuk"></center>
        </form>
    </center>
    <center><a href="/rujukan"> <button class="btn btn-danger">Close</button></a></center>
@endsection

{{-- disabled tidak memungkinkan valuenya akan diakses--}}
@extends('layouts.main')

@section('content')
    

    <center>
        <h2>Tambah Data Ruangan</h2>
        <form action="/saveRuangan" method="post">
            @csrf 
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama">

            <label for="lantai">Lantai:</label>
            <input type="number" id="lantai" name="lantai">

            <label for="blok">Blok:</label>
            <input type="text" id="blok" name="blok">
            
            <label for="max">Kapasitas:</label>
            <input type="number" id="max" name="max">
            <input type="hidden" name="terisi" value=0>

            
            <center> <input type="submit" value="Daftar"> </center>
        </form>
    </center>
    <center><a href="/ruangan"> <button class="btn btn-danger">Close</button></a></center>
@endsection

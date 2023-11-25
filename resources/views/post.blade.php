@extends('layouts.main')
@section('content')
@foreach ($post as $arrPostt)

    <a href="post/{{ $arrPostt["id"] }}"> <h2>Judul {{ $arrPostt["judul"] }}</h2></a>
    <h5>by {{ $arrPostt["autor"] }}</h5>
    <br>
    <p>{{ $arrPostt["isi"] }}</p>
    <br> <br>
@endforeach

@endsection
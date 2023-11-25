@extends('layouts.main')
@section('content')

@foreach ($post as $arrPostt)
{{-- @dd(isset( $arrPostt['autor'])? $arrPostt['autor'] : "" ) --}}
    <h2>Judul {{$arrPostt['judul'] }}</h2>
    <h5>by {{  $arrPostt['autor'] }}</h5>
    <br>
    <p>{{ $arrPostt['isi']}}</p>

    <br> <br>
    


@endforeach
<a href="/post"><button class="btn btn-danger">Back</button></a>

@endsection
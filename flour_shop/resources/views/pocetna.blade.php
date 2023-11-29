@extends("layouts.main")
<link rel="stylesheet" href="{{ asset('/css/proizvod.css') }}">
@section("sadrzaj")

<img src="images/novine.jpg" alt="">

<h1>Naši proizvodi:</h1>

@php
        $proizvod = App\Models\Proizvod::all(); 
    @endphp

{{-- @include('proizvod') --}}

{{-- @include('kontakt') --}}
@endsection

<style>

</style>
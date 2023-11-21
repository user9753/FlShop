@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('css/naruci.css') }}">
@section('sadrzaj')
    <div>
        <h2>{{ $proizvod->naziv }}</h2>
        <img src="{{ asset('images/' . $proizvod->slika) }}" alt="{{ $proizvod->naziv }}">
        <p>Opis: {{ $proizvod->opis }}</p>
        <p>Cena: <b>{{ $proizvod->cena }}</b> dinara</p>
        <p>Raspoloživo: {{ $proizvod->raspolozivo }} komada</p>

            <form method="post" action="{{ route('dodajUKorpu', ['id' => $proizvod->id]) }}">

            @csrf
            <input type="hidden" name="proizvod_id" value="{{ $proizvod->id }}">

    <label>Izaberite pakovanje:</label>
    <br>
    <input type="radio" name="pakovanje" id="pakovanje-1" value="1" checked>
    <label for="pakovanje-1">1 kg</label>

    <input type="radio" name="pakovanje" id="pakovanje-5" value="5">
    <label for="pakovanje-5">5 kg</label>

    <input type="radio" name="pakovanje" id="pakovanje-25" value="25">
    <label for="pakovanje-25">25 kg</label>

<br><br>
                
                <label for="kolicina">Količina:</label>
                <input type="number" name="kolicina" id="kolicina" value="1" min="1">
<br><br>
        <button type="submit">Dodaj u korpu</button>
    </form>
</div>


@endsection

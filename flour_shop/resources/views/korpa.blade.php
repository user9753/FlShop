@extends("layouts.main")
<link rel="stylesheet" href="{{ asset('css/korpa.css') }}">
@section("sadrzaj")

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h1>Vaša korpa</h1>

@if(count($proizvodiUKorpi) > 0)
    <table>
        <thead>
            <tr>
                <th>Slika</th>
                <th>Proizvod</th>
                <th>Količina</th>
                <th>Cena</th>
                <th>Ukupno</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proizvodiUKorpi as $narudzbina)
                <tr>
                    <td><img src="{{ asset('images/' . $narudzbina->proizvod->slika) }}" alt="{{ $narudzbina->proizvod->naziv }}"></td>
                    <td>{{ $narudzbina->proizvod->naziv }}</td>
                    <td>{{ $narudzbina->ukupna_kolicina }} x {{ $narudzbina->pakovanje }} kg</td>
                    <td>{{ $narudzbina->proizvod->cena }} din/kg</td>
                    <td>{{ $narudzbina->ukupna_kolicina * $narudzbina ->proizvod->cena }} dinara</td>
                    <td>
                        <form method="POST" action="{{ route('obrisiIzKorpe', $narudzbina->proizvod->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Ukupna cena: <b>{{ $ukupnaCena }} </b> dinara + troskovi dostave (cenovnik mozete pogledati <a href="https://www.posta.rs/DocumentViewer.aspx?IdDokument=1000161&Dokument=stanovnistvo-paketske-srbija-paket-lat.pdf">ovde</a>)</p>

    <div class="button-container">
        <a href="{{ route('proizvod') }}" class="button red">Nastavi kupovinu</a>
        <a href="{{ route('unosAdrese') }}" class="button green">Nastavi za narucivanje</a>
    </div>

    @else
    <p>Vaša korpa je prazna.</p>
@endif

@endsection


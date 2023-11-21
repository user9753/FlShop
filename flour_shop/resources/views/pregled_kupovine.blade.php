@extends("layouts.main")
<link rel="stylesheet" href="{{ asset('css/pregled_kupovine.css') }}">
@section("sadrzaj")
<div class="pregled-kupovine">
    <div class="detalji-za-dostavu">
        <h1>Detalji za dostavu</h1>

        @if($adresa)
            <p>Ime: {{ Auth::user()->name }}</p>
            <p>Ulica: {{ $adresa->ulica }}</p>
            <p>Broj: {{ $adresa->broj }}</p>
            <p>Grad: {{ $adresa->grad }}</p>
            <p>Poštanski broj: {{ $adresa->postanski_broj }}</p>
            <p>Broj telefona: {{ Auth::user()->phone_numb }}</p>
        @endif
    </div>

    <div class="proizvodi-u-korpi">
        <h1>Proizvodi u korpi</h1>

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
                            <td>{{ $narudzbina->ukupna_kolicina * $narudzbina->proizvod->cena }} dinara</td>
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

            <p class="ukupna-cena">Ukupna cena: {{ $ukupnaCena }} dinara + troškovi dostave (cenovnik možete pogledati <a href="https://www.posta.rs/DocumentViewer.aspx?IdDokument=1000161&Dokument=stanovnistvo-paketske-srbija-paket-lat.pdf">ovde</a>)</p>
        @else
            <p>Vaša korpa je prazna.</p>
        @endif
    </div>
</div>
<br><br><br>
        <form method="post" action="{{ route('kreirajPorudzbinu') }}">
            @csrf
            <button type="submit">Kreiraj Porudžbinu</button>
        </form>
@endsection


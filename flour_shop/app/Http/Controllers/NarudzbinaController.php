<?php

namespace App\Http\Controllers;
use App\Models\Proizvod;
use App\Models\Narudzbina;
use App\Models\Adresa;
use App\Models\PoruceniProizvod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NarudzbinaController extends Controller
{

    public function dodajUKorpu(Request $request)
    {
        $narudzbina = new Narudzbina();

        $narudzbina->id_korisnika = auth()->user()->id; 
        $narudzbina->id_proizvoda = $request->proizvod_id; 
        $narudzbina->kolicina = $request->kolicina; 
        $narudzbina->pakovanje = $request->pakovanje; 
        $narudzbina->save(); 

  
   session()->flash('success', 'Proizvod je uspresno dodat u korpu');
   
        return redirect()->route('korpa');
    }

    public function prikaziKorpu()
    {
        $proizvodiUKorpi = Narudzbina::where('id_korisnika', auth()->user()->id)
        ->select('id_proizvoda', 'pakovanje', DB::raw('SUM(kolicina) as ukupna_kolicina'))
        ->groupBy('id_proizvoda', 'pakovanje')
        ->get();
    
        $ukupnaCena = 0; 

        foreach ($proizvodiUKorpi as $narudzbina) {
            $ukupnaCena += $narudzbina->ukupna_kolicina * $narudzbina->proizvod->cena;
        }

        return view('korpa', compact('proizvodiUKorpi', 'ukupnaCena'));
    }

    public function obrisiIzKorpe($id)
{
    $narudzbina = Narudzbina::where('id_proizvoda', $id)->where('id_korisnika', auth()->user()->id)->delete();

    return redirect()->route('korpa')->with('success', 'Proizvod uspešno obrisan iz korpe.');
}

public function prikaziFormu()
{
    return view('unos_adrese');
}

public function sacuvajAdresu(Request $request)
{
    $podaci = $request->validate([
        'name' => 'required|string',
        'ulica' => 'required|string',
        'grad' => 'required|string',
        'broj' => 'required|string', 
        'postanski_broj' => 'required|string', 
        'phone_numb' => 'required|string', 
    ]);

    $korisnik = auth()->user();

    Adresa::updateOrCreate(
        ['id' => $korisnik->id],
        $podaci
    );
    return redirect()->route('nastaviNarucivanje');
}

public function prikaziNastavakNarucivanja()
{
    $adresa = auth()->user()->adresa;

    $proizvodiUKorpi = Narudzbina::where('id_korisnika', auth()->user()->id)
        ->select('id_proizvoda', 'pakovanje', DB::raw('SUM(kolicina) as ukupna_kolicina'))
        ->groupBy('id_proizvoda', 'pakovanje')
        ->get();

    $ukupnaCena = 0;

    foreach ($proizvodiUKorpi as $narudzbina) {
        $ukupnaCena += $narudzbina->ukupna_kolicina * $narudzbina->proizvod->cena;
    }

    return view('pregled_kupovine', compact('adresa', 'proizvodiUKorpi', 'ukupnaCena'));
}

public function kreirajPorudzbinu()
{
    
    if (auth()->check()) {
        $idKorisnika = auth()->user()->id;
    } else {
        $idKorisnika = null; 
    }

    $proizvodiUKorpi = Narudzbina::where('id_korisnika', $idKorisnika)->get();
   
    if ($proizvodiUKorpi->count() > 0) {
        $idNarudzbine = $proizvodiUKorpi->first()->id_narudzbine;
    
        foreach ($proizvodiUKorpi as $narudzbina) {
            PoruceniProizvod::create([
                'id_narudzbine' => $idNarudzbine,
                'id_proizvoda' => $narudzbina->id_proizvoda,
                'pakovanje' => $narudzbina->pakovanje,
                'kolicina' => $narudzbina->kolicina,
                'id_korisnika' => $narudzbina->id_korisnika,
            ]);
        }

    
    

        Narudzbina::where('id_korisnika', $idKorisnika)->delete();

        return redirect()->route('korpa')->with('success', 'Uspešno ste kreirali porudžbinu!');
    }

    return redirect()->route('korpa')->with('error', 'Vaša korpa je prazna.');
}


}

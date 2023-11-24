<?php

namespace App\Http\Controllers;
use App\Models\Proizvod;

use Illuminate\Http\Request;

class AdminProizvodController extends Controller
{

    public function prikaziProizvode()
    {
        $proizvodi = Proizvod::all();
        return view('admin.proizvod', ['proizvodi' => $proizvodi]);
    }
    
    public function obrisiProizvod($id)
    {
        $proizvod = Proizvod::find($id);

        if ($proizvod) {
            $proizvod->delete();
            return redirect()->back()->with('success', 'Proizvod uspešno obrisan.');
        }

        return redirect()->back()->with('error', 'Proizvod nije pronađen.');
    }

    public function izmeniProizvod($id)
    {
        $proizvod = Proizvod::find($id);
        return view('admin.izmeni', compact('proizvod'));
    }

    public function azuriraj(Request $request, $id)
    {
        $request->validate([
            // dodajte pravila validacije prema vašim potrebama
            'naziv' => 'required|string',
            'cena' => 'required|numeric',
            'pakovanje' => 'required|in:1,5,25',
            'opis' => 'required|string',
            'slika' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'raspolozivo' => 'boolean',
        ]);

        $proizvod = Proizvod::find($id);

        $proizvod->naziv = $request->naziv;
        $proizvod->cena = $request->cena;
        $proizvod->pakovanje = $request->pakovanje;
        $proizvod->opis = $request->opis;
        $proizvod->raspolozivo = $request->has('raspolozivo') ? true : false;

        if ($request->hasFile('slika')) {
            // logika za čuvanje slike
            $slika = $request->file('slika');
            $imeSlike = time().'.'.$slika->getClientOriginalExtension();
            $slika->move(public_path('putanja/do/slika'), $imeSlike);

            $proizvod->slika = $imeSlike;
        }

        $proizvod->save();

        return redirect()->route('admin.proizvod.index')->with('message', 'Proizvod je uspešno ažuriran.');
    }
}





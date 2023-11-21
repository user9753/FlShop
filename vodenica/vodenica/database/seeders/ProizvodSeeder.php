<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProizvodSeeder extends Seeder
{
    public function run()
    {
        DB::table('proizvod')->insert([
            [
            'naziv' => 'Ječmeno brašno',
            'cena' => 130,
            'pakovanje' => 1,
            'opis' => '🌾 Kvalitetno Ječmeno Brašno za Zdrave Recepte 🌾

            🌟 Opis proizvoda 🌟
            Ječmeno brašno je prirodni dar prirode koje donosi bogatstvo ukusa i zdravlja u vašu kuhinju. Naša ponuda uključuje visokokvalitetno ječmeno brašno koje će vas oduševiti svojom raznovrsnom primjenom i hranljivim svojstvima.
            
            💡 Zašto odabrati naše ječmeno brašno? 💡
            🌾 100% prirodno: Naše ječmeno brašno je napravljeno od pažljivo odabranih ječmenih zrna bez ikakvih dodataka ili konzervansa.
            🍞 Raznovrsna primjena: Ječmeno brašno je odlično za pečenje ukusnih hlebova, peciva, kolača i palačinki.
            🥗 Zdrava ishrana: Bogato vlaknima i važnim nutrijentima, ječmeno brašno doprinosi vašem zdravom načinu ishrane.
            👩‍🍳 Jednostavna upotreba: Lako se koristi u različitim receptima, omogućavajući vam da kreirate ukusne obroke za svoju porodicu.
            
            ⭐ Zdravstvene Prednosti Ječmenog Brašna ⭐
            Ječam je poznat po svojim brojnim zdravstvenim prednostima, uključujući:
            
            Regulaciju šećera u krvi
            Smanjenje holesterola
            Poboljšanje probave
            Jačanje imunološkog sistema
            Ovom hranjivom bombom dodajte poseban ukus i zdravlje vašim jelima! Ječmeno brašno je sjajan izbor za sve one koji cene kvalitetnu ishranu.',
            'slika' => 'default.jpg',
            'raspolozivo' => true,
            ],
[
    'naziv' => 'Kukuruzno belo brašno',
    'cena' => 120,
    'pakovanje' => 1,
    'opis' => 'Kvalitetno brašno',
    'slika' => 'belikukuruz.jpg',
    'raspolozivo' => true,
],
[
    'naziv' => 'Kukuruzno žuto brašno',
    'cena' => 80,
    'pakovanje' => 1,
    'opis' => 'Kvalitetno brašno',
    'slika' => 'zutikukuruz.jpg',
    'raspolozivo' => true,
],
[
    'naziv' => 'Heljdino brašno',
    'cena' => 250,
    'pakovanje' => 1,
    'opis' => '🌾 Heljdino Brašno za Zdravu Ishranu 🌾

    🌟 Opis proizvoda 🌟
    Heljdino brašno je izvanredno bogato hranjivim sastojcima i nudi vam fantastičan način da obogatite svoju ishranu. Naša ponuda uključuje visokokvalitetno heljdino brašno koje će vas inspirisati da pripremate ukusne obroke i slatkiše.
    
    💡 Zašto odabrati naše heljdino brašno? 💡
    🌾 100% prirodno: Naše heljdino brašno je proizvedeno od pažljivo odabrane heljde bez ikakvih aditiva ili konzervansa.
    🍞 Raznovrsna primjena: Heljdino brašno je izvrsno za pečenje hlebova, kolača, palačinki i raznih peciva.
    🥗 Zdrava ishrana: Heljdino brašno je izvanredan izvor proteina, vlakana i drugih hranjivih sastojaka koji će podržati vaše zdravlje.
    👩‍🍳 Jednostavna upotreba: Lako se koristi u različitim receptima, omogućavajući vam da pripremate ukusne obroke za sebe i svoje najbliže.
    
    ⭐ Zdravstvene Prednosti Heljdinog Brašna ⭐
    Heljda je poznata po svojim brojnim zdravstvenim prednostima, uključujući:
    
    Poboljšanje probave
    Regulaciju šećera u krvi
    Smanjenje rizika od srčanih oboljenja
    Povećanje energije i vitalnosti
    Ovo brašno čini odličnim dodatkom svakodnevnoj ishrani, posebno za one koji žele voditi zdrav i uravnotežen način života.',
    'slika' => 'heljda.jpg',
    'raspolozivo' => true,
],
[
    'naziv' => 'Pšenično integralno brašno',
    'cena' => 110,
    'pakovanje' => 1,
    'opis' => 'Kvalitetno brašno',
    'slika' => 'default.jpg',
    'raspolozivo' => true,
],
[
    'naziv' => 'Ražano brašno',
    'cena' => 110,
    'pakovanje' => 1,
    'opis' => 'Kvalitetno brašno',
    'slika' => 'default.jpg',  
    'raspolozivo' => true,
],
        ]);
    }
}

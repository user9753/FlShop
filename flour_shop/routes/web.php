<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PocetnaController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProizvodController;
use App\Http\Controllers\NarudzbinaController;
use App\Http\Controllers\AdminProizvodController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pocetna');
});


Auth::routes();

//Pocetna
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//O nama
Route::get('/onama', function () {
    return view('onama');
});

//Kontakt
Route::post('/kontakt', [MailController::class, 'sendEmail'])->name('sendEmail');

Route::get('/kontakt', function (){
    return view('kontakt', [
    ]);
});

//Proizvod

Route::get('/proizvod', [ProizvodController::class, 'index'])->name('proizvod');

//Korpa

Route::get('/naruci/{id}', [ProizvodController::class, 'show'])->name('naruci.show')->middleware('auth');

Route::post('/dodajUKorpu', [NarudzbinaController::class, 'dodajUKorpu'])->name('dodajUKorpu')->middleware('auth');

Route::post('/naruci/{id}', [NarudzbinaController::class, 'dodajUKorpu'])->name('naruci.dodajUKorpu')->middleware('auth');

Route::get('/korpa', [NarudzbinaController::class, 'prikaziKorpu'])->name('korpa')->middleware('auth');

Route::delete('/korpa/{id}', [NarudzbinaController::class, 'obrisiIzKorpe'])->name('obrisiIzKorpe');

Route::get('/unos_adrese', [NarudzbinaController::class, 'prikaziFormu'])->name('unosAdrese');
Route::post('/sacuvaj_adresu', [NarudzbinaController::class, 'sacuvajAdresu'])->name('sacuvajAdresu');
Route::get('/pregled_kupovine', [NarudzbinaController::class, 'prikaziNastavakNarucivanja'])->name('nastaviNarucivanje');
Route::post('/kreiraj-porudzbinu', [NarudzbinaController::class, 'kreirajPorudzbinu'])->name('kreirajPorudzbinu');

//Admin

// Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', function () {
        return view('admin/pocetna');
    });

    Route::get('/admin/proizvod', [AdminProizvodController::class, 'prikaziProizvode'])->name('prikaziProizvode');

    Route::get('/izmeni_proizvod/{id}', [AdminProizvodController::class, 'izmeniProizvod'])->name('izmeniProizvod');
    Route::get('/obrisi_proizvod', [AdminProizvodController::class, 'prikaziObrisiProizvod'])->name('prikazi_obrisi_proizvod');

    Route::delete('/obrisi_proizvod/{id}', [AdminProizvodController::class, 'obrisiProizvod'])->name('obrisi-proizvod');

    Route::get('/admin/proizvod/{id}/izmeni', [AdminProizvodController::class, 'izmeni'])->name('izmeni-proizvod');
    Route::put('/admin/proizvod/{id}/azuriraj', [AdminProizvodController::class, 'azuriraj'])->name('azuriraj-proizvod');

    Route::get('/dodaj_proizvod', [AdminProizvodController::class, 'prikaziFormuDodavanje'])->name('dodaj-proizvod');
    Route::post('/dodaj_proizvod', [AdminProizvodController::class, 'dodajProizvod'])->name('sacuvaj-proizvod');
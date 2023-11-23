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
}





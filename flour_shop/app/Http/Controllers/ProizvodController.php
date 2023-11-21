<?php

namespace App\Http\Controllers;
use App\Models\Proizvod;
use Illuminate\Http\Request;

class ProizvodController extends Controller
{
    public function index(Request $request)
{
        $proizvod = Proizvod::getAll();

    return view('proizvod')->with('proizvod', $proizvod);
}


}

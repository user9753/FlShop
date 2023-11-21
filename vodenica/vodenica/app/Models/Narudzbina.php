<?php

namespace App\Models;
use App\Models\Proizvod;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Narudzbina extends Model
{
    use HasFactory;

    protected $table = 'narudzbine'; // Ime tabele u bazi podataka

    protected $fillable = [
        'id_korisnika', 
        'id_proizvoda', 
        'kolicina', 
        'pakovanje', 
    ];

    public function proizvod()
    {
        return $this->belongsTo(Proizvod::class, 'id_proizvoda', 'id');
    }
}

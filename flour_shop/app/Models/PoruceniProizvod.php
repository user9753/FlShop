<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoruceniProizvod extends Model
{
    use HasFactory;
    public $table = 'poruceno'; 
    protected $fillable = [
        'id_poruceno',
        'id_proizvoda',
        'kolicina',
        'pakovanje',
        'id_korisnika', 
    ];

    public function proizvod()
    {
        return $this->belongsTo(Proizvod::class, 'id_proizvoda');
    }
}

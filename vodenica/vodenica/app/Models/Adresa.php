<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresa extends Model
{
    use HasFactory;

    protected $table = 'adrese'; 

    protected $fillable = [
        'id', 
        'ulica', 
        'broj', 
        'grad', 
        'postanski_broj', 
    ];

    public function korisnik()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}

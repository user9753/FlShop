<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Proizvod extends Model
{
    use HasFactory;
    public $table = 'proizvod'; 
    protected $primaryKey = 'id'; 
    protected $fillable = ['naziv', 'cena', 'pakovanje', 'opis', 'slika', 'raspolozivo'];

    public static function getAll()
    {
        return DB::table('proizvod')->get();
        
    }
  
}

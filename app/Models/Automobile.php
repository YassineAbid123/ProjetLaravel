<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automobile extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference','performance','energie','qtestock','prix','imageartpetitf', 'imageartgrandf'
        ,'categorieID','marqueID'
        ];
        public function categories()
        { 
        return $this->belongsTo(Categorie::class,"categorieID"); 
        }
        public function marques()
        { 
         return $this->belongsTo(Marque::class,"marqueID"); 
        }
        
}

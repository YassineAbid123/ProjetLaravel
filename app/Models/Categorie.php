<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomcategorie','imagecategorie'
        ];
        public function Marques()
{ 
return $this->hasMany(Marque::class ,"categorieID"); 
}
public function automobile()
{ 
return $this->hasMany(Automobile::class,"categorieID"); 
}


        
}

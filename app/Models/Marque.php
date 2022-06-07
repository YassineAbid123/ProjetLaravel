<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;
    protected $fillable = [
        'nommarque','imagemarque','categorieID'
        ];
        public function categories()
        { 
        return $this->belongsTo(Categorie::class,"categorieID"); 
        }
        public function automobile()
{ 
return $this->hasMany(Automobile::class,"marqueID"); 
}
        
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;   
    //Relación unos a muchos inversa
    public function visitantes(){
        return $this->hasMany('App\Models\Visitante');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edad extends Model
{
    use HasFactory;
    protected $guarded =[]; //Introducir los campos que no queremos rellenar por asignación masiva
    //Para hacerlo en positivo usar fillable
    
    //Relación unos a muchos inversa
    public function visitantes(){
        return $this->hasMany('App\Models\Visitante');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    use HasFactory;
    protected $guarded =[]; //Introducir los campos que no queremos rellenar por asignación masiva
    //Para hacerlo en positivo usar fillable
    
    //Relación unos a muchos inversa
    public function visitantes(){
        return $this->hasMany('App\Models\Visitante'); //se puede seguir de la clave foránea si es diferente a visitante_id y de la local si es diferente a id
    }
}

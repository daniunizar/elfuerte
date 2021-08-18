<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Visitante extends Model
{
    use HasFactory;

    protected $guarded =[]; //Introducir los campos que no queremos rellenar por asignación masiva
    //Para hacerlo en positivo usar fillable
    
    //relaciones uno a muchos
    public function sexo(){
        //return $this->belongsTo('App\Models\Sexo');
        //$sexo = Sexo::where('id', $this->id)->first();
        return $this->belongsTo('App\Models\Sexo'); //seguido de clave foránea si es diferente a sexo_id y de clave local si es diferente a id
    }
    public function edad(){
        return $this->belongsTo('App\Models\Edad');
    }
    public function procedencia(){
        return $this->belongsTo('App\Models\Procedencia');
    }
    public function lote(){
        return $this->belongsTo('App\Models\Lote');
    }
}

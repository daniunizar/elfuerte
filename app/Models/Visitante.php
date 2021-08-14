<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    use HasFactory;

    //relaciones uno a muchos
    public function sexos(){
        return $this->hasMany('App\Models\Sexo');
    }
    public function edads(){
        return $this->hasMany('App\Models\Edad');
    }
    public function procedencias(){
        return $this->hasMany('App\Models\Procedencia');
    }
    public function lotes(){
        return $this->hasMany('App\Models\Lote');
    }
}

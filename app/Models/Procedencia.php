<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedencia extends Model
{
    use HasFactory;
    //Relación unos a muchos inversa
    public function visitante(){
        return $this->belongsTo('App\Models\Visitante');
    }
}

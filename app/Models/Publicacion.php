<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    //relacion muchos a muchos
    public function coordinadores(){

    	return $this->belongsToMany(Coordinador::class);
    }

    public function carreras(){

    	return $this->belongsToMany(Publicacion::class);
    }
}

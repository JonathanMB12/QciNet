<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //

	public function coordinador(){

        return $this->hasOne(Coordinador::class);
    }

    public function estudiantes(){

        return $this->hasMany(Estudiante::class);
    }

    public function carreras(){
    	return $this->belongsToMany(Publicacion::class);
    }
}

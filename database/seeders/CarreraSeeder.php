<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carrera;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Carrera::create([
            'nombre_carrera' => 'Ingeniería Biomédica'
           
        ]);
        Carrera::create([
            'nombre_carrera' => 'Ingeniería Civil'
           
        ]);
        Carrera::create([
            'nombre_carrera' => 'Ingeniería en Alimentos y Biotecnología'
           
        ]);
        Carrera::create([
            'nombre_carrera' => 'Ingeniería en Computación'
           
        ]);
        Carrera::create([
            'nombre_carrera' => 'Ingeniería en Comunicaciones y Electrónica'
           
        ]);
        Carrera::create([
            'nombre_carrera' => 'Ingeniería en Informática'
           
        ]);
        Carrera::create([
            'nombre_carrera' => 'Ingeniería en Logística y Transporte'
           
        ]);
        Carrera::create([
            'nombre_carrera' => 'Ingeniería en Topografía Geomática'
           
        ]);
        Carrera::create([
            'nombre_carrera' => 'Ingeniería Fotónica'
           
        ]);
        Carrera::create([
            'nombre_carrera' => 'Ingeniería Industrial'
           
        ]);
        Carrera::create([
            'nombre_carrera' => 'Ingeniería Mecánica Eléctrica'
           
        ]);
        Carrera::create([
            'nombre_carrera' => 'Ingeniería Química'
           
        ]);
        Carrera::create([
            'nombre_carrera' => 'Ingeniería Robótica'
           
        ]);
        Carrera::create([
            'nombre_carrera' => 'Licenciatura en Ciencia de Materiales'
           
        ]);
        Carrera::create([
            'nombre_carrera' => 'Licenciatura en Física'
           
        ]);
        Carrera::create([
            'nombre_carrera' => 'Licenciatura en Matemáticas'
           
        ]);
        Carrera::create([
            'nombre_carrera' => 'Licenciatura en Química'
           
        ]);
        Carrera::create([
            'nombre_carrera' => 'Licenciatura en Químico Farmacobiólogo'
           
        ]);

    }
}

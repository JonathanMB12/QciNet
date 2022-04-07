<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;
use App\Models\Comentario;
use App\Models\User;
use DB;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('publicacion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('publicacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $publicaciones = Publicacion::all();
        $comentarios = Comentario::all();
        $usuarios = User::all();
        $publicacion = request()->except('_token');
        
        if($request->hasFile('imagen'))
        {
           
                $publicacion['imagen'] = $request->file('imagen')->store('uploads', 'public');
            
        }
        Publicacion::create([
            'titulo' => $publicacion['titulo'],
            'descripcion' => $publicacion['descripcion'],
            'imagen' => $publicacion['imagen'],
        ]);
        $data = DB::table('publicaciones')
        ->selectRaw('DATE(created_at) AS Fecha')
        ->get();
        
        return redirect('home')->with(['publicaciones' => $publicaciones, 'comentarios' => $comentarios, 'usuarios' => $usuarios, 'data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $publicacion = request()->except('_token');
        if($request->hasFile('imagen'))
        {
            
            if($publicacion['imagen'] != 'default_avatar.png'){
               Storage::delete('public/'.$publicacion['imagen']);
            }
            
            $publicacion['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

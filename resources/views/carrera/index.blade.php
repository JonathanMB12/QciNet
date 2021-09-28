@extends('home.index')


@section('content')
<div class="container">

<a href="{{ url('/carrera/create') }}"> Registrar nueva carrera</a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre de la carrera</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($carreras as $carrera)
        <tr>
            <td> {{ $carrera->id}} </td>
            <td> {{ $carrera->nombre_carrera }}</td>
            <td> 
                <a href=" {{ url ('/carrera/'.Hashids::encode($carrera->id).'/edit') }}">
                    Editar
                </a>
                    |
                <form action=" {{ url ('/carrera/'.Hashids::encode($carrera->id)) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿Estas seguro de borrar este registro?')" value="Borrar">

                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $carreras->links() !!}
</div>
@endsection
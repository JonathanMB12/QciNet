@extends('home.index')


@section('content')
<div class="container">

    
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{Session::get('mensaje')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12  col-xs-12">
                        <div class="row">
                            <div class="card-body">
                                <img src="{{ asset('storage').'/'.$user->image}}" width="200px" height="200px">
                            </div>                                                        
                            <div class="col-md-7">
                                <h1>
                                {{ $user->name }}
                                </h1>
                                <table class="table table-light">
                                    <thead class="thead-light">
                                    </thead>
                                    <tbody>               
                                        <tr>
                                            <td> 
                                                <a href=" {{ url ('/usuario/'.Hashids::encode($user->id).'/edit') }}">
                                                    Editar perfil
                                                </a>
                                                    
                                                <form action=" {{ url ('/usuario/'.Hashids::encode($user->id)) }}" class="d-inline" method="post">
                                                    @csrf
                                                    {{ method_field('DELETE')}}
                                                    <input type="submit" onclick="return confirm('¿Estas seguro de borrar este registro?')" value="Borrar">
                                
                                                </form>
                                            </td>
                                        </tr>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
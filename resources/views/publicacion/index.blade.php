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
   
   



<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">

            @foreach($publicaciones as $publicacion)
                
                <div class="card-header">{{ $publicacion->titulo }} </div>
                <div class="card-body"> 
                    <div class="form-group row">
                        

                        <div class="col-md-6">
                            <p> {{ $publicacion->descripcion }}</p>

                        </div>
                    </div> 
                    <div class="form-group row">
                        

                        <div class="col-md-6">
                            <img src="{{ asset('storage').'/'.$publicacion->imagen}}" width="685px" height="526px">

                        </div>
                    </div>

                   
                    <div class="col-md-6 offset-md-4">
                    
                        {!! Form::model(['route' => ['role.store'], 'method' => 'POST']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        
                        
                        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
                        <style>
                            .container {
                                margin: 0 auto;
                                position: relative;
                                width: unset;
                            }
                            #app {
                                width: 60%;
                                margin: 4rem auto;
                            }
                            .question-wrapper {
                                text-align: center;
                            }
                        </style>

                        
                            
                                    
                        <a href="#Form" class="button is-medium has-shadow has-text-white" style="background-color: #0b9cc0">Comment</a>
                        
                        <br><br>
                        <comments></comments>
                        <new-comment></new-comment>
                        <script async src="{{mix('js/app.js')}}"></script>
                        
                        {!! Form::close() !!}
                    </div>
                </div>
                
            @endforeach
        </div>
    </div>
</div>
@endsection
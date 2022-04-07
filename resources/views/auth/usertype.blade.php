<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>QciNet - Red Universitaria</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li>
                            QciNet - Red Universitaria
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    
                </div>
            </div>
        </nav>
     
        <main class="py-4">
            @yield('content')
        </main>
        
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
        
                
                    {!! Form::model($user, ['route' => ['role.store', ['user' => $user]], 'method' => 'POST']) !!}
                    @csrf 
                    {{ method_field('PATCH')}}
                    
                    <div class="card-body">  
                        <input id="id_carrera" name="id_carrera" value= " {{ $carrera }} " readonly>
                        <input id="carrerra_nombre" name="carrera_nombre" value= " {{ $nombre_carrera }} " readonly>
                            
                        
                            
                        
                        @if($coordinador_existente)
                            <div class="card-header">{{ __('BIENVENIDO '.strtoupper($user->name). ' DE LA CARRERA DE '.$nombre_carrera) }} </div>
                            <div class="card-body">  
                                <select id="id_rol" name="id_rol">
                                    <option value="-1"> -- Selecciona una opción --</option>
                                        @foreach($roles as $rol)
                                        <div class="form-group row mb-0">
                                            
                                            @if($rol->name != 'Admin' & $rol->name != 'Coordinador')
                                                
                                                <option value="{{ $rol->id }}"> {{ $rol->name }}</option>
                                                
                                            @endif
                                        </div>       
                                        @endforeach
                                </select>

                                <div class="col-md-6 offset-md-4">
                                            
                                    {!! Form::submit('Siguiente', ['class' => 'btn btn-primary mt-2']) !!}
                                </div>  
                            </div> 
                        @else 
                            <div class="card-header">{{ __('¿ERES ESTUDIANTE O COORDINADOR DE LA CARRERA DE'.' '. $nombre_carrera.'?') }} </div>
                            <div class="card-body">  
                                <select id="id_rol" name="id_rol">
                                    <option value="-1"> -- Selecciona una opción --</option>
                                        @foreach($roles as $rol)
                                            <div class="form-group row mb-0">
                                                
                                                @if($rol->name != 'Admin')
                                                    
                                                    <option value="{{ $rol->id }}"> {{ $rol->name }}</option>
                                                    
                                                @endif
                                            </div>       
                                        @endforeach
                                </select>

                                <div class="col-md-6 offset-md-4">
                                            
                                    {!! Form::submit('Siguiente', ['class' => 'btn btn-primary mt-2']) !!}
                                </div>  
                            </div> 
                        @endif

                       
                        
                       
                                   
                          
                    {!! Form::close() !!}  
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>




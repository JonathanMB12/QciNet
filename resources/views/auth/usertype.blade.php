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
    <script type="text/javascript">
        function mostrar(id, {{ $coordinadores}} ) {
            var coordinadores = json_encode($coordinadores);
            
            for(var i = 1; i < 19; i++){
                
                if (id == i) {
                    //si ya hay un coordinador de la carrera

                    $("#coordinador-estudiante-header").hide();
                    $("#coordinador-estudiante").hide();
                    
                    $("#estudiante-header").show();
                    $("#estudiante").show();
                
                
                }
                else{    
                    
                    $("#estudiante-header").hide();
                    $("#estudiante").hide();

                    $("#coordinador-estudiante-header").show();
                    $("#coordinador-estudiante").show();
                }
                    
                
            }
        }
    </script>                                   

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
                    {{ method_field('PATCH')}}
                    @csrf 
                        <div class="card-header">{{ __('¿De qué carrera eres?') }} </div>
                        <div class="card-body">  
                            <select id="id_carrera" name="carrera_nombre" onchange="mostrar(this.value, $coordinadores);">
                                <option value="-1"> -- Selecciona tu carrera --</option>
                                @foreach($carreras as $carrera)
                                <div class="form-group row mb-0">
                                    <option value="{{ $carrera->id}}"> {{ $carrera->nombre_carrera }}</option>
                                </div>
                                
                                @endforeach
                            </select>

                            
                        </div>
                    
                        <div id="estudiante-header" class="card-header" style="display:none;">{{ __('¿Estudiante '.$user->name.'?') }} </div>
                            <div id="estudiante" class="card-body" style="display:none;">     
                                <div class="form-group row mb-0">
                                    
                                    
                                    @foreach($roles as $role)
                                    @if($role->name != 'Admin' and $role->name != 'Coordinador')
                                    <div  class="col-md-6">
                                        <label>
                                            {!! Form::checkbox('roles', $role->id, null, ['class' => 'mr-1']) !!}
                                            {{$role->name}}
                                        </label>
                                    </div>
                                    @endif
                                    @endforeach
                                        
                                        
                                    <div class="col-md-6 offset-md-4">
                                        
                                        {!! Form::submit('Siguiente', ['class' => 'btn btn-primary mt-2']) !!}
                                    </div>
                                </div>                   
                            </div>
                        

                        <div id="coordinador-estudiante-header" class="card-header" style="display:none;">{{ __('¿Eres coordinador o estudiante '.$user->name.'?') }} </div>
                            <div id="coordinador-estudiante" class="card-body" style="display:none;">     
                                <div class="form-group row mb-0">
                                    
                                    
                                        @foreach($roles as $role)
                                        @if($role->name != 'Admin')
                                        <div class="col-md-6">
                                            <label>
                                                {!! Form::checkbox('roles', $role->id, null, ['class' => 'mr-1']) !!}
                                                {{$role->name}}
                                            </label>
                                        </div>
                                        @endif
                                        @endforeach
                                        
                                        
                                    <div class="col-md-6 offset-md-4">
                                        
                                        {!! Form::submit('Siguiente', ['class' => 'btn btn-primary mt-2']) !!}
                                    </div>
                                </div>                   
                            </div>
                        
                    {!! Form::close() !!}  
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>




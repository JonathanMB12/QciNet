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
        
                    
                    {!! Form::open(['route' => ['role', $data]]) !!}
                    @csrf 
                        <div class="card-header">{{ __('VERIFICA TU CUENTA DE SIIAU') }} </div>
                        <div class="card-body">  
                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">Código SIIAU: </label>
    
                                <div class="col-md-6">
                                    <input id="code" type="text" class="form-control"  name="code" value="{{ old('code') }}" required autocomplete="code" autofocus size="
                                    9" maxlength="9">
    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nip" class="col-md-4 col-form-label text-md-right">NIP: </label>
    
                                <div class="col-md-6">
                                    <input id="nip" type="password" class="form-control"  name="nip" value="{{ old('nip') }}" required autocomplete="nip" autofocus size="10" maxlength="10">
    
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                        
                                {!! Form::submit('Siguiente', ['class' => 'btn btn-primary mt-2']) !!}
                            </div>
                        </div>
                    
                        
                        
                    {!! Form::close() !!}  
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>




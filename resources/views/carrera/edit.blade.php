@extends('home.index')

@section('content')
<div class="container">

<form action=" {{ url('/carrera/'.Hashids::encode($carrera->id)) }}" method="post">
    @csrf
    {{ method_field('PATCH')}}
    @include('carrera.form', ['modo'=> 'Editar'])

</form>
</div>
@endsection
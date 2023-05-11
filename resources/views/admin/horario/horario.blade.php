@extends('layouts.app')
@section('content')
<h1 class="page-title"><center>HORARIOS DE LOS LABORATORIOS</h1>


<div class="btn-group" role="group" aria-label="...">
  
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Seleccione una opción
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            @foreach($laboratorios as $laboratorio)
            <li><a href=" {{ url('/horarios/' . $laboratorio->id) }}">{{ $laboratorio->nombrelab }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
        <!-- bloque de php -->
        @include('plantillaHorario')


@endsection

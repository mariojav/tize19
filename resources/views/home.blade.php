@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
            <div class="panel-heading"> <h3>{{$usuario->name.' '.$usuario->apellidopaterno.' '.$usuario->apellidomaterno.' '.$usuario->email}}</h3></div>

                <div class="panel-body">
                    Bienvenido al sistema de gestion de laboratorio
                </div>
            </div>
        </div>
    </div>
@endsection

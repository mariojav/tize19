@extends('layouts.app')



@section('content')
    <h3 class="page-title">{{$materia->nombremateria}}</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            informacion
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <p>CODIGO : {{$materia->codigomateria}}</p>
                </div>
            </div>
        </div>
    </div>
@stop


@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.materias.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.materias.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nombreMateria', 'Nombre Materia*', ['class' => 'control-label']) !!}
                    {!! Form::text('nombreMateria', old('nombreMateria'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('nombreMateria'))
                        <p class="help-block">
                            {{ $errors->first('nombreMateria') }}
                        </p>
                    @endif -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('codigoMateria', 'Codigo Materia*', ['class' => 'control-label']) !!}
                    {!! Form::text('codigoMateria', old('codigoMateria'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('codigoMateria'))
                        <p class="help-block">
                            {{ $errors->first('codigoMateria') }}
                        </p>
                    @endif -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('descripcionMateria', 'Descripcion Materia', ['class' => 'control-label']) !!}
                    {!! Form::text('descripcionMateria', old('descripcionMateria'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('descripcionMateria'))
                        <p class="help-block">
                            {{ $errors->first('descripcionMateria') }}
                        </p>
                    @endif -->
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

        
@stop


@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.users.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Nombre*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('apellidopaterno', 'Apellido Paterno*', ['class' => 'control-label']) !!}
                    {!! Form::text('apellidopaterno', old('apellidopaterno'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('apellidopaterno'))
                        <p class="help-block">
                            {{ $errors->first('apellidopaterno') }}
                        </p>
                    @endif -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('apellidomaterno', 'Apellido Materno', ['class' => 'control-label']) !!}
                    {!! Form::text('apellidomaterno', old('apellidomaterno'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('apellidomaterno'))
                        <p class="help-block">
                            {{ $errors->first('apellidomaterno') }}
                        </p>
                    @endif -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cedula', 'Cedula*', ['class' => 'control-label']) !!}
                    {!! Form::text('cedula', old('cedula'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('cedula'))
                        <p class="help-block">
                            {{ $errors->first('cedula') }}
                        </p>
                    @endif -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('codigosiss', 'Codigo Siss*', ['class' => 'control-label']) !!}
                    {!! Form::text('codigosiss', old('codigosiss'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('codigosiss'))
                        <p class="help-block">
                            {{ $errors->first('codigosiss') }}
                        </p>
                    @endif -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', 'Correo*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    
                    {!! Form::label('password', 'Contraseña*', ['class' => 'control-label']) !!}
                    <div>
                        <li>minimo 6 caracteres en total</li>
                        <li>minimo 4 letras entre (A-Z) o (a-z)</li>
                        <li>minimo 1 numero entre [0-9] </li>
                        <li>minimo 1 caracter especial entre[.!$#O%]</li>
                    </div>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('roles', 'Seleccione Rol*', ['class' => 'control-label']) !!}
                    {!! Form::select('roles[]', $roles, old('roles'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('roles'))
                        <p class="help-block">
                            {{ $errors->first('roles') }}
                        </p>
                    @endif -->
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

        
@stop


@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.gruposLaboratorio.title')</h3>
    
    {!! Form::model($grupoLaboratorio, ['method' => 'PUT', 'route' => ['admin.gruposLaboratorio.update', $grupoLaboratorio->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nombreGrupoLab', 'Nombre grupo laboratorio*', ['class' => 'control-label']) !!}
                    {!! Form::text('nombreGrupoLab', old('nombreGrupoLab'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('nombreGrupoLab'))
                        <p class="help-block">
                            {{ $errors->first('nombreGrupoLab') }}
                        </p>
                    @endif -->
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('materia_id', 'Materia id*', ['class' => 'control-label']) !!}
                    {!! Form::text('materia_id', old('materia_id'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('materia_id'))
                        <p class="help-block">
                            {{ $errors->first('materia_id') }}
                        </p>
                    @endif -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('laboratorio_id', 'laboratorio id', ['class' => 'control-label']) !!}
                    {!! Form::text('laboratorio_id', old('laboratorio_id'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('laboratorio_id'))
                        <p class="help-block">
                            {{ $errors->first('laboratorio_id') }}
                        </p>
                    @endif -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('diaGrupo', 'dia grupo', ['class' => 'control-label']) !!}
                    {!! Form::text('diaGrupo', old('diaGrupo'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('diaGrupo'))
                        <p class="help-block">
                            {{ $errors->first('diaGrupo') }}
                        </p>
                    @endif -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('horaGrupo', 'hora grupo', ['class' => 'control-label']) !!}
                    {!! Form::text('horaGrupo', old('horaGrupo'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('horaGrupo'))
                        <p class="help-block">
                            {{ $errors->first('horaGrupo') }}
                        </p>
                    @endif -->
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


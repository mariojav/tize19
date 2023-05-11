@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.gruposLaboratorio.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.gruposLaboratorio.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nombreGrupoLab', 'Nombre Grupo Laboratorio*', ['class' => 'control-label']) !!}
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
                {{-- <div class="col-xs-12 form-group">
                    {!! Form::label('materia_id', 'materia id*', ['class' => 'control-label']) !!}
                    {!! Form::text('materia_id', old('materia_id'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('materia_id'))
                        <p class="help-block">
                            {{ $errors->first('materia_id') }}
                        </p>
                    @endif -->
                </div> --}}

                <div class="col-xs-12 form-group">
                    {!! Form::label('materia_id', 'Seleccion Materia', ['class' => 'control-label']) !!}
                    {!! Form::select('materia_id', (new App\Materia())->pluck('nombreMateria','id'), old('nombreMateria'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('materia_id'))
                        <p class="help-block">
                            {{ $errors->first('materia_id') }}
                        </p>
                    @endif
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('laboratorio_id', 'Seleccione Laboratorio', ['class' => 'control-label']) !!}
                    {!! Form::select('laboratorio_id', (new App\Laboratorio())->pluck('nombreLab','id'), old('laboratorio_id'), ['class' => 'form-control select2']) !!}
                    {{-- {!! Form::text('laboratorio_id', old('laboratorio_id'), ['class' => 'form-control', 'placeholder' => '']) !!} --}}
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
                    {!! Form::select('diaGrupo',array('lunes'=>'lunes','martes'=>'martes','miercoles'=>'miercoles','jueves'=>'jueves','viernes'=>'viernes'), old('diaGrupo'), ['class' => 'form-control select2']) !!}
                    {{-- {!! Form::text('diaGrupo', old('diaGrupo'), ['class' => 'form-control', 'placeholder' => '']) !!} --}}
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
                    {!! Form::select('horaGrupo',['6:45-8:15'=>'6:45-8:15','8:15-9:45'=>'8:15-9:45','9:45-11:15'=>'9:45-11:15','11:15-12:45'=>'11:15-12:45','12:45-14:15'=>'12:45-14:15','14:15-15:45'=>'14:15-15:45','15:45-17:15'=>'15:45-17:15','17:15-18:45'=>'17:15-18:45','18:45-20:15'=>'18:45-20:15','20:15-21:45'=>'20:15-21:45'], old('horaGrupo'), ['class' => 'form-control select2']) !!}
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

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

        
@stop


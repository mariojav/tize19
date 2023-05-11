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
                    {!! Form::label('nombregrupolab', 'Nombre grupo laboratorio*', ['class' => 'control-label']) !!}
                    {!! Form::text('nombregrupolab', old('nombregrupolab'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('nombregrupolab'))
                        <p class="help-block">
                            {{ $errors->first('nombregrupolab') }}
                        </p>
                    @endif -->
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {{-- {!! Form::label('materia_id', 'Materia id*', ['class' => 'control-label']) !!}
                    {!! Form::text('materia_id', old('materia_id'), ['class' => 'form-control', 'placeholder' => '']) !!} --}}
                    {!! Form::label('materia_id', 'Seleccion Materia', ['class' => 'control-label']) !!}
                    {!! Form::select('materia_id', (new App\Materia())->pluck('nombremateria','id'), old('nombremateria'), ['class' => 'form-control select2']) !!}
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
                    {{-- {!! Form::label('laboratorio_id', 'laboratorio id', ['class' => 'control-label']) !!}
                    {!! Form::text('laboratorio_id', old('laboratorio_id'), ['class' => 'form-control', 'placeholder' => '']) !!} --}}
                    {!! Form::label('laboratorio_id', 'Seleccione Laboratorio', ['class' => 'control-label']) !!}
                    {!! Form::select('laboratorio_id', (new App\Laboratorio())->pluck('nombrelab','id'), old('laboratorio_id'), ['class' => 'form-control select2']) !!}
                    
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
                    {{-- {!! Form::label('diagrupo', 'dia grupo', ['class' => 'control-label']) !!}
                    {!! Form::text('diagrupo', old('diagrupo'), ['class' => 'form-control', 'placeholder' => '']) !!} --}}
                    {!! Form::label('diagrupo', 'dia grupo', ['class' => 'control-label']) !!}
                    {!! Form::select('diagrupo',array('lunes'=>'lunes','martes'=>'martes','miercoles'=>'miercoles','jueves'=>'jueves','viernes'=>'viernes'), old('diagrupo'), ['class' => 'form-control select2']) !!}
                    
                    <p class="help-block"></p>
                    <!-- @if($errors->has('diagrupo'))
                        <p class="help-block">
                            {{ $errors->first('diagrupo') }}
                        </p>
                    @endif -->
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {{-- {!! Form::label('horagrupo', 'hora grupo', ['class' => 'control-label']) !!}
                    {!! Form::text('horagrupo', old('horagrupo'), ['class' => 'form-control', 'placeholder' => '']) !!} --}}
                    {!! Form::label('horagrupo', 'hora grupo', ['class' => 'control-label']) !!}
                    {!! Form::select('horagrupo',['6:45-8:15'=>'6:45-8:15','8:15-9:45'=>'8:15-9:45','9:45-11:15'=>'9:45-11:15','11:15-12:45'=>'11:15-12:45','12:45-14:15'=>'12:45-14:15','14:15-15:45'=>'14:15-15:45','15:45-17:15'=>'15:45-17:15','17:15-18:45'=>'17:15-18:45','18:45-20:15'=>'18:45-20:15','20:15-21:45'=>'20:15-21:45'], old('horagrupo'), ['class' => 'form-control select2']) !!}
                    
                    <p class="help-block"></p>
                    <!-- @if($errors->has('horagrupo'))
                        <p class="help-block">
                            {{ $errors->first('horagrupo') }}
                        </p>
                    @endif -->
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


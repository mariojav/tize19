@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.gruposMateria.title')</h3>
    
    {!! Form::model($grupoMateria, ['method' => 'PUT', 'route' => ['admin.gruposMateria.update', $grupoMateria->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nombregrupomat', 'Nombre grupo Materia*', ['class' => 'control-label']) !!}
                    {!! Form::text('nombregrupomat', old('nombregrupomat'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('materia_id', 'Seleccion Materia', ['class' => 'control-label']) !!}
                    {!! Form::select('materia_id', (new App\Materia())->pluck('nombreMateria','id'), old('nombreMateria'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('user_id', 'Seleccione Docente', ['class' => 'control-label']) !!}
                    {{-- {!! Form::select('user_id', (new App\User())->pluck('name','id'), old('user_id'), ['class' => 'form-control select2']) !!} --}}
                    {!! Form::select('user_id',$hola->pluck('$var','$key'), old('user_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                </div>
            </div>

            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


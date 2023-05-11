@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.materias.title')</h3>
    
    {!! Form::model($materia, ['method' => 'PUT', 'route' => ['admin.materias.update', $materia->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nombremateria', 'Nombre*', ['class' => 'control-label']) !!}
                    {!! Form::text('nombremateria', old('nombremateria'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('nombremateria'))
                        <p class="help-block">
                            {{ $errors->first('nombremateria') }}
                        </p>
                    @endif -->
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('codigomateria', 'Codigo Materia*', ['class' => 'control-label']) !!}
                    {!! Form::text('codigomateria', old('codigomateria'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    <!-- @if($errors->has('codigomateria'))
                        <p class="help-block">
                            {{ $errors->first('codigomateria') }}
                        </p>
                    @endif -->
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


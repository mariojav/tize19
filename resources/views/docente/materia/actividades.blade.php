@extends('layouts.app')

@section('content')
    <h3 class="page-title">
    @if(count($datosMateria)>0 )
    {{$datosMateria[0]->nombremateria}} 
    @endif
    </h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Informacion:
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    @if(count($datosMateria)>0 && count($datosEstudiante)>0)
                        <p><b>ESTUDIANTE:</b> {{ $datosEstudiante[0]->name .' '. $datosEstudiante[0]->apellidopaterno . ' ' . $datosEstudiante[0]->apellidomaterno }}</p>
                        <p><b>SIS:</b> {{ $datosEstudiante[0]->codigosiss }}</p>
                    @else
                        <h2>No se encontraron coincidencias</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <h4>Actividades</h4>
    <div class="panel panel-default">
            <div class="panel-heading">
                @lang('global.app_list')
            </div>
    
            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped dt-select">
                    <thead>
                    
                        <tr>
                            <!-- <th style="text-align:center;"><input type="checkbox" id="select-all" /></th> -->
                            
                            <th>Nombre de la actividad</th>
                            <th>Observaciones</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            <th>&nbsp;</th>
                            
                        </tr>
                    </thead>
                    
                    <tbody>
                    
                        @if (count($actividad) > 0)
                            @foreach ($actividad as $act)
                                
                                <tr>
                                    <!-- <td></td> -->
    
                                    <td>{{ $act->nombre }}</td>
                                    <td>{{ $act->observaciones }}</td>
                                    <td>{{ $act->descripcion }}</td>
                                    <td>{{ $act->fecha }}</td>

                                    <td>
                                        <!-- Seccion botones -->
                                    </td>
    
                                </tr>
                               
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    
@stop


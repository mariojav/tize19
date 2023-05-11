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
    
    @php $users=App\User::all(); @endphp
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('global.app_list')
            </div>
    
            <div class="panel-body table-responsive">
                <table class="table table-bordered table-striped {{ count($query) > 0 ? 'datatable' : '' }} dt-select">
                    <thead>                
                        <tr>
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>    
                            <th>ID </th>
                            <th>Publicacion de Tarea </th>
                            <th>Presentacion de Tarea</th>
                            <th>Descripcion Tarea</th>
                            <th>Fecha de Entrega</th>
                            <th>Archivo</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    
                        @if (count($query) > 0)
                            @foreach ($query as $user)
                                <tr data-entry-id="{{ $user->id }}">
                                    <td></td>
    
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->titulo }}</td>
                                    <td>{{ $user->titulotarea }}</td>
                                    <td>{{ $user->desctarea }}</td>
                                    <td>{{ $user->fecha_entrega }}</td>
                                    <td><a download href="{{url($user->url)}}"><img src="/images/pdf.png" class="img-responsive" alt=""></a></td>
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
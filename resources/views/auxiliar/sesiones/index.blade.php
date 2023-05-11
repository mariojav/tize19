@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <center><h3 class="page-title">Lista de Sesiones</h3></center>
    {{-- <p>
        <a href="{{ route('auxiliar.sesiones.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p> --}} <br><br>
    
    <p>
    <a href="{{ url('/crearsesion/'.$materia_id.'/'.$user_id) }}" class="btn btn-success">Nueva asistencia</a>    
    </p>



    @if(count($sesiones)>0)
    
        <div class="panel panel-default">
            <div class="panel-heading">
                informacion
            </div>

            <div class="panel-body">

                <div class="row">
                    <div class="col-xs-12 form-group">
                        <p>MATERIA: {{$sesiones[0]->nombremateria}}</p>
                        <p>ESTUDIANTE: {{$sesiones[0]->apellidopaterno}} {{$sesiones[0]->apellidomaterno}} {{$sesiones[0]->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="panel panel-default">
            <div class="panel-heading">
                informacion
            </div>

            <div class="panel-body">

                <div class="row">
                    <div class="col-xs-12 form-group">
                        <p>NOTA: No se encontraron registros de sesiones para el usuario solicitado</p>
                    </div>
                </div>
            </div>
        </div>
    @endif


    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>
        
        
        <div class="panel-body table-responsive">
            <table id="scrol" class="table  table-striped {{ count($sesiones)  > 0 ? '' : '' }} dt-select">
                <thead>
                    <tr>
                        
                        <!-- <th>ID</th> -->
                        <th>ID</th>
                        <th>Asistencia</th>
                        <th>Numero de maquina</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th></th>
                        <th>&nbsp;</th> 
                    </tr>
                </thead>
                
                <tbody>
                
                    @if (count($sesiones) > 0)
                            @foreach ($sesiones as $sesion)
                                <tr data-entry-id="{{ $sesion->id }}">
                                    <!-- <td></td> -->
                                    
                                        
                                        <td>{{ $sesion->id }}</td>
                                        <td>{{ $sesion->asistencia }}</td>
                                        <td>{{ $sesion->maquina}}</td>
                                        <td>{{ $sesion->descripcion }}</td>
                                        <td>{{ $sesion->updated_at }}</td>
                                        
                                
                                        <td> <a href="{{ url('/sesioneseliminar/'.$sesion->id) }}" onclick="return confirm('Se eliminara el elemento de la base de datos \nEstas seguro de continuaar?')" class="btn btn-xs btn-warning">Eliminar</a></td>
                                
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
    <a href="{{ url('/auxmaterias/'.$materia_id.'/edit') }}" class="btn btn-default">volver</a>
@stop



@push('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="/otro/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

@endpush

@push('scripts')
<!-- DataTables -->
<script src="/otro/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/otro/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
      $('#scrol').DataTable({
        'scrollX'     : true
      })
    })
</script>

@endpush
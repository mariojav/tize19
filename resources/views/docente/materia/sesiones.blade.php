@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    
    <h2><center>Lista de sesiones</center></h2>

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
        @if(count($sesiones)>0)
            Lista de sesiones de {{$sesiones[0]->name}}
            @else
            Lista vacia
        @endif
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

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('materias.mass_destroy') }}';
    </script>
    
@endsection

@push('scripts')
<!-- DataTables -->
<script>
    $(function () {
      $('#scrol').DataTable({
        'scrollX'     : true
      })
    })
</script>

@endpush